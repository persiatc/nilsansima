@extends('layouts/dashboard')

@section('headerscripts')
@endsection

@section('content')
        <!--  Start Edit $invoices -->
            {{-- @foreach($tenders as $invoice) --}}
                <div style="font-family:Byekan" class="modal fade text-left" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="editInfo" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="text-align: center!important;" class="modal-header">
                                <h4 style="text-align: center!important;" class="modal-title" id="editInfo"> ویرایش اطلاعات دفتر</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div  style=" direction: rtl;" class="modal-body">

                                <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="/InfoCompany/update" class="form form-horizontal form-bordered striped-rows">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $InfoCompany->id}}">
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">ادرس  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address" value="{{ $InfoCompany->address ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">کدپستی تهران  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="code_posti" value="{{ $InfoCompany->code_posti ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">تلفن دفتر تهران  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="phone" value="{{ $InfoCompany->phone ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">فکس  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="fax" value="{{ $InfoCompany->fax ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">ادرس خرمشهر   </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address_khoram" value="{{ $InfoCompany->address_khoram ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">کد پستی خرمشهر   </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="code_posti_khoram" value="{{ $InfoCompany->code_posti_khoram ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">تلفن خرمشهر   </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="phone_khoram" value="{{ $InfoCompany->phone_khoram ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">شماره ثبت  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="shomare_sabt" value="{{ $InfoCompany->shomare_sabt ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">شماره حساب بانک تجارت  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="shomare_hesab_tejarat" value="{{ $InfoCompany->shomare_hesab_tejarat ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">شماره شبا بانک تجارت  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="shomare_shaba" value="{{ $InfoCompany->shomare_shaba ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">کد اقتصادی  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="code_eqtesadi" value="{{ $InfoCompany->code_eqtesadi ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">ایمیل  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" value="{{ $InfoCompany->email ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">ادرس وب سایت  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="website" value="{{ $InfoCompany->website ?? ''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">شناسه ملی  </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="shenase_meli" value="{{ $InfoCompany->shenase_meli ?? ''}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div style="font-family:byekan" class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">فایل پیوست   </label>
                                            <div class="col-md-9">
                                                <input type="file" name="file" class="form-control">


                                            </div>
                                            {{-- <div class="col-md-9">
                                                <a target="_blank" href="{{ $InfoCompany->file }}"> {!! $InfoCompany->file !== "storage/InfoCompany/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                            </div> --}}
                                        </div>

                                    </div>

                                    <div style="font-family:Byekan" class="form-actions">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check-square-o"></i> ویرایش
                                        </button>


                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        <!--  End Edit $invoices -->



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  اطلاعات شرکت </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">  اطلاعات شرکت </h4>
                                                    <button  style="float: left;margin-left: 40px!important;"   class="btn btn-info btn-min-width mr-1 mb-1 ladda-button"  data-target="#editInfo" data-toggle="modal" ><span class="ladda-label">  <i class="ft-edit primary"></i> ویرایش </span></button>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf


                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->address ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کدپستی تهران  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_posti ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">تلفن دفتر تهران  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->phone ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">فکس  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->fax ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس خرمشهر   </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->address_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کد پستی خرمشهر   </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_posti_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">تلفن خرمشهر   </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->phone_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره ثبت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_sabt ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره حساب بانک تجارت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_hesab_tejarat ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره شبا بانک تجارت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_shaba ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کد اقتصادی  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_eqtesadi ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ایمیل  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->email ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس وب سایت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->website ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شناسه ملی  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shenase_meli ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">دانلود فایل پیوست   </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">
                                                                            <a target="_blank" href="{{ $InfoCompany->file }}"> {!! $InfoCompany->file !== "storage/info/nothing" ? "<i style='font-size:50px' class='ft-file-text' ></i>" : "" !!} </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            {{-- <div style="font-family:Byekan" class="form-actions">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-check-square-o"></i> افزودن
                                                                </button>


                                                            </div> --}}
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
