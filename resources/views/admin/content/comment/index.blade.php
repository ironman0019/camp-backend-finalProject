@extends('admin.layouts.master')

@section('title', 'کامنت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                کامنت ها
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد کامنت ها به شما داده می شود
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
                    <th scope="col">کامنت</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">پاسخ</th>
                    <th scope="col">نظر برای مدل</th>
                    <th scope="col">نام</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">زمان</th>
                    <th scope="col">تنظیمات</th>
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
                    <td>
                        #
                    </td>
                    <td>
                        #
                    </td>
                    <td>
                        #
                    </td>
                    <td>{{ \Morilog\Jalali\Jalalian::forge('')->format('%A, %d %B %y') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            {{-- if($comment->status == 0 || $comment->status == 1)
                            <div class="mx-2">
                                <a href="{{ route('admin.content.comment.approved', $comment) }}"
                                    class="text-success">
                                    <i class="fa fa-check"></i>
                                </a>
                            </div>
                            else
                            <div class="mx-2">
                                <a href="{{ route('admin.content.comment.approved', $comment) }}"
                                    class="text-danger">
                                    <i class="fa fa-ban"></i>
                                </a>
                            </div>
                            endif --}}


                            <div class="mx-2">
                                <a href="#"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
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