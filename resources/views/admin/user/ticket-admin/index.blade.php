@extends('admin.layouts.master')

@section('title', 'تیکت ادمین')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تیکت ادمین ها 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تیکت ادمین ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.user.ticket-admin.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم ادمین</th>
                    <th scope="col">اسم دسته بندی پشتیبانی</th>
                    <th scope="col">تاریخ ساخت</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticketAdmins as $ticketAdmin)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $ticketAdmin->user->name }}</td>
                    <td>{{ $ticketAdmin->ticketCategory->name }}</td>
                    <td>{{ jdate($ticketAdmin->created_at)->format('Y/m/d H:i') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.user.ticket-admin.destroy', $ticketAdmin) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.user.ticket-admin.edit', $ticketAdmin) }}"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </section>
</section>

@endsection