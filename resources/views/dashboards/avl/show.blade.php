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
                                <h4 class="card-title">جزییات  شرکت های تامین کننده کالا و خدمات    {{ $avl->id}}</h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">جزییات   شرکت های تامین کننده کالا و خدمات  </h4>

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
                                                                {{ $avl->id ?? ''}}
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">  نوع فعالیت  </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->noefaAliat ?? ''}}

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">اولویت  </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->olaviat ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> نام شرکت  </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->namesherkat ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">  نام رابط  </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->namerabet ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> آدرس  </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->address }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">کد پستی    </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->codeposti }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">  تلفن   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->tel ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">فکس   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->fax ?? ''}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">نام مدیر عامل   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->namemodiramel ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">همراه   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->hamrah ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">برند   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->brand ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">ایمیل   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->email ?? ''}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">وبسایت   </label>
                                                            <div class="col-md-9">
                                                                {{ $avl->website ?? ''}}
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
