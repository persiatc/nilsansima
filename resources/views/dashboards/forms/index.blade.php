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
                    <h4 class="modal-title" id="myModalLabel17"> افزودن  فرم </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="/forms" class="form form-horizontal form-bordered striped-rows">
                        @csrf


                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">عنوان  </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name">

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="link">فایل </label>
                                <div class="col-md-9">
                                    <input type="file"  class="form-control" name="link">
                                </div>
                            </div>




                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
                            </button>


                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!--  End add Suggestion -->





    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

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
                                <h4 class="card-title"> فرم  ها</h4>
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
                                            <th> ردیف</th>
                                            <th>نام</th>
                                            <th>لینک</th>
                                            <th>تاریخ اپلود</th>
                                            <th>ایجادکننده</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($forms as $form)
                                            <tr>

                                                <td style="white-space: normal;">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $form->name }}
                                                </td>


                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    <a target="_blank" href="{{ $form->link }}"> {!! $form->link !== "storage/Forms/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                </td>

                                                <td style="direction: ltr;">{{ jdate($form->created_at) }}</td>


                                                <td>
                                                    {{ $form->addedByName }}
                                                </td>



                                                <td style="text-align:center;color: #3BAFDA">
                                                    {{-- <a data-toggle="modal" data-target="#ReferralsTdl{{ $form->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a> --}}




                                                    <a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"
                                                       href="forms/delete/{{ $form->id }} "><i
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
