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
            <div class="content-body">

                <div class="row">
                    <div class="col-12">
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
                                            <span class="font-medium-3 text-bold-300 info float-right" style="color:#ff3c00 !important"> مدیر واحد متقاضی/ پروژه ({{$PurchaseRequest->manager->family ?? ''}})</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">
                                                {{-- <a class="btn btn-primary text-white disabled"> --}}
                                                صدور درخواست
                                                {{-- </a> --}}
                                            </span>
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
                                            <span class="font-medium-3  text-bold-300 info float-right" @if($PurchaseRequest->warehouse_keeper_approval) style="color:#ff3c00 !important" @else style="color:#6c757d !important" @endif>انباردار (بررسی موجودی انبار)</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">
                                                @if($PurchaseRequest->warehouse_keeper_approval)
                                                    {{$PurchaseRequest->warehouse_keeper_approval}}
                                                 @else
                                                <form method="post" action="/CommissionPartial/updatePurchaseRequestFormsStatus">
                                                    @csrf
                                                    <input type="hidden" class="form-control" value="{{ $PurchaseRequest->id }}"  name="id">

                                                    <input type="hidden" value="warehouse_keeper_approval" name="field">
                                                    <button type="submit" class="btn btn-primary text-white ">
                                                    تایید
                                                    </button>
                                                </form>
                                                @endif
                                            </span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" @if($PurchaseRequest->warehouse_keeper_approval) style="width: 100%; background-color:#ff3c00 !important" @else style="width: 100%; background-color:#6c757d !important" @endif role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left text-white mt-1 witheColor"></i>
                                            <span class="font-medium-3  text-bold-300 info float-right" @if($PurchaseRequest->financial_management_approval) style="color:#ff3c00 !important" @else style="color:#6c757d !important" @endif>مدیر مالی(تخصیص بودجه)</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">
                                                @if($PurchaseRequest->financial_management_approval)
                                                {{$PurchaseRequest->financial_management_approval}}
                                             @else
                                                <form method="post" action="/CommissionPartial/updatePurchaseRequestFormsStatus">
                                                    @csrf
                                                    <input type="hidden" class="form-control" value="{{ $PurchaseRequest->id }}"  name="id">

                                                    <input type="hidden" value="financial_management_approval" name="field">
                                                    <button type="submit" class="btn btn-primary text-white disabled">
                                                    تایید
                                                    </button>
                                                </form>
                                                @endif

                                            </span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" @if($PurchaseRequest->financial_management_approval) style="width: 100%; background-color:#ff3c00 !important" @else style="width: 100%; background-color:#6c757d !important" @endif  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-sm-12 ">
                                        <div class="pb-1">
                                          <div class="clearfix mb-1">
                                            <i class="ft-chevron-left font-large-1 float-left text-white mt-1 witheColor"></i>
                                            <span class="font-medium-3  text-bold-300 info float-right" @if($PurchaseRequest->management_approval) style="color:#ff3c00 !important" @else style="color:#6c757d !important" @endif> مدیر  عامل(صدور مجور تامین)</span>
                                          </div>
                                          <div style="text-align: center;font-size: 18px;" class="clearfix">
                                            <span class="text-white witheColor">
                                                @if($PurchaseRequest->management_approval)
                                                {{$PurchaseRequest->management_approval}}
                                             @else
                                                <form method="post" action="/CommissionPartial/updatePurchaseRequestFormsStatus">
                                                    @csrf
                                                    <input type="hidden" class="form-control" value="{{ $PurchaseRequest->id }}"  name="id">

                                                    <input type="hidden" value="management_approval" name="field">
                                                    <button type="submit" class="btn btn-primary text-white disabled">
                                                    تایید
                                                    </button>
                                                </form>
                                                @endif

                                            </span>
                                          </div>
                                        </div>
                                        <div class="progress mb-0" style="height: 7px;">
                                          <div class="progress-bar bg-info" role="progressbar" @if($PurchaseRequest->management_approval) style="width: 100%; background-color:#ff3c00 !important" @else style="width: 100%; background-color:#6c757d !important" @endif  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </div>



                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جزییات </h4>
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


                                    {{-- <div class="text-left" >
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="peymankar">خریدار</label>
                                            <div class="col-md-9">
                                                <input type="text" id="peymankar"  class="form-control" placeholder="خریدار" name="peymankar">
                                            </div>
                                        </div>
                                    </div> --}}


                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

@endsection
