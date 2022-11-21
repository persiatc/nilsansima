@extends('layouts/dashboard')

@section('headerscripts')
    <style media="screen">

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ویرایش مناقصه {{ ' شناسه: ' . $tender->id . ' موضوع: ' . $tender->mozoo}} </h4>
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

                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                                              action="{{ route('tenders.update', $tender->id) }}" class="form form-horizontal form-bordered striped-rows">
                                            @csrf
                                            <div style="font-family:byekan" class="form-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="date">شناسه</label>
                                                    <div class="col-md-9">
                                                        <input style="font-family:Byekan" disabled class="form-control" style="" value="{{ $tender->id }}" name="id" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">نوع درخواست</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  value="{{ $tender->type }}" name="type">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">کارشناس دریافت کننده</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->karshenasDaryaft }}" name="karshenasDaryaft">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">نحوده دریافت</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->nahveDaryaft }}" name="nahveDaryaft">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">مناقصه گذار</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->monagheseGozar }}" name="monagheseGozar">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">موضوع یا نام  پروژه</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->mozoo }}" name="mozoo">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">کد شناسایی مناقصه گذار</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->codeMonagheseGozar }}" name="codeMonagheseGozar">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">کد شناسایی سامانه ستاد ایران</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->codeSamaneSetadIran }}" name="codeSamaneSetadIran">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تاریخ دریافت</label>
                                                    <div class="col-md-9">
                                                        <input style="font-family:Byekan" class="form-control date" style="" value="{{ $tender->dateRecieved }}" placeholder="کلیک کنید" name="dateRecieved" type="text" />
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">فایل پیوست دریافتی</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="fileMostanadat" class="form-control" name="peyvastDaryafti">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">زمان جلسه پرسش و پاسخ</label>
                                                    <div class="col-md-9">
                                                        <input style="font-family:Byekan" class="form-control date" style="" value="{{ $tender->timeJalasePorseshPasokh }}" placeholder="کلیک کنید" name="timeJalasePorseshPasokh" type="text" />
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">مهلت ارسال پاسخ</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->mohlat }}" name="mohlat">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تاریخ بازگشایی</label>
                                                    <div class="col-md-9">
                                                        <input style="font-family:Byekan" class="form-control date" style="" value="{{ $tender->tarikhBazgoshaei }}" placeholder="کلیک کنید" name="tarikhBazgoshaei" type="text" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">نام و شماره تماس کارشناس کارفرما</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control"  value="{{ $tender->namePhoneKarfarma }}" name="namePhoneKarfarma">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">مبلغ ضمانت شرکت در مناقصه</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->mablaghZemanat }}" name="mablaghZemanat">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">مدت قرارداد</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->moddatGharardad }}" name="moddatGharardad">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">نظریه کمیسیون توان</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->nazarieKomisionTavan }}" name="nazarieKomisionTavan">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">کارشناس پیگیری و ارسال مستندات</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->karshenasPaygiri }}" name="karshenasPaygiri">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">مبلغ استعلام بها(تومان)</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->mablaghEstelam }}" name="mablaghEstelam">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تصویر ضمانت</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="fileMostanadat" class="form-control" name="tasvirZemanat">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تصویر پیشنهاد فنی و اسناد ارزیابی</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadFanni">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تصویر پیشنهاد قیمت</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadGheymat">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">فایل پیوست ارسالی</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="fileMostanadat" class="form-control" name="attachmentErsali">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">نتیجه مناقصه</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->natijeMonaghese }}" name="natijeMonaghese">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">پاسخ کارفرما</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->paasokhKarfarma }}" name="paasokhKarfarma">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">آخرین اقدامات</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="number" class="form-control" value="{{ $tender->akharinEghdamat }}" name="akharinEghdamat">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="number">تاریخ استرداد ضمانتنامه</label>
                                                    <div class="col-md-9">
                                                        <input style="font-family:Byekan" class="form-control date" style="" value="{{ $tender->tarikhEsterdadZemanat }}" placeholder="کلیک کنید" name="tarikhEsterdadZemanat" type="text"/>
                                                    </div>
                                                </div>





                                            </div>

                                            <div style="font-family:Byekan" class="form-actions">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-check-square-o"></i> بروز رسانی
                                                </button>

                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> لغو
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

@endsection


@section('footerscripts')
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
