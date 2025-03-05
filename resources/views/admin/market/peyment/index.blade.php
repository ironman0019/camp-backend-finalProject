@extends('admin.layouts.master')

@section('title', 'پرداخت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5> 
                پرداخت ها 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد پرداخت ها به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">مبلغ</th>
                    <th scope="col">آیدی یا شماره موبایل</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">درگاه</th>
                    <th scope="col">کد پرداخت</th>
                    <th scope="col">کد پیگیری</th>
                    <th scope="col">زمان ثبت</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th>#</th>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        #
                    </td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge('')->format('%A, %d %B %y')  }}</td>
                </tr>
                


            </tbody>
        </table>
        <div>
            #paginate
        </div>

    </section>
</section>

@endsection