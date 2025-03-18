@extends('admin.layouts.master')

@section('title', 'تیکت ها')

@section('content')

<section class="main-body-container">
    <section class="main-body-container-header d-flex justify-content-between align-items-center">
        <div>
            <h5>
                تیکت ها
            </h5>
            <p>
                در این بخش اطلاعاتی در مورد تیکت ها به شما داده می شود
            </p>
        </div>
    </section>
    <section class="body-content">

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">موضوع</th>
                    <th scope="col">متن</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تیکت ادمین</th>
                    <th scope="col">کاربر</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">پاسخ به </th>
                    <th scope="col">تنظیمات</th>
                    <th scope="col">فایل</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ str()->limit($ticket->body, 20) }}</td>
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

                            <div class="mx-2">
                                <a href="{{ route('admin.tickets.ticket.show', $ticket) }}"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>

                            <div class="mx-2">
                                <a href="{{ route('admin.tickets.ticket.status', $ticket) }}"
                                   class="text-warning">
                                    <i @class(['fa ', \App\Enums\TicketStatusEnum::getBy($ticket->status->value)->getIcon()])></i>
                                </a>
                            </div>

                        </div>
                    </td>
                    <td>
                        @if($ticket->file)
                            <a href="#"><i class="fa fa-download"></i></a>
                        @endif
                    </td>
                </tr>
                @empty @endforelse


            </tbody>
        </table>
        <div>
            {{ $tickets->links() }}
        </div>

    </section>
</section>

@endsection
