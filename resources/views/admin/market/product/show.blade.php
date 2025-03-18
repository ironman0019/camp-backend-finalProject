@extends('admin.layouts.master')

@section('title', 'نمایش محصول')

@section('content')



<section class="pt-3 pb-1 mb-2 border-bottom ">
    <h1 class="h5 ">نمایش محصول</h1>
</section>

<section class="row my-3 ">
    <section class="col-12 ">
        <p class="h4 border-bottom mb-3">نام : {{ $product->name }}</p>
        <p class="h5 border-bottom mb-3">توضیحات : {{ $product->description }}</p>
        <p class="h4 border-bottom mb-3">اسلاگ : {{ $product->slug }}</p>
        <p class="h4 border-bottom mb-3">عکس : <span><img src="{{ $product->image }}" alt="image" class="img-fluid" width="200" height="200"></span></p>
        <p class="h4 border-bottom mb-3">تایپ فایل : {{ $product->file_type }}</p>
        <p class="h4 border-bottom mb-3">اسم اصلی فایل : {{ $product->file_original_name }}</p>
        <p class="h4 border-bottom mb-3">قیمت : {{ number_format($product->price) }}</p>
        <p class="h4 border-bottom mb-3">قیمت با تخفیف : {{ $product->off_price ? number_format($product->off_price) : 'خالی' }}</p>
        <p class="h4 border-bottom mb-3">تگ ها : @foreach ($product->tags as $tag)
            {{ $tag->name }}
        @endforeach</p>
        <p class="h4 border-bottom mb-3">تعداد فروش : {{ $product->sold_number }}</p>
        <p class="h4 border-bottom mb-3">وضعیت فروش محصول : {{ $product->marketable ? 'فعال' : 'غیر فعال' }}</p>
        <p class="h4 border-bottom mb-3">وضعیت خود محصول : {{ $product->status ? 'فعال' : 'غیر فعال' }}</p>
        <p class="h4 border-bottom mb-3">دسته بندی : {{ $product->productCategory->name }}</p>
        <p class="h4 border-bottom mb-3">تاریخ ساخت : {{ \Morilog\Jalali\Jalalian::forge($product->created_at)->format('%A, %d %B %y') }}</p>
        <p class="h4 border-bottom mb-3">وضعیت تخفیف : {{ $product->discount_status ? 'فعال' : 'غیر فعال' }}</p>
        <div class="d-flex">
            <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning mx-3">بازگشت</a>
            <div>
                @if($product->discount_status)
                <a href="{{ route('admin.market.product.change.discount-status', $product) }}" class="btn btn-danger">
                    تخفیف غیر فعال
                </a>
                @else
                <a href="{{ route('admin.market.product.change.discount-status', $product) }}" class="btn btn-primary">
                    تخفیف فعال
                </a>
                @endif
            </div>
        </div>
        <div class="col-12 mt-3">
            <form action="{{ route('admin.market.product.add-discount', $product) }}" method="POST" class="row">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="discount" class="form-label">وارد کردن درصد تخفیف</label>
                    <input type="text" class="form-control" name="discount_percent" id="discount" value="{{ old('discount_percent', $product->discount_percent) }}">
                    <button class="btn btn-success mt-2" type="submit">ثبت</button>
                </div>
                @error('discount_percent')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </form>
        </div>  
    </section>
</section>




@endsection