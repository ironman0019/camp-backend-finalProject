@extends('app.layouts.master')


@section('title', 'تیکت های کاربر')

@section('content')


<main class="main">                                                              
    @include('app.user-dashbord.partials.dashbord-sidebar-ofcanvas')

    <!-- Add New ticket-->
    <div class="modal fade" id="newAddressesModal" tabindex="-1" aria-labelledby="newAddressesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="newAddressesModalLabel">
               ثبت تیکت جدید</h1>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-6">
                <label class="form-label" for="stateSelect">دسته بندی<span class="text-danger"> *</span></label>
                <select class="form-select" id="stateSelect"  required="required">
                  <option selected="selected">دسته بندی تیکت را انتخاب کنید</option>
                  <option value="1">پشتیبانی فنی</option>
                  <option value="2">پشتیبانی فروش</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label" for="exampleFormControlTextarea1">سابجکت<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlTextarea1">متن اصلی<span class="text-danger"> *</span></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required="required"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">فایل</label>
                <input type="file" class="form-control" name="">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="submit">
               ثبت تیکت</button>
          </div>
        </div>
      </div>
    </div>

    <div class="profile">
      <div class="container py-5">
        <div class="row g-4">
            @include('app.user-dashbord.partials.dashbord-sidebar')
          <div class="col-12 col-md-9">
            <!-- content-->
            <div class="bg-body border rounded p-5">
              <!-- header-->
              <div class="nt-flex-between-center gap-3 mb-4">
                <div class="nt-flex-start-center"><i class="ti ti-ticket fs-3"></i>
                  <div class="fs-4 nt-fw-bold">تیکت ها</div>
                </div>
                <button class="btn btn-lg btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#newAddressesModal"><i class="ti ti-ticket fs-5"></i>
                  <div class="fs-6">ثبت تیکت جدید</div>
                </button>
              </div>
              <!-- ticket-->

              <section>
                <div class="nt-flex-between-center gap-3 py-4">
                    <div class="nt-fw-500 fs-5">سابجکت تیکت</div>
                </div>
                <div class="border-top py-4">
                    <div class="d-flex gap-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, commodi culpa ad nisi at ipsam, nostrum nobis adipisci eaque quaerat ipsa quibusdam et aperiam voluptate, incidunt delectus iste cum facilis?

                        </p>
                    </div>
                </div>
              </section>

              <section>
                <div class="nt-flex-between-center gap-3 py-4">
                    <div class="nt-fw-500 fs-5">سابجکت تیکت</div>
                </div>
                <div class="border-top py-4">
                    <div class="d-flex gap-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, commodi culpa ad nisi at ipsam, nostrum nobis adipisci eaque quaerat ipsa quibusdam et aperiam voluptate, incidunt delectus iste cum facilis?

                        </p>
                    </div>
                </div>
              </section>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>




@endsection
