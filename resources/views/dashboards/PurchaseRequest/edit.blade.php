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
                                <h4 class="card-title">ویرایش   قرارداد باعنوان    {{ $contract->onvan }} </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ویرایش  قرارداد</h4>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('contracts/update/' . $contract->id)}}" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="onvan">عنوان قرارداد</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" value="{{ $contract->onvan ?? '' }}" id="onvan" class="form-control" placeholder="عنوان قرارداد" name="onvan">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="mozoo">موضوع قرارداد</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="mozoo" value="{{ $contract->onvan ?? '' }}" class="form-control" placeholder="موضوع قرارداد" name="mozoo">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="peymankar">نام پیمانکار</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="peymankar" value="{{ $contract->peymankar ?? '' }}" class="form-control" placeholder="نام پیمانکار" name="peymankar">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="mablagh">مبلغ قرارداد </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="mablagh" value="{{ $contract->mablagh ?? '' }}" class="form-control" placeholder="مثال: ۳۰۰۰۰۰۰" name="mablagh">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="pardakht">نحوه پرداخت </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="pardakht" value="{{ $contract->pardakht ?? '' }}" class="form-control" placeholder="مثال: چک" name="pardakht">
                                                                    </div>
                                                                </div>




                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="moddat">مدت قرارداد </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="moddat" value="{{ $contract->moddat ?? '' }}" class="form-control" placeholder="مثال: یکساله" name="moddat">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="from">تاریخ شروع</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="from" value="{{ $contract->from ?? '' }}" class="form-control" placeholder="مثال: ۱۳۹۷/۰۶/۲۱" name="from">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="to">تاریخ پایان</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="to" value="{{ $contract->to ?? '' }}" class="form-control" placeholder="مثال: ۱۳۹۷/۱۱/۲۱" name="to">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="tazmin">نوع تضمین </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="tazmin" value="{{ $contract->tazmin ?? '' }}" class="form-control" placeholder="مثال: ضمانت بانکی" name="tazmin">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="nazer">ناظر قرارداد </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="nazer" value="{{ $contract->nazer ?? '' }}" class="form-control" placeholder="مثال: شرکت ..." name="nazer">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">توضیحات</label>
                                                                    <div class="col-md-9">
                                                                        <textarea name="description"  rows="8"  class="form-control" cols="80">{{ $contract->description ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">لینک فایل</label>
                                                                    <div class="col-md-9">
                                                                        @if($contract->contractorFile)
                                                                            <a href="{{ $contract->contractorFile }}" target="_blank"> <i class="ft-file-text" ></i> دانلود فایل</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div  class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="contractorFile">آپلود فایل قرارداد</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" id="contractorFile" class="form-control" name="contractorFile">
                                                                        <small class="danger">در صورت آپلود فایل جدید فایل قبلی حذف میشود</small>

                                                                    </div>

                                                                </div>



                                                            </div>

                                                            <div style="font-family:Byekan" class="form-actions">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-check-square-o"></i> ویرایش
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
                </div>

            </div>
        </div>
    </div>

@endsection
