@extends('admin.layouts.master')

@section('title', 'محصولات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                محصولات
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد محصولات به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.market.product.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">اسلاگ</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">عکس</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th>#</th>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <img src="#" alt="image" class="img-fluid" width="100" height="100">
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="#"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a href="#"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a href="#"
                                    class="text-success">
                                    <i class="fa fa-image"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                


            </tbody>
        </table>
        <div>
            #paginate
        </div>

    </section>
</section>

@endsection