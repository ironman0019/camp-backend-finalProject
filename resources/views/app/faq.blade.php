@extends('app.layouts.master')


@section('title', 'پرسش های متداول')

@section('content')

    <main class="main">
        <div class="pageFAQ">
            <!-- title-->
            <div class="container py-5 mb-1">
                <div class="nt-flex-column gap-5 py-5">
                    <div class="fs-2 nt-fw-bold">پرسش های متداول</div>
                    <div class="display-2 nt-fw-bold text-primary">دنبال چه چیزی هستید؟</div>
                </div>
            </div>
            <!-- questions-->
            <div class="container py-5 mb-5">
                <div class="row g-4">
                    <div class="col-12 col-md-12">
                        <div class="accordion accordion-flush" id="accordionPanelsQuestions">
                            <!-- accordion-->
                            @foreach($faqs as $faq)
                            <div class="accordion-item p-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed nt-fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#panels-collapse{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="panels-collapseOne">{{ $faq->question }}</button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panels-collapse{{ $faq->id }}">
                                    <div class="accordion-body text-start">
                                        <p class="lh-lg">
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- more-->
            <div class="container py-5 mb-5">
                <div class="text-center mb-5">
                    <div class="fs-5 nt-fw-bold">جواب یا پرسش خود را پیدا نکردید؟</div>
                </div>
                <div class="row mb-3">
                    <!-- phone-->
                    <div class="col-6">
                        <div class="nt-flex-column-center-center text-body-secondary"><i
                                class="ti ti-headset display-4"></i>
                            <div class="fs-6 nt-fw-bold mb-3">تماس تلفنی</div><a class="fs-4 nt-fw-bold"
                                href="tel:">۰۲۱-۱۲۳۴۵۶۷۸</a>
                        </div>
                    </div>
                    <!-- contact form-->
                    <div class="col-6">
                        <div class="nt-flex-column-center-center text-body-secondary"><i class="ti ti-mail display-4"></i>
                            <div class="fs-6 nt-fw-bold mb-3">ارسال پیام</div><a class="btn btn-outline-primary"
                                href="#">فرم تماس با ما</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
