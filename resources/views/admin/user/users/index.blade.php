@extends('admin.layouts.master')

@section('title', 'کاربران')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                کاربران سایت 
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم</th>
                    <th scope="col">ایمیل یا موبایل</th>
                    <th scope="col">ادمین</th>
                    <th scope="col">تاریخ ساخت</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email ? $user->email : $user->mobile }}</td>
                    <td>
                        @if ($user->is_admin)
                        <span class="text-success"><i class="fa fa-check"></i></span>
                        @else
                        <span class="text-danger"><i class="fa fa-ban"></i></span>
                        @endif
                    </td>
                    <td>{{ jdate($user->created_at)->format('Y/m/d H:i') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.user.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.user.users.edit', $user) }}"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                @if($user->is_admin)
                                <a href="{{ route('admin.user.user.adminStatus', $user) }}"
                                    class="text-success">
                                    ادمین
                                </a>
                                @else
                                <a href="{{ route('admin.user.user.adminStatus', $user) }}"
                                    class="text-primary">
                                    کاربر
                                </a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="mt-2">
            {{ $users->links() }}
        </div>

    </section>
</section>

@endsection