@extends('admin.layouts.master')

@section('title', 'ویرایش محصول')

@section('styles')
@parent
<link href="{{ asset('admin-assets/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش محصول
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.market.product.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="product_category_id" class="form-label">دسته بندی محصول</label>
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('product_category_id', $product->product_category_id) == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('product_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea name="description" class="form-control" id="description" rows="10" cols="30"
                                value="">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-2">
                            <label for="price" class="form-label">قیمت</label>
                            <input type="number" name="price" class="form-control" id="price"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="tag_id" class="form-label">تگ ها</label>
                            <select class="js-example-basic-multiple form-control" name="tag_id[]" id="tag_id" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" @selected(collect(old('tag_id', $product->tags->pluck('id')->toArray()))->contains($tag->id))>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-2">
                            <label for="marketable" class="form-label">وضعیت فروش</label>
                            <select class="form-control" name="marketable" id="marketable">
                                <option value="1" @selected(old('marketable', $product->marketable) == 1)>فعال</option>
                                <option value="0" @selected(old('marketable', $product->marketable) == 0)>غیر فعال</option>
                            </select>
                            @error('marketable')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected(old('status', $product->status) == 1)>فعال</option>
                                <option value="0" @selected(old('status', $product->status) == 0)>غیر فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-2">
                            <label for="image" class="form-label">عکس محصول</label>
                            <input type="file" name="image" class="form-control-file" id="image"
                                value="{{ old('image', $product->image) }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2 mt-3">
                            <img src="{{ asset($product->image) }}" alt="current_image" class="img-fluid" width="200" height="200">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="file" class="form-label">فایل</label>
                            <input type="file" name="file" class="form-control-file" id="file"
                                value="{{ old('file', $product->file) }}">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2 mt-3">
                            <p class="text-xl">{{ $product->file_original_name }}</p>
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

@section('scripts')
@parent
<script src="{{ asset('admin-assets/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script>
@endsection
