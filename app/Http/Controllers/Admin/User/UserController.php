<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if ($request->hasFile('profile_image')) {
            // Remove old image
            $imageUploadService->removeImage($user->profile_image);

            $result = $imageUploadService->uploadImage($request->file('profile_image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['profile_image'] = $result;
        }

        // Hash the password
        if (!empty($inputs['password'])) {
            $inputs['password'] = bcrypt($inputs['password']);
        }

        $user->update($inputs);
        return to_route('admin.user.users.index')->with('swal-success', 'کاربر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('swal-success', 'کاربر با موفقیت حذف شد');
    }

    public function adminStatus(User $user)
    {
        if ($user->is_admin == 1) {
            $user->is_admin = 0;
        } elseif ($user->is_admin == 0) {
            $user->is_admin = 1;
        }

        $user->save();
        return back();
    }

}
