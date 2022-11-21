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

    </style>
@endsection

@section('content')


    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">مصوبات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="Proceedings" class="form form-horizontal form-bordered striped-rows">
                        @csrf
                        <div style="font-family:byekan" class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date">تاریخ جلسه</label>
                                <div class="col-md-9">
                                    {{-- <input type="text" class="bs-timepicker" /> --}}
                                    {{-- <input type="time" class="bs-timepicker" /> --}}


                                    <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="date" type="text" id="input1"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">شماره جلسه</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="number">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="contractor">نوع جلسه</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="MeetingType">
                                        <option class="form-item" value="هیات مدیره">هیات مدیره</option>
                                        <option class="form-item" value="شورای مدیران">شورای مدیران</option>
                                        <option class="form-item" value="سایر">سایر</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label class="col-md-3 label-control" for="from">ردیف مصوبه </label>
                                <div class="col-md-9">
                                    <input type="text" id="radifeMosavvabe" class="form-control" name="radifeMosavvabe">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-md-3 label-control" for="from">شرح مصوبه </label>
                                <div class="col-md-9">
                                    <input type="text" id="sharheMoavvabe" class="form-control" name="sharheMoavvabe">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label class="col-md-3 label-control" for="from">اقدام کننده</label>
                                <div class="col-md-9">
                                    <input type="text" id="eghdamKonande" class="form-control" name="eghdamKonande">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label class="col-md-3 label-control" for="from">مهلت اقدام</label>
                                <div class="col-md-9">
                                    <input type="text" id="mohlateEghdam" class="form-control" name="mohlateEghdam">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label class="col-md-3 label-control" for="to">نتیجه</label>
                                <div class="col-md-9">
                                    <input type="text" id="natijeh" class="form-control" name="natijeh">
                                </div>
                            </div>


                            <div class="form-group row last">
                                <label class="col-md-3 label-control" for="contractorFile">فایل صورتجلسه</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileSooratJalase" class="form-control"
                                           name="fileSooratJalase">
                                </div>
                            </div>

                            <div class="form-group row last">
                                <label class="col-md-3 label-control" for="contractorFile">مستندات</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="fileMostanadat">
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


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">مصوبات </h4>
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
                                <button style="float: left;margin-left: 40px!important;"
                                        class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"
                                        data-target="#addUser" data-toggle="modal"><span class="ladda-label">  <i
                                                class="ft-plus"></i> افزودن </span></button>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>تاریخ جلسه</th>
                                            <th>شماره جلسه</th>
                                            <th>نوع جلسه</th>
                                            <th>ردیف مصوبه</th>
                                            <th>شرح مصوبه</th>
                                            <th>اقدام کننده</th>
                                            <th>مهلت اقدام</th>
                                            <th>نتیجه</th>
                                            <th>فایل صورتجلسه</th>
                                            <th>مستندات</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($Proceedings as $Proceeding)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Proceeding->date }}</td>
                                                <td>{{ $Proceeding->number }}</td>
                                                <td>{{ $Proceeding->MeetingType }}</td>
                                                <td>{{ $Proceeding->radifeMosavvabe }}</td>
                                                <td>{{ $Proceeding->sharheMoavvabe }}</td>
                                                <td>{{ $Proceeding->eghdamKonande }}</td>
                                                <td>{{ $Proceeding->mohlateEghdam }}</td>
                                                <td>{{ $Proceeding->natijeh }}</td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;">
                                                    <a target="_blank" href="{{ $Proceeding->fileSooratJalase }}"> <i
                                                                class="ft-file-text"></i> </a></td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;">
                                                    <a target="_blank" href="{{ $Proceeding->fileMostanadat }}"> <i
                                                                class="ft-file-text"></i> </a></td>
                                                <td style="text-align:center;color: #3BAFDA"><a
                                                            href="Proceedings/delete/{{ $Proceeding->id }} "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach


                                        </tbody>
{{--                                        <tfoot>--}}
{{--                                        <tr style="text-align: center">--}}
{{--                                            <th>ردیف</th>--}}
{{--                                            <th>تاریخ جلسه</th>--}}
{{--                                            <th>شماره جلسه</th>--}}
{{--                                            <th>نوع جلسه</th>--}}
{{--                                            <th>ردیف مصوبه</th>--}}
{{--                                            <th>شرح مصوبه</th>--}}
{{--                                            <th>اقدام کنده</th>--}}
{{--                                            <th>مهلت اقدام</th>--}}
{{--                                            <th>نتیجه</th>--}}
{{--                                            <th>فایل صورتجلسه</th>--}}
{{--                                            <th>مستندات</th>--}}
{{--                                            <th>حذف</th>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
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
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
