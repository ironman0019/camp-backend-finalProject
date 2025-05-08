@extends('admin.layouts.master')

@section('title', 'ساخت بنر')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت بنر
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.content.banner.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.content.banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">عکس</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image') }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="url" class="form-label">آدرس</label>
                            <input type="text" name="url" class="form-control" id="url"
                                value="{{ old('url') }}">
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" selected>فعال</option>
                                <option value="0" >غیر فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="position" class="form-label">جایگاه</label>
                            <select class="form-control" name="position" id="position">
                                <option value="0" selected>اسلاید شو</option>
                                <option value="1">پایین راست</option>
                                <option value="2">پایین چپ</option>
                                <option value="3">پایین</option>
                            </select>
                            <small class="text-primary">برای جایگاه به غیر از اسلاید شو آخرین بنری که ساختید در سایت نمایش داده میشود</small>
                            @error('position')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
