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

    <!--  Start Edit Suggestions -->
    @foreach($suggestions as $suggestion)
        <div class="modal fade text-left" id="EditSuggestion{{ $suggestion->id }}" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask{{ $suggestion->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div   class="modal-content">
                    <div class="modal-header">
                        {{-- <h4 class="modal-title" id="myModalLabel17">بروزرسانی پیشنهادات و انتقادات</h4> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="font-family:Byekan; direction: rtl" class="modal-body">

                        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Suggestions/update" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> طرح درخواست</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">نوع:</label>
                                            <select class="form-control" name="scope">
                                                <option {{ $suggestion->scope == 'پیشنهاد' ? 'selected' : '' }}  value="پیشنهاد">پیشنهاد</option>
                                                <option {{ $suggestion->scope == 'انتقاد' ? 'selected' : '' }}  value="انتقاد">انتقاد</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($suggestion->addedById == \Auth::user()->id)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">درخواست از:</label>
                                                <select class="form-control" name="requestedFrom">
                                                    @foreach ($managers as $manager)
                                                        <option {{ $suggestion->requestedFrom == $manager->position ? 'selected' : '' }}  value="{{ $manager->position  }}">{{ $manager->position  }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                </div>


                                <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> شرح انتقاد /
                                    پیشنهاد </h4>

                                <div class="form-group">

                                    <label style="float: right; padding: 10px;" for="">شرح درخواست (توسط ایجاد کننده):</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description" >{{ $suggestion->description }}</textarea>

                                    <label style="float: right; padding: 10px;" for="">توضیحات متولی (توسط متولی):</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description" >{{ $suggestion->description }}</textarea>


                                </div>

                                <div style="" class="col-md-12">
                                    <fieldset class="form-group">
                                        <br><h4 class="form-section"><i class="fa fa-paperclip"></i>  آپلود
                                            فایل ضمیمه </h4>
                                        <div class="form-group row last">

                                            <div class="col-md-12">
                                                <input type="file" id="attachment" class="form-control"
                                                       name="attachment">
                                            </div>
                                        </div>


                                    </fieldset>
                                </div>


                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> بروز رسانی
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
    <!--  End Edit Suggestion -->




    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">لیست اطلاعیه ها </h4>
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
                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>وضعیت</th>
                                            <th>ثبت کننده</th>
                                            <th>فایل ضمیمه</th>
                                            <th>تاریخ ایجاد</th>

                                            <th>تغییرات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suggestions as $suggestion)
                                            <tr>

                                                <td>{{ $suggestion->id }}</td>
                                                <td>{{ $suggestion->title }}</td>
                                                <td>{{ $suggestion->description }}</td>
                                                <td>{{ $suggestion->status }}</td>
                                                <td>{{ $suggestion->addedByName }}</td>
                                                @if($suggestion->file == "storage/Baners/Nothing")
                                                <td style="text-align:center;color: #808080"><i
                                                            style="font-size: 20px" class="ft-file-text"></i></td>
                                            @else
                                                <td style="text-align:center;color: #3BAFDA"><a
                                                            target="_blank"
                                                            href="{{ $suggestion->file }}"><i
                                                                style="font-size: 20px"
                                                                class="ft-file-text"></i></a></td>
                                            @endif

                                                <td style="direction: ltr;">{{ jdate($suggestion->created_at) }}</td>
                                                {{-- <td style="direction: ltr;">{{ jdate($suggestion->updated_at) }}</td> --}}
                                                <td style="text-align:center;color: #3BAFDA">
                                                        {{-- <a data-toggle="modal"
                                                           data-target="#EditSuggestion{{$suggestion->id}}"><i
                                                                    style="font-size: 20px" class="ft-edit"></i></a> --}}

                                                    <a href="Baner/delete/{{ $suggestion->id }} "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach



{{--                                        <tfoot>--}}
{{--                                        <tr>--}}
{{--                                            <th>شرح</th>--}}
{{--                                            <th>درخواست شده از</th>--}}
{{--                                            <th>درخواست توسط</th>--}}
{{--                                            <th>نوع</th>--}}
{{--                                            <th>فایل ضمیمه</th>--}}
{{--                                            <th>توضیحات متولی</th>--}}
{{--                                            <th>تاریخ ایجاد</th>--}}
{{--                                            <th>تاریخ آخرین بازنگری</th>--}}
{{--                                            <th>تغییرات</th>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">ثبت  اطلاعیه  </h4>
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
                                <div class="card-body">
                                    <div class="card-text">
                                        {{-- <p>در این قسمت میتوانید انتقاد ویا پیشنهاد خودرا در سیستم ثبت نمایید.</p> --}}
                                    </div>
                                    <form style="font-family:Byekan" action="/Baner" enctype="multipart/form-data"
                                          method="post" class="form">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> ثبت اطلاعیه</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">عنوان:</label>
                                                        <input class="form-control" name="title" required>

                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">درخواست از:</label>
                                                        <select class="form-control" name="requestedFrom">
                                                            @foreach ($managers as $manager)
                                                                <option value="{{ $manager->position  }}">{{ $manager->position  }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>


                                            <h4 class="form-section"><i class="fa fa-paperclip"></i> شرح اطلاعیه
                                                 </h4>

                                            <div class="form-group">
                                                <label for="description">خواهشمنداست شرح کاملی از اطلاعیه
                                                     در سیستم وارد نمایید.:</label>
                                                <textarea id="description" rows="3" class="form-control"
                                                          name="description" placeholder="توضیحات" required></textarea>
                                            </div>

                                            <div style="" class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="attachment">ضمیمه فایل:</label>

                                                    <div class="form-group row last">
                                                        <label class="col-md-3 label-control" for="file">آپلود
                                                            فایل ضمیمه</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="file" class="form-control"
                                                                   name="file">
                                                        </div>
                                                    </div>


                                                </fieldset>
                                            </div>


                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check-square-o"></i> ثبت
                                            </button>
                                        </div>
                                        {{-- <input style="display:none" type="text" name="doerDescription" value=""> --}}
                                    </form>
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
