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
                                <h4 class="card-title">جزییات فعالیت های ارجاع داده شده از طرف شما به دیگران   {{ $tld->id}}</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">جزییات  فعالیت های ارجاع داده شده از طرف شما به دیگران </h4>

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
                                                                {{ $tld->id ?? ''}}
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">  نام فعالیت  </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->name ?? ''}}

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">شرح  </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->description ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">ارجاع دهنده  </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->assignerName}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> متولی انجام  </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->user->name  . " " . $tld->user->family }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> اهمیت  </label>
                                                            <div class="col-md-9">
                                                                <span class="badge badge-danger">{{ $tld->priority }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">آخرین وضعیت   </label>
                                                            <div class="col-md-9">
                                                                <span class="badge {{ $tld->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">{{ $tld->status }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">دلیل عدم تحقق   </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->holdPoint ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">نتیجه   </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->doerDescription ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">مستندات ارجاع دهنده   </label>
                                                            <div class="col-md-9">
                                                                <a target="_blank" href="{{ $tld->assignerAttachment }}"> {!! $tld->assignerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
                                                            <div class="col-md-9">
                                                                <a target="_blank" href="{{ $tld->doerAttachment }}"> {!! $tld->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">تاریخ ایجاد  </label>
                                                            <div class="col-md-9">
                                                                {{ jdate($tld->created_at) ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="endHour">آخرین بروزرسانی   </label>
                                                            <div class="col-md-9">
                                                                {{ jdate($tld->updated_at) ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">توضیحات ارجاع دهنده   </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->descriptionAssigner ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">وضعیت بررسی ارجاع دهنده   </label>
                                                            <div class="col-md-9">
                                                                {{ $tld->statusAssigner ?? ''}}
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
