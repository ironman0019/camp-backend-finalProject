@extends('admin.layouts.master')

@section('title', 'تیکت ')

@section('content')

    <section class="main-body-container">
        <section class="main-body-container-header d-flex justify-content-between align-items-center">
            <div>
                <h5>
                    تیکت
                </h5>
                <p>
                    در این بخش اطلاعاتی در مورد تیکت به شما داده می شود
                </p>
            </div>
        </section>
        <section class="body-content">

            <table class="table">
                <thead class="table-info">
                <tr>
                    <th scope="col">موضوع</th>
                    <th scope="col">متن</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تیکت ادمین</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">پاسخ به</th>
                    <th scope="col">تنظیمات</th>
                    <th scope="col">فایل</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ str()->limit( $ticket->body, 20)  }}</td>
                    <td>{{ \App\Enums\TicketStatusEnum::getBy($ticket->status->value)?->getLabel() }}</td>
                    <td>{{ $ticket->admin?->user?->name }}</td>
                    <td>{{ $ticket->user?->name }}</td>
                    <td>{{ $ticket->category?->name }}</td>
                    <td>{{ $ticket->parent->subject }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="{{ route('admin.tickets.ticket.destroy', $ticket) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </td>
                    <td></td>
                </tr>

                @forelse($ticket->children as $childTicket)
                    <tr>
                        <td>{{ $childTicket->subject }}</td>
                        <td>{{ $childTicket->body }}</td>
                        <td>{{ \App\Enums\TicketStatusEnum::getBy($childTicket->status->value)?->getLabel() }}</td>
                        <td>{{ $childTicket->admin?->user?->name }}</td>
                        <td>{{ $childTicket->user?->name }}</td>
                        <td>{{ $childTicket->category?->name }}</td>
                        <td>{{ $childTicket->parent->subject }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mx-2">
                                    <form action="{{ route('admin.tickets.ticket.destroy', $childTicket) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </td>
                        <td></td>
                    </tr>
                @empty @endforelse


                </tbody>
            </table>

            <section class="body-content">

                <form class="row g-3" action="{{ route('admin.tickets.ticket.store') }}" method="post">
                    @csrf

                    <div class="col-md-12 mb-2">
                        <label for="body" class="form-label">پاسخ</label>
                        <input type="text" name="body" class="form-control" id="body"
                               value="{{ old('body') }}">
                        @error('body')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="hidden" name="parent_id" value="{{ $ticket->parent_id ?? $ticket->id }}">


                    <div class="col-12">
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </div>
                </form>

            </section>

        </section>
    </section>

@endsection
