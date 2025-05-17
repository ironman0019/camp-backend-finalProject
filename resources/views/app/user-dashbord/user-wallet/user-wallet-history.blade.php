@extends('app.layouts.master')

@section('title', 'تاریخچه کیف پول')

@section('content')

    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
                <div class="row g-4">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9">
                        <div class="card shadow-sm rounded-4">
                            <div class="card-header bg-primary text-white rounded-top-4">
                                <h5 class="mb-0">تاریخچه تراکنش‌های کیف پول</h5>
                            </div>
                            <div class="card-body p-0">
                                @if($transactions->isEmpty())
                                    <div class="p-4 text-center text-muted">
                                        هیچ تراکنشی یافت نشد.
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>مبلغ</th>
                                                    <th>نوع تراکنش</th>
                                                    <th>درگاه پرداخت</th>
                                                    <th>تاریخ</th>
                                                    <th>کد رهگیری تراکنش</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->status ? number_format($transaction->withdraw_amount) : number_format($transaction->charge_amount)}} تومان</td>
                                                        <td>
                                                            @if($transaction->status == 0)
                                                                <span class="text-success">واریز</span>
                                                            @elseif($transaction->status == 1)
                                                                <span class="text-danger">برداشت</span>
                                                            @else
                                                                <span class="text-muted">نامشخص</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $transaction->peyment_object ? json_decode($transaction->peyment_object)->gateway : 'خالی' }}
                                                        </td>
                                                        <td>{{ jdate($transaction->created_at)->format('Y/m/d H:i') }}</td>
                                                        <td>
                                                            {{ $transaction->peyment_object ? json_decode($transaction->peyment_object)->tracking_code : 'خالی' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                       <div class="mt-4 d-flex justify-content-center">
                                         {{ $transactions->links() }}
                                       </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
