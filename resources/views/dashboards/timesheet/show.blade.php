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
                                <h4 class="card-title">ویرایش   قرارداد فروشندگان با عنوان    {{ $TimeSheet->id}}</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ویرایش  قرارداد فروشندگان</h4>

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

{{--                                                        <form  style="vertical-align:center;text-align:center" method="post"  action="timesheet/add" enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">--}}
{{--                                                            @csrf--}}
                                                            <div class="form-body">


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="description">شرح فعالیت  </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->description ?? ''}}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="description">نحوه ارجاع کار  </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->assignment ?? ''}}

                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="startHour">نام کارفرما </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->kaarfarma ?? ''}}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="startHour">نام پروژه </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->projectName ?? ''}}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="result">اسناد کارفرما </label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $TimeSheet->attach1 }}"> {!! $TimeSheet->attach1 !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="startHour">ساعت شروع </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->startHour ?? ''}}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="endHour">ساعت پایان  </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->endHour ?? ''}}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="endHour">مدت زمان صرف شده به دقیقه  </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->minutes ?? ''}}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="result">نتیجه  </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->result ?? ''}}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control"  for="endHour">علت عدم تحقق </label>
                                                                    <div class="col-md-9">
                                                                        {{ $TimeSheet->holdpoint ?? ''}}
                                                                    </div>
                                                                </div>





                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="result">اسناد ارسالی  </label>
                                                                    <div class="col-md-9">
                                                                        <a target="_blank" href="{{ $TimeSheet->attach2 }}"> {!! $TimeSheet->attach2 !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>

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
