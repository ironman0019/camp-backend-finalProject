@extends('admin.layouts.master')

@section('title', 'تگ های محصولات')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تگ های محصولات
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تگ ها به شما داده می شود
            </p>
        </div>
        <div>
            <a href="{{ route('admin.market.tag.create') }}" class="btn btn-success">ساخت</a>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('admin.market.tag.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('admin.market.tag.edit', $tag) }}"
                                    class="text-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty @endforelse


            </tbody>
        </table>

    </section>
</section>

@endsection
