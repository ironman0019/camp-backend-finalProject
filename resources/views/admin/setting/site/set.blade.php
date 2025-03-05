@extends('admin.layouts.master')

@section('title', 'ساخت یا ویرایش تنظیمات')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت یا ویرایش تنظیمات
                        </h5>

                    </div>
                    <div>
                        <a href="#" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-2">
                            <label for="title" class="form-label">عنوان</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="#">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea name="description" class="form-control" id="description"
                                value="">#</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="keywords" class="form-label">کلمات کلیدی</label>
                            <input type="text" name="keywords" class="form-control" id="keywords"
                                value="#">
                            @error('keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="logo" class="form-label">لوگو</label>
                            <input type="file" name="logo" class="form-control-file" id="logo"
                                value="#">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-2 mt-3">
                            <img src="#" alt="current_logo" class="img-fluid" width="200" height="200">
                        </div>
                        

                        <div class="col-md-12 mb-2">
                            <label for="icon" class="form-label">ایکون</label>
                            <input type="file" name="icon" class="form-control-file" id="icon"
                                value="#">
                            @error('icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-2 mt-3">
                            <img src="#" alt="current_icon" class="img-fluid" width="200" height="200">
                        </div>
                        



                        <div class="col-12">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>

                </section>
            </section>
        </section>
    </section>




@endsection
