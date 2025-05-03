@extends('app.layouts.master')

@section('title', 'صفحه محصول')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endsection


@section('content')

<section class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>{{ $product->name }}</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
    </div>

    <div class="row gy-4">
        <!-- Product Image -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="Product Image">
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-md-5">
            <div class="card p-3">
                <h4>{{ $product->name }}</h4>
                <p class="text-muted mb-1"><i class="fas fa-shield-alt me-2"></i>گارانتی اصالت و سلامت فیزیکی کالا</p>
                <p class="text-success mb-1"><i class="fas fa-store-alt me-2"></i>کالا موجود در انبار</p>
                <a class="btn btn-outline-danger btn-sm mb-3" href="{{ route('product.add-to-favourite', ['product_id' => $product->id]) }}"><i class="fas fa-heart me-1"></i>افزودن به علاقه‌مندی</a>


                <div class="alert alert-info small">
                    خرید شما هنوز نهایی نشده است. لطفاً آدرس و نحوه ارسال را انتخاب کنید تا سفارش تکمیل شود.
                </div>
            </div>
        </div>

        <!-- Price & Cart -->
        <div class="col-md-3">
            <div class="card p-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">قیمت کالا</span>
                    <strong>{{ number_format($product->price) }} <small>تومان</small></strong>
                </div>
                <hr>
                <div class="text-end mb-3">
                    <strong>{{ number_format($product->price) }} <small>تومان</small></strong>
                </div>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">افزودن به سبد خرید</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-5">
        <h4 class="mb-3">کالاهای مرتبط</h4>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col">
                    <div class="card h-100 text-center">
                        <a href="{{ route('product.show', [$relatedProduct, $relatedProduct->slug]) }}">
                            <img src="{{ $relatedProduct->image }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">{{ $relatedProduct->name }}</h6>
                            <p class="card-text text-muted">{{ number_format($relatedProduct->price) }} تومان</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Description, Features, Comments -->
    <div class="mt-5">
        <ul class="nav nav-tabs mb-3" id="productTabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#description">معرفی</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#features">ویژگی‌ها</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#comments">دیدگاه‌ها</a></li>
        </ul>

        <div class="tab-content">
            <!-- Description -->
            <div class="tab-pane fade show active" id="description">
                <p>{{ $product->description }}</p>
            </div>

            <!-- Features -->
            <div class="tab-pane fade" id="features">
                <table class="table table-bordered">
                    <tr><th>قیمت</th><td>{{ number_format($product->price) }}</td></tr>
                    <tr><th>برچسب‌ها</th>
                        <td>
                            @foreach($product->tags as $tag)
                            <a href="{{ route('search', ['tag' => $tag->name]) }}">
                                <span class="badge bg-secondary small">{{ $tag->name }}</span>
                            </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr><th>تعداد فروش</th><td>{{ $product->sold_number }}</td></tr>
                    <tr><th>دسته‌بندی</th><td>{{ $product->productCategory->name }}</td></tr>
                    <tr><th>توضیحات دیگر</th><td>...</td></tr>
                </table>
            </div>

            <!-- Comments -->
            <div class="tab-pane fade" id="comments">
                <button class="btn btn-sm btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#addComment">
                    <i class="fas fa-plus"></i> افزودن دیدگاه
                </button>

                @foreach($comments as $comment)
                    @if(!$comment->parent_id)
                        <div class="border rounded p-3 mb-2">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">{{ \Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A, %d %B %y') }}</small>
                                <strong>{{ $comment->user->name }}</strong>
                            </div>
                            <p class="mt-2 mb-1">{{ $comment->body }}</p>

                            @foreach($comments->where('parent_id', $comment->id) as $reply)
                                <div class="ms-4 mt-2 border-start ps-3">
                                    <small class="text-muted">{{ \Morilog\Jalali\Jalalian::forge($reply->created_at)->format('%A, %d %B %y') }}</small>
                                    <p class="mb-0"><strong>{{ $reply->user->name }}</strong>: {{ $reply->body }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Add Comment Modal -->
<div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="create-comment-form" action="#">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">افزودن دیدگاه</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="body" class="form-label">دیدگاه شما</label>
                    <textarea class="form-control" name="body" id="body" rows="4"></textarea>
                    @error('body') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ثبت دیدگاه</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
