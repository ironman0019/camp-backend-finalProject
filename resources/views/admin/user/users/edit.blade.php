@extends('admin.layouts.master')

@section('title', 'ویرایش کاربر')


@section('content')



<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>
                        ویرایش کاربر
                    </h5>

                </div>
                <div>
                    <a href="{{ route('admin.user.users.index') }}" class="btn btn-warning">بازگشت</a>
                </div>
            </section>
            <section class="body-content">

                <form class="row g-3" action="{{ route('admin.user.users.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">اسم</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name', $user->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="mobile" class="form-label">موبایل</label>
                        <input type="number" name="mobile" class="form-control" id="mobile"
                            value="{{ old('mobile', $user->mobile) }}">
                        @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label">رمز عبور</label>
                        <input type="text" name="password" class="form-control" id="password"
                            value="{{ old('password') }}">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="profile_image" class="form-label">عکس پروفایل</label>
                        <input type="file" name="profile_image" class="form-control" id="profile_image"
                            value="{{ old('profile_image', $user->profile_image) }}">
                        @error('profile_image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if($user->profile_image)
                        <div class="col-md-6 mb-2 mt-3">
                            <img src="{{ asset($user->profile_image) }}" alt="current_image" class="img-fluid" width="200" height="200">
                        </div>
                    @endif

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </div>
                </form>

            </section>
        </section>
    </section>
</section>




@endsection