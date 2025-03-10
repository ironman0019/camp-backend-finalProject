@extends('admin.layouts.master')

@section('title', 'ساخت محصول')

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت محصول
                        </h5>

                    </div>
                    <div>
                        <a href="#" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="product_category_id" class="form-label">دسته بندی محصول</label>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                
                                <option value="#" selected>#</option>
                                
                            </select>
                            @error('product_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea name="description" class="form-control" id="description" rows="10" cols="30"
                                value="">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-2">
                            <label for="price" class="form-label">قیمت</label>
                            <input type="number" name="price" class="form-control" id="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="tags" class="form-label">تگ ها</label>
                            <input type="text" name="tags" class="form-control" id="tags"
                                value="{{ old('tags') }}">
                            @error('tags')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="marketable_number" class="form-label">موجودی</label>
                            <input type="number" name="marketable_number" class="form-control" id="marketable_number"
                                value="{{ old('marketable_number') }}">
                            @error('marketable_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="marketable" class="form-label">وضعیت فروش</label>
                            <select class="form-control" name="marketable" id="marketable">
                                <option value="1" @if (old('marketable') == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('marketable') == 0) selected @endif>غیر فعال</option>
                            </select>
                            @error('marketable')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
                                <option value="0" @if (old('status') == 0) selected @endif>غیر فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">عکس محصول</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image') }}">
                            @error('image')
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
