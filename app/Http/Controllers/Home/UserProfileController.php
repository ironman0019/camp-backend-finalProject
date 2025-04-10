<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('app.user-dashbord.user-profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImageUploadService $imageUploadService, $id)
    {
        $inputs = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'password' => 'nullable|string|confirmed|min:4',
            'profile_image' => 'image|nullable'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $inputs['name'],
        ];

        // Hash the password
        if (!empty($inputs['password'])) {
            $data['password'] = Hash::make($inputs['password']);
        }

        if($request->hasFile('profile_image')) {
            // Remove old image
            $imageUploadService->removeImage($user->profile_image);

            $result = $imageUploadService->uploadImage($request->file('profile_image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $data['profile_image'] = $result;
        }

        $user->update($data);

        return to_route('user.dashbord.index')->with('success', 'اطلاعات کاربری ویرایش شد');

        
    }


}
