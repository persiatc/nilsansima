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
                                <h4 class="card-title">جزییات قرارداد های فروشندگان {{ $contract->id}}</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">جزییات قرارداد های فروشندگان</h4>

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


                                                    <div class="form-body">


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">ردیف  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->id ?? ''}}
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">  عنوان قرارداد </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->onvan ?? ''}}

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">موضوع قرارداد  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->mozoo ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">طرف دوم قرارداد</label>
                                                            <div class="col-md-9">
                                                                {{ $contract->tarafedovvom ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">مبلغ ماهیانه </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->mablaghMahiane ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> مبلغ سالیانه  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->mablaghSaliane }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">مدت قرارداد  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->moddat }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">تاریخ شروع  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->from ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">تاریخ پایان   </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->to ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">نحوه پرداخت </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->pardakht ?? ''}}
                                                            </div>
                                                        </div>





                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">داور مرضی الطرفین </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->davar ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="endHour">توضیحات  </label>
                                                            <div class="col-md-9">
                                                                {{ $contract->description ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="result"> فایل قرارداد</label>
                                                            <div class="col-md-9">
                                                                <a target="_blank" href="{{ $contract->contractorFile }}"> <i class="ft-file-text" ></i> </a>
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
