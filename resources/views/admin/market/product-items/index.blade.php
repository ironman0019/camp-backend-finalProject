@extends('admin.layouts.master')

@section('title', 'آیتم های محصول')

@section('content')

    <section class="main-body-container">
        <section class="main-body-container-header d-flex justify-content-between align-items-center">
            <div>
                <h5>
                    آیتم های محصول
                </h5>
                <p>
                    در این بخش اطلاعاتی در مورد آیتم های محصول به شما داده می شود
                </p>
            </div>
            <div>
                <a href="{{ route('admin.market.product-items.create', $product) }}" class="btn btn-success">ساخت</a>
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-warning">بازگشت</a>
            </div>
        </section>
        <section class="body-content">

            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام اصلی فایل</th>
                        <th scope="col">نوع فایل</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">دانلود</th>
                        <th scope="col">تاریخ ساخت</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productItems as $productItem)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $productItem->file_original_name }}</td>
                            <td>{{ $productItem->file_type }}</td>
                            <td>{{ $productItem->product->name }}</td>
                            <td>
                                <a href="{{ route('admin.market.product-items.download-file', ['filePath' => urlencode($productItem->file_path)]) }}"
                                    class="btn btn-primary">دانلود</button></a>
                            </td>
                            <td>{{ \Morilog\Jalali\Jalalian::forge($productItem->created_at)->format('%A, %d %B %y') }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mx-2">
                                        <form action="{{ route('admin.market.product-items.destroy', $productItem) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="mx-2">
                                        <a href="{{ route('admin.market.product-items.edit', [$productItem, $product]) }}"
                                            class="text-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="mx-2">
                                        <button type="button" class="text-primary" data-toggle="modal"
                                            data-target="#renameFileModal{{$productItem->id}}">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade mt-5" id="renameFileModal{{$productItem->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="renameFileModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تغییر اسم فایل</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3"
                                            action="{{ route('admin.market.product-items.rename-file', [$productItem]) }}"
                                            method="post" id="renameFileForm{{$productItem->id}}">
                                            @csrf
                                            @method('PUT')

                                            <div class="col-md-12 mb-2">
                                                <label for="file_original_name" class="form-label">اسم فایل</label>
                                                <input type="text" name="file_original_name" class="form-control-file"
                                                    id="file_original_name" value="{{ old('file_original_name') }}">
                                                @error('file_original_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                        <button type="submit" form="renameFileForm{{$productItem->id}}" class="btn btn-primary">ذخیره
                                            تغییرات</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </tbody>
            </table>

        </section>
    </section>

@endsection
