<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Market\Peyment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User\Wallet;
use App\Models\User\WalletPeyment;
use Illuminate\Support\Facades\Auth;

class UserWalletController extends Controller
{
    public function create()
    {
        return view('app.user-dashbord.user-wallet.user-wallet-form');
    }

    public function store(Request $request)
    {

        $inputs = $request->validate([
            'amount' => 'required|numeric'
        ]);

        $inputs['gateway'] = 'زرین پال';
        $inputs['transaction_id'] = random_int(10000, 99999);
        $inputs['tracking_code'] = 'PEY-' . strtoupper(Str::random(10));

        $user = Auth::user();
        $wallet = $user->wallet;

        try {
            
            DB::beginTransaction();

            $peyment = Peyment::create([
                'user_id' => $user->id,
                'amount' => $inputs['amount'],
                'gateway' => $inputs['gateway'],
                'transaction_id' => $inputs['transaction_id'],
                'tracking_code' => $inputs['tracking_code']
            ]);

            $walletPeyment = WalletPeyment::create([
                'wallet_id' => $wallet->id,
                'peyment_id' => $peyment->id,
                'peyment_object' => json_encode($peyment),
                'charge_amount' => $peyment->amount,
                'peyment_status' => 1
            ]);

            $wallet->update([
                'amount' => $wallet->amount + $walletPeyment->charge_amount
            ]);

            DB::commit();
            return to_route('user.dashbord.index')->with('success', 'موجودی کیف پول شما افزایش یافت');

        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('user.dashbord.index')->with('error', 'Something went wrong');
        }


    }

    public function walletHistory()
    {
        $wallet = Auth::user()->wallet;
        $transactions = WalletPeyment::where('wallet_id', $wallet->id)->paginate(10);
        return view('app.user-dashbord.user-wallet.user-wallet-history', compact('transactions'));
    }


}
