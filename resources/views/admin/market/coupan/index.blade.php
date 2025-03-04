@extends('admin.layouts.master')

@section('title', 'تخفیفات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تخفیفات 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تخفیفات به شما داده می شود
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
                    <th scope="col">کد</th>
                    <th scope="col">مقدار</th>
                    <th scope="col">نوع تخفیف(درصدی یا عددی)</th>
                    <th scope="col">سقف تخفیف</th>
                    <th scope="col">تاریخ شروع</th>
                    <th scope="col">تاریخ پایان</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th>#</th>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge()->format('%A, %d %B %y') }}</td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge()->format('%A, %d %B %y') }}</td>
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