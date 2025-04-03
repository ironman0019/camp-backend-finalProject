@extends('admin.layouts.master')

@section('title', 'ساخت فایل')

@section('content')

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت فایل آیتم 
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.product-items.index', $product) }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.market.product-items.store', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-2">
                            <label for="image" class="form-label">فایل</label>
                            <input type="file" name="file" class="form-control-file" id="file"
                                value="{{ old('file') }}">
                            @error('file')
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
