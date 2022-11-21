@extends('layouts/dashboard')

@section('headerscripts')
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
                                <h4 class="card-title">جزییات کار پذیری  {{ $tender->id}}</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">جزییات کار پذیری </h4>

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



                                                            <div style="font-family:byekan" class="form-body">

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">نوع درخواست</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->type ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">کارشناس دریافت کننده</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->karshenasDaryaft ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">نحوده دریافت</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->nahveDaryaft ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">مناقصه گذار</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->monagheseGozar ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">موضوع یا نام  پروژه</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->mozoo ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">کد شناسایی مناقصه گذار</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->codeMonagheseGozar ?? '' }}
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">کد شناسایی سامانه ستاد ایران</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->codeSamaneSetadIran ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تاریخ دریافت</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->dateRecieved ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">فایل پیوست دریافتی</label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $tender->peyvastDaryafti }}"> {!! $tender->peyvastDaryafti !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">زمان جلسه پرسش و پاسخ</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->timeJalasePorseshPasokh ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">مهلت ارسال پاسخ</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->mohlat ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تاریخ بازگشایی</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->tarikhBazgoshaei ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">نام و شماره تماس کارشناس کارفرما</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->namePhoneKarfarma ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">مبلغ ضمانت شرکت در مناقصه</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->mablaghZemanat ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">مدت قرارداد</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->moddatGharardad ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">نظریه کمیسیون توان</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->nazarieKomisionTavan ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">کارشناس پیگیری و ارسال مستندات</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->karshenasPaygiri ?? '' }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">مبلغ استعلام بها</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->mablaghEstelam ?? '' }}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تصویر ضمانت</label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $tender->tasvirZemanat }}"> {!! $tender->tasvirZemanat !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تصویر پیشنهاد فنی و اسناد ارزیابی</label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $tender->tasvirPishnahadFanni }}"> {!! $tender->tasvirPishnahadFanni !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تصویر پیشنهاد قیمت</label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $tender->tasvirPishnahadGheymat }}"> {!! $tender->tasvirPishnahadGheymat !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">فایل پیوست ارسالی</label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $tender->attachmentErsali }}"> {!! $tender->attachmentErsali !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">نتیجه مناقصه</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->natijeMonaghese ?? '' }}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">پاسخ کارفرما</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->paasokhKarfarma ?? '' }}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">آخرین اقدامات</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->akharinEghdamat ?? '' }}

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="number">تاریخ استرداد ضمانتنامه</label>
                                                                    <div class="col-md-9">
                                                                        {{ $tender->tarikhEsterdadZemanat ?? '' }}

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

            </div>
        </div>
    </div>

@endsection
