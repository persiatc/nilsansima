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
                                <h4 class="card-title"> ویرایش   سند با نام     {{ $Certificate->name ?? ''}} </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ویرایش   اسناد </h4>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('Dokumentation/update/' . $Certificate->id)}}" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="name">نام سند  </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="name" value="{{ $Certificate->name ?? '' }}" class="form-control" name="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="saderKonandeh">صادر کننده</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="saderKonandeh" value="{{ $Certificate->saderKonandeh ?? '' }}" class="form-control"  name="saderKonandeh">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="dateStart">تاریخ صدور</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="date" value="{{ $Certificate->dateStart ?? '' }}" class="form-control" name="dateStart">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row ">
                                                                    <label class="col-md-3 label-control" for="moddateEtebar">مدت اعتبار </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="moddateEtebar" value="{{ $Certificate->moddateEtebar ?? '' }}" class="form-control" placeholder="مثال: یکسال" name="moddateEtebar">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row ">
                                                                    <label class="col-md-3 label-control" for="dateEnd">تاریخ اتمام </label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="dateEnd" value="{{ $Certificate->dateEnd ?? '' }}"  class="form-control"  name="dateEnd">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="description">لینک فایل</label>
                                                                    <div class="col-md-9">
                                                                        @if($Certificate->file)
                                                                            <a href="{{ $Certificate->file }}" target="_blank"> <i class="ft-file-text" ></i> دانلود فایل</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                {{-- appropriate: when a thing is appropriate it is right or normal -> --}}

                                                                <div  class="form-group row last">
                                                                    <label class="col-md-3 label-control" for="file">فایل</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" id="file"  class="form-control" name="file">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div style="font-family:Byekan" class="form-actions">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-check-square-o"></i> افزودن
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
