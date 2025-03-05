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
                
                <tr>
                    <th>#</th>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mx-2">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            {{-- if($ticket->parent_id != null)
                                <div class="mx-2">
                                    <a href="{{ route('admin.tickets.ticket.edit', $ticket) }}"
                                        class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            endif --}}
                            <div class="mx-2">
                                <a href="#"
                                    class="text-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            {{-- if($ticket->parent_id == null)
                                <div class="mx-2">
                                    <a href="{{ route('admin.tickets.ticket.status', $ticket) }}"
                                        class="text-info">
                                        <i class="fa {{ $ticket->status ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
                                    </a>
                                </div>
                            endif --}}
                        </div>
                    </td>
                    {{-- if($ticket->ticketFile)
                        <td><a href="{{ $ticket->ticketFile->file_path }}">دانلود</a></td>
                    endif --}}
                </tr>
                


            </tbody>
        </table>

    </section>
</section>

@endsection