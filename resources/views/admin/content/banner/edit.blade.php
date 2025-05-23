@extends('admin.layouts.master')

@section('title', 'ویرایش بنر')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش بنر
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.content.banner.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.content.banner.update', $banner) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">عکس</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image') }}">
                            <img src="{{ asset($banner->image) }}" alt="old_image" width="100px" height="100px" class="mt-2">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="url" class="form-label">آدرس</label>
                            <input type="text" name="url" class="form-control" id="url"
                                value="{{ old('url', $banner->url) }}">
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected(old('status', $banner->status == 1))>فعال</option>
                                <option value="0" @selected(old('status', $banner->status == 0))>غیر فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="position" class="form-label">جایگاه</label>
                            <select class="form-control" name="position" id="position">
                                <option value="0" @selected(old('position', $banner->position == 0))>اسلاید شو</option>
                                <option value="1" @selected(old('position', $banner->position == 1))>پایین راست</option>
                                <option value="2" @selected(old('position', $banner->position == 2))>پایین چپ</option>
                                <option value="3" @selected(old('position', $banner->position == 3))>پایین</option>
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
