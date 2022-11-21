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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ثبت معامله عمده</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت  معامله عمده</h4>

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

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="/CommissionMajor" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $id }}" >
                                                        <input type="hidden" name="type" value="{{ $type }}" >

                                                        <div style="font-family:byekan" class="form-body">
                                                          <h4 class="form-section"><i class="ft-user"></i> کمیسیون عمده</h4>
                                                          <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="	mozoo">موضوع معامله</label>
                                                            <div class="col-md-9">
                                                              <input type="text" value="{{ old('name') }}"  id="name" class="form-control"  name="mozoo" >
                                                            </div>
                                                          </div>

                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="datebargozari"> تاریخ برگزاری مناقصه یا مزایده عمومی </label>
                                                              <div class="col-md-9">
                                                                <input style="font-family:Byekan" value="{{ old('datebargozari') }}" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="datebargozari" type="text" id="input1"/>

                                                              </div>
                                                            </div>


                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="typemonaqese" multiple>نوع مناقصه </label>
                                                              <div class="col-md-9">
                                                                  <select name="typemonaqese" id="" class="form-control">
                                                                      <option value="یک مرحله ای">یک مرحله ای</option>
                                                                      <option value="دو مرحله ای">دو مرحله ای</option>
                                                                      <option value="عمومی">عمومی  </option>
                                                                      <option value="محدود">محدود  </option>
                                                                  </select>
                                                              </div>
                                                            </div>

                                                          <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="arzeshmoamele">ارزش معامله </label>
                                                            <div class="col-md-9">
                                                              <input type="text" id="contractor" class="form-control" value="{{ old('arzeshmoamele') }}"  name="arzeshmoamele">
                                                            </div>
                                                          </div>

                                                          <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="tedadtaminkonandegan">تعداد تامین کنندگان </label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="contractor" class="form-control"  name="tedadtaminkonandegan" value="{{ old('tedadtaminkonandegan') }}">
                                                              </div>
                                                            </div>

                                                            {{-- <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="moshakhasatkala">مشخصات کالا</label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="contractor" class="form-control"  name="moshakhasatkala">
                                                              </div>
                                                            </div>

                                                            <div class="form-group row">
                                                              <label class="col-md-3 label-control" for="arzeshkala">ارزش کالا</label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="contractor" class="form-control"  name="arzeshkala">
                                                              </div>
                                                            </div> --}}


                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="from" class="form-control"  name="mahaltahvil"value="{{ old('mahaltahvil') }}">
                                                              </div>
                                                            </div>

                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="hazinehaml">هزینه حمل</label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="to" class="form-control" name="hazinehaml"value="{{ old('hazinehaml') }}">
                                                              </div>
                                                            </div>


                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="garanti">گارانتی </label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="from" class="form-control"  name="garanti"value="{{ old('garanti') }}">
                                                              </div>
                                                            </div>


                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="khadamatpasazforosh">خدمات پس از فروش </label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="from" class="form-control"  name="khadamatpasazforosh"value="{{ old('khadamatpasazforosh') }}">
                                                              </div>
                                                            </div>

                                                            <div class="form-group row last">
                                                              <label class="col-md-3 label-control" for="modatmoamele">مدت معامله </label>
                                                              <div class="col-md-9">
                                                                <input type="text" id="from" class="form-control"  name="modatmoamele"value="{{ old('modatmoamele') }}">
                                                              </div>
                                                            </div>


                                                          <div  class="form-group row last">
                                                              <label class="col-md-3 label-control" for="fileestelambaha">بارگزاری مستندات استعلام بها</label>
                                                              <div class="col-md-9">
                                                                <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha"value="{{ old('fileestelambaha') }}">
                                                              </div>
                                                            </div>
                                                            {{-- <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> مشخصات درخواست خرید</h4>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">عنوان خرید:</label>
                                                                        <input class="form-control" disabled value="{{ $PurchaseRequest->onvan }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">خریدار:</label>
                                                                        <input class="form-control" disabled value="{{ $PurchaseRequest->peymankar }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">ارزش خرید:</label>
                                                                        <input class="form-control" disabled value="{{ $PurchaseRequest->mablagh }}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">نحوه پرداخت:</label>
                                                                        <input class="form-control" disabled value="{{ $PurchaseRequest->pardakht }}">
                                                                    </div>
                                                                </div>



                                                            </div> --}}


                                                        </div>

                                                        <div style="font-family:Byekan" class="form-actions">
                                                          <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check-square-o"></i> افزودن
                                                          </button>


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
