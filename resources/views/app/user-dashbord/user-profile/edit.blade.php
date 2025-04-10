@extends('app.layouts.master')

@section('title', 'ویرایش اطلاعات کاربری')

@section('content')

<main class="main">
    @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
    <div class="profile">
        <div class="container py-5">
            <div class="row g-4 py-5">
                @include('app.user-dashbord.partials.dashbord-sidebar')
                <div class="col-12 col-md-9 nt-flex-column gap-3">
                    <div class="card shadow rounded-4 p-4">
                        <h5 class="mb-4">ویرایش اطلاعات کاربری</h5>
                        <form action="{{ route('user.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                            <div class="mb-3">
                                <label for="name" class="form-label">نام</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label for="password" class="form-label">رمز عبور جدید</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="در صورت عدم تغییر، خالی بگذارید">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">تأیید رمز عبور</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <label for="profile_image" class="form-label">عکس پروفایل</label>
                                <input class="form-control" type="file" id="profile_image" name="profile_image" accept="image/*">
                                @error('profile_image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <img
                                    id="preview"
                                    src="{{ auth()->user()->profile_image ? asset(auth()->user()->profile_image) : '#' }}"
                                    alt="پیش‌نمایش تصویر"
                                    class="img-thumbnail {{ auth()->user()->profile_image ? '' : 'd-none' }}"
                                    style="max-width: 200px;"
                                >
                            </div>
                    
                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

@section('scripts')
@parent
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById('profile_image');
        const preview = document.getElementById('preview');

        if (fileInput) {
            fileInput.addEventListener('change', function (event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                    }

                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        }
    });
</script>
@endsection