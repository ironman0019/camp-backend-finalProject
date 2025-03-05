@extends('admin.layouts.master')

@section('title', 'تنظیمات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تنظیمات
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تنظیمات سایت به شما داده می شود
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
                    <th scope="col">عنوان</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">کلمات کلیدی</th>
                    <th scope="col">لوگو</th>
                    <th scope="col">ایکون</th>
                    <th scope="col">زمان ویرایش</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th>1</th>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td><img src="#" alt="logo" width="100" height="100"></td>
                    <td><img src="#" alt="icon" width="100" height="100"></td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge('')->format('%A, %d %B %y') }}</td>
                </tr>
                


            </tbody>
        </table>
        
        <h4>تنظیمات وجود ندارد. برای ساخت کیلیک کنید.</h4>
        


    </section>
</section>

@endsection