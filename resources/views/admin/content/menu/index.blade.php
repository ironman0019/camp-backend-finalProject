@extends('admin.layouts.master')

@section('title', 'منو ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                منو ها
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد منو ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="#" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم</th>
                    <th scope="col">آدرس</th>
                    <th scope="col">پدر</th>
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
                        </div>
                    </td>
                </tr>
                


            </tbody>
        </table>

    </section>
</section>

@endsection