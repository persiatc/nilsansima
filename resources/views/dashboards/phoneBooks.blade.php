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

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

    </style>
@endsection

@section('content')

    <!--  Start add Suggestion -->
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">دفترچه تلفن </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="phoneBooks" class="form form-horizontal form-bordered striped-rows">
                        @csrf
                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                {{--<label class="col-md-3 label-control" for="number">  شرکت یا کارفرما </label>--}}
                                <div class="col-md-3 label-control">
                                    <select type="text" class="form-control" name="type_company">
                                        <option value="شرکت">نام شرکت</option>
                                        <option value="کارفرما"> نام کارفرما</option>
                                        <option value="پیمانکار">نام پیمانکار</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="company">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نام نماینده </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="personName">

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تلفن 1</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone1">
                                </div>
                                <label class="col-md-3 label-control" for="number">تلفن 2 </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone2">
                                </div>
                                <label class="col-md-3 label-control" for="number">تلفن 3 </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone3">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فکس </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="fax">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">ایمیل </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number"> آدرس</label>
                                <div class="col-md-9">

                                    <textarea id="description" rows="3" class="form-control"
                                              name="address" placeholder="آدرس"></textarea>
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

    <!--  End add Suggestion -->


    <!--  Start Edit $phoneBooks -->


    @foreach($phoneBooks as $phoneBook)
        <div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $phoneBook->id }}">دفترچه تلفن</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="phoneBook/update/{{ $phoneBook->id }}"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">



                                <div class="form-group row">
                                    {{--<label class="col-md-3 label-control" for="id"> شرکت یا کارفرما</label>--}}
                                    <div class="col-md-3 label-control">
                                        <select type="text" class="form-control" name="type_company">
                                            <option {{  $phoneBook->type_company == "شرکت" ? "selected"  : ""  }} value="شرکت">نام شرکت</option>
                                            <option {{  $phoneBook->type_coشرکتmpany == "کارفرما" ? "selected"  : ""  }} value="کارفرما"> نام کارفرما</option>
                                            <option {{  $phoneBook->type_company == "پیمانکار" ? "selected"  : ""  }} value="پیمانکار">نام پیمانکار</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text"  value="{{ $phoneBook->company }}" class="form-control" name="company" >
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">نام فرد</label>
                                    <div class="col-md-9">
                                        <input type="text"  value="{{ $phoneBook->personName }}" class="form-control" name="personName" >
                                    </div>
                                </div>

                                <div  class="form-group row">

                                    <label class="col-md-3 label-control" for="id">تلفن 1</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $phoneBook->phone1 }}" class="form-control" name="phone1" >
                                    </div>

                                    <label class="col-md-3 label-control" for="id">تلفن 2</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $phoneBook->phone2 }}" class="form-control" name="phone2" >
                                    </div>

                                    <label class="col-md-3 label-control" for="id">تلفن 3</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $phoneBook->phone3 }}" class="form-control" name="phone3" >
                                    </div>

                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">فکس</label>
                                    <div class="col-md-9">
                                        <input type="text"  value="{{ $phoneBook->fax }}" class="form-control" name="fax" >
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">ایمیل</label>
                                    <div class="col-md-9">
                                        <input type="text"  value="{{ $phoneBook->email }}" class="form-control" name="email" >
                                    </div>
                                </div>


                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">آدرس</label>
                                    <div class="col-md-9">
                                         <textarea  rows="3" class="form-control" name="address" placeholder="آدرس">{{ $phoneBook->address }}</textarea>
                                    </div>
                                </div>





                            </div>



                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> بروزرسانی
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
    @endforeach

    <!--  End Edit $phoneBooks -->




    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  دفترچه تلفن </h4>
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
                                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></button>

                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center; width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">

                                            <th> شرکت/کارفرما/پیمانکار</th>
                                            <th>نام نماینده</th>
                                            <th>  تلفن</th>
                                            <th>فکس</th>
                                            <th> ایمیل</th>
                                            <th> آدرس</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($phoneBooks as $phoneBook)
                                            <tr>

                                                <td>{{ $phoneBook->type_company }} {{ $phoneBook->company }}</td>

                                                <td style="white-space: normal;">{{ $phoneBook->personName }}</td>
                                                <td>

                                                    {{ $phoneBook->phone1 }}
                                                    <br>
                                                    {{ $phoneBook->phone2 }}
                                                    <br>
                                                    {{ $phoneBook->phone3 }}
                                                    <br>

                                                </td>
                                                <td>{{ $phoneBook->fax }}</td>
                                                <td>{{ $phoneBook->email }}</td>
                                                <td>{{ $phoneBook->address }}</td>




                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a data-toggle="modal" data-target="#ReferralsTdl{{ $phoneBook->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>




                                                    <a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"
                                                       href="phoneBook/delete/{{ $phoneBook->id }} "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach

                                    </table>

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
@endsection
