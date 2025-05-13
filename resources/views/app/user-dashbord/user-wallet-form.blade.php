@extends('app.layouts.master')


@section('title', 'افزایش موجودی کیف پول')

@section('content')

    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')
        <div class="profile">
            <div class="container py-5">
                <div class="row g-4">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9">
                        <div>
                            <form class="row g-3" action="{{ route('wallet.increase.store') }}" method="post">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <label for="amount" class="form-label">مقدار</label>
                                    <input type="text" name="amount" class="form-control" id="amount"
                                        value="{{ old('amount') }}">
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">افزایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
