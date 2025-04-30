@extends('app.layouts.master')


@section('title', 'کامنت های کاربر')

@section('content')


    <main class="main">
        @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')

        <div class="profile">
            <div class="container py-5">
                <div class="row g-4">
                    @include('app.user-dashbord.partials.dashbord-sidebar')
                    <div class="col-12 col-md-9">
                        <!-- content-->
                        <div class="border rounded bg-body">
                            <div class="nt-flex-start-center p-5"><i class="ti ti-message fs-3"></i>
                                <div class="fs-4 nt-fw-500">دیدگاه ها</div>
                            </div>
                            <!-- tabs-->
                            <ul class="nav nav-tabs lists-nav" id="userComments" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link lists-link active" id="userComments-pub-tab"
                                        data-bs-toggle="tab" data-bs-target="#userComments-pub-tab-pane" type="button"
                                        role="tab" aria-controls="userComments-pub-tab-pane" aria-selected="true">دیدگاه
                                        های من</button>
                                </li>
                            </ul>
                            <!-- tabs pane-->
                            <div class="tab-content" id="myTabContent">
                                <!-- comments-->
                                <div class="tab-pane fade show active p-5" id="userComments-pub-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="nt-flex-column-start-stretch">
                                        <!-- comment-->
                                        @forelse($comments as $comment)
                                        <div class="card h-100">
                                            <div class="row p-4">
                                                <div class="col-4 col-md-1"><img class="img-fluid rounded"
                                                        src="{{ $comment->product->image }}" alt="{{ $comment->product->name }}" /></div>
                                                <div class="col-8 col-md-11">
                                                    <div class="row g-2">
                                                        <div class="col">
                                                            <div class="nt-flex-start-center gap-3">
                                                                <div class="fs-5 nt-fw-bold">{{ $comment->product->name }}</div>
                                                            </div>
                                                        </div>
                                                        @if($comment->status == 2)
                                                        <div class="col-auto">
                                                            <div class="nt-flex-start-center text-success"><i
                                                                    class="ti ti-checks fs-5"></i>تایید شده</div>
                                                        </div>
                                                        @else
                                                        <div class="col-auto">
                                                            <div class="nt-flex-start-center text-warning"><i
                                                                    class="ti ti-clock fs-5"></i>در انتظار تایید</div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-text lh-lg lead mb-3">
                                                    {{ $comment->body }}
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div>
                                            <p class="text-center fw-bold">هیچ نظری یافت نشد</p>
                                        </div>
                                        @endforelse
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $comments->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




@endsection
