@extends('admin.layouts.master')

@section('title', 'ساخت تیکت ادمین')


@section('content')



    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ساخت تیکت ادمین
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.user.ticket-admin.index') }}" class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3" action="{{ route('admin.user.ticket-admin.store') }}" method="post">
                        @csrf

                        <div class="col-md-6 mb-2">
                            <label for="user_id" class="form-label">ادمین</label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}" @selected(old('user_id'))>{{ $admin->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="ticket_category_id" class="form-label">دسته بندی پشتیبانی</label>
                            <select class="form-control" name="ticket_category_id" id="ticket_category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('ticket_category_id'))>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ticket_category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>

                </section>
            </section>
        </section>
    </section>




@endsection
