@extends('layouts/dashboard')

@section('headerscripts')
<style media="screen">



    tspan{
      font-size: 16px!important;

    }
    .dataTables_wrapper{
      direction: rtl;
    }

    /* asiye added */
    .witheColor{
        color: #6c757d !important;
    }


    </style>
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    {{-- <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-content">
                                  <div class="card-body" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);border-radius: 0.25rem;background-color: #f8f9fa;">
                                    <div class="row">
                                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left mt-1 text-white witheColor"style="color:#ff3c00 !important"></i>
                                            <span class="font-medium-3 text-bold-300 info float-right" style="color:#ff3c00 !important"> بازرگانی</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">ثبت درخواست خرید</span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#ff3c00 !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left text-white mt-1 witheColor"></i>
                                            <span class="font-medium-3  text-bold-300 info float-right" style="color:#6c757d !important">کمیسیون معاملات</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">بررسی در کمسیون معاملات</span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#6c757d !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left text-white mt-1 witheColor"></i>
                                            <span class="font-medium-3  text-bold-300 info float-right" style="color:#6c757d !important">کمیسیون معاملات</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">تایید در کمسیون معاملات</span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#6c757d !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-sm-12 ">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left text-white mt-1 witheColor"></i>
                                            <span class="font-medium-3  text-bold-300 info float-right" style="color:#6c757d !important"> بازرگانی</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">بررسی در  بازرگانی</span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 100%; background-color:#6c757d !important" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>



                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div> --}}


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ثبت درخواست خرید </h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard"><br><br>


                                    <div class="text-left" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت درخواست خرید برای پیش فاکتور با کدویژه {{ $invoice->unique_code }}</h4>

                                                </div>
                                                <div class="modal-body">
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('PurchaseRequest')}}" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf
                                                            <input type="hidden" name="invoice_id" value="{{ $invoice->id}}">
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="onvan">عنوان خرید</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text"  id="onvan" class="form-control" placeholder="عنوان خرید" name="onvan">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">شرح خرید</label>
                                                                    <div class="col-md-9">
                                                                        <textarea name="description"  rows="8"  class="form-control" cols="80"></textarea>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="mozoo">موضوع قرارداد</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="mozoo"  class="form-control" placeholder="موضوع قرارداد" name="mozoo">
                                                                    </div>
                                                                </div> --}}


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="peymankar">خریدار</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="peymankar"  class="form-control" placeholder="خریدار" name="peymankar">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="mablagh">ارزش خرید </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="mablagh"  class="form-control" placeholder="به تومان وارد شود" name="mablagh">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="pardakht">نحوه پرداخت </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="pardakht"  class="form-control" placeholder="مثال: چک" name="pardakht">
                                                                    </div>
                                                                </div>




                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="moddat">مدت زمان </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="moddat"  class="form-control" placeholder="مثال: یکساله" name="moddat">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="from">تاریخ شروع</label>
                                                                    <div class="col-md-9">
                                                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="from" type="text" id="input1"/>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="to">تاریخ پایان</label>
                                                                    <div class="col-md-9">
                                                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="to" type="text" id="input1"/>

                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="tazmin">نوع تضمین </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="tazmin"  class="form-control" placeholder="مثال: ضمانت بانکی" name="tazmin">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="nazer">ناظر قرارداد </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="nazer"  class="form-control" placeholder="مثال: شرکت ..." name="nazer">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">توضیحات</label>
                                                                    <div class="col-md-9">
                                                                        <textarea name="description"  rows="8"  class="form-control" cols="80"></textarea>
                                                                    </div>
                                                                </div> --}}

                                                                <div  class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="contractorFile">آپلود فایل جزییات خرید</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" id="contractorFile" class="form-control" name="contractorFile">
                                                                        {{-- <small class="danger">در صورت آپلود فایل جدید فایل قبلی حذف میشود</small> --}}

                                                                    </div>

                                                                </div>



                                                            </div>

                                                            <div style="font-family:Byekan" class="form-actions">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-check-square-o"></i> ثبت
                                                                </button>

                                                                {{-- <button type="button" class="btn btn-warning mr-1">
                                                                    <i class="ft-x"></i> لغو
                                                                </button> --}}
                                                            </div>
                                                        </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
