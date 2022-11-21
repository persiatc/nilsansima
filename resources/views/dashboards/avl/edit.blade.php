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
                                <h4 class="card-title">ویرایش  تامین کننده     {{ $avl->noefaAliat }} </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ویرایش تامین کننده</h4>

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

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('avl/update/' . $avl->id)}}" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <div style="font-family:byekan" class="form-body">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="name">نوع فعالیت</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->noefaAliat ?? '' }}"  class="form-control"  name="noefaAliat">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="description">اولویت</label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  value="{{ $avl->olaviat ?? '' }}" class="form-control"  name="olaviat">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="contractor">نام شرکت</label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  value="{{ $avl->namesherkat ?? '' }}" class="form-control"  name="namesherkat">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">نام رابط </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->namerabet ?? '' }}" class="form-control"  name="namerabet">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">آدرس </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->address ?? '' }}" class="form-control"  name="address">
                                                                </div>
                                                            </div>




                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">کد پستی</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->codeposti ?? '' }}" class="form-control"  name="codeposti">
                                                                </div>
                                                            </div>



                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">تلفن</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->tel ?? '' }}" class="form-control"  name="tel">
                                                                </div>
                                                            </div>



                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="to">فکس</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->fax ?? '' }}" class="form-control"  name="fax">
                                                                </div>
                                                            </div>



                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">نام مدیر عامل </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->namemodiramel ?? '' }}" class="form-control"  name="namemodiramel">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">همراه </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->hamrah ?? '' }}" class="form-control"  name="hamrah">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row ">
                                                                <label class="col-md-3 label-control" for="from">برند </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->brand ?? '' }}" class="form-control"  name="brand">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="from">ایمیل </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->email ?? '' }}" class="form-control"  name="email">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="from">وبسایت </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" value="{{ $avl->website ?? '' }}" class="form-control"  name="website">
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
