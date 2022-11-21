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
                    <h4 class="modal-title" id="myModalLabel17"> افزودن صورتجلسه </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="{{ url('archives') }}" class="form form-horizontal form-bordered striped-rows">
                        @csrf


                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date">تاریخ جلسه</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                                {{--<label class="col-md-3 label-control" for="number">تاریخ جلسه  </label>--}}
                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" class="form-control" name="meetingDate">--}}

                                {{--</div>--}}
                            {{--</div>--}}


                            <input type="hidden" name="type" value="{{ $type }}">
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-md-3 label-control" for="type"> نوع جلسه </label>--}}
                                {{--<div class="col-md-9">--}}
                                    {{--<select type="text" class="form-control" name="type">--}}
                                        {{--<option value="هیات مدیره">هیات مدیره</option>--}}
                                        {{--<option value="شورای مدیران">شورای مدیران</option>--}}
                                        {{--<option value="جلسه با مدیربازرگانی">جلسه با مدیربازرگانی</option>--}}
                                        {{--<option value="جلسه با مدیر فنی">جلسه با مدیر فنی</option>--}}
                                        {{--<option value="جلسه با مدیر مالی">جلسه با مدیر مالی</option>--}}
                                        {{--<option value="سایر">سایر</option>--}}


                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}




                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">شماره جلسه </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="number" placeholder="مثال : ۱۰۱">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل </label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="file">
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


    @foreach($archives as $phoneBook)
        <div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $phoneBook->id }}">صورتجلسه</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="/archive/update/{{ $phoneBook->id }}"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="date">تاریخ جلسه</label>
                                    <div class="col-md-9">
                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="{{ $type }}">

                                {{--<div  class="form-group row">--}}
                                    {{--<label class="col-md-3 label-control" for="id"> تاریخ جلسه</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input type="text"  value="{{ $phoneBook->meetingDate }}" class="form-control" name="meetingDate" >--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group row">--}}
                                    {{--<label class="col-md-3 label-control" for="id">نوع جلسه</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<select type="text" class="form-control" name="type">--}}
                                            {{--<option {{  $phoneBook->priority == "هیات مدیره" ? "selected"  : ""  }}  value="هیات مدیره">هیات مدیره</option>--}}
                                            {{--<option {{  $phoneBook->priority == "شورای مدیران" ? "selected"  : ""  }}  value="شورای مدیران">شورای مدیران</option>--}}
                                            {{--<option {{  $phoneBook->priority == "جلسه با مدیربازرگانی" ? "selected"  : ""  }}  value="جلسه با مدیربازرگانی">جلسه با مدیربازرگانی</option>--}}
                                            {{--<option {{  $phoneBook->priority == "جلسه با مدیر فنی" ? "selected"  : ""  }}  value="جلسه با مدیر فنی">جلسه با مدیر فنی</option>--}}
                                            {{--<option {{  $phoneBook->priority == "جلسه با مدیر مالی" ? "selected"  : ""  }} value="جلسه با مدیر مالی">جلسه با مدیر مالی</option>--}}
                                            {{--<option {{  $phoneBook->priority == "سایر" ? "selected"  : ""  }} value="سایر">سایر</option>--}}

                                        {{--</select>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                <div  class="form-group row">

                                    <label class="col-md-3 label-control" for="id">شماره جلسه</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $phoneBook->number }}" class="form-control" name="number" >
                                    </div>

                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">فایل</label>
                                    <div class="col-md-9">
                                        <input type="file"  class="form-control" name="file" >
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
                                <h4 class="card-title"> صورتجلسات  {{ $type }} </h4>
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
                                            <th>  شماره جلسه</th>
                                            <th> تاریخ جلسه</th>
                                            <th>مشاهده فایل</th>
                                            {{--<th> نوع جلسه</th>--}}
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($archives as $archive)
                                            <tr>

                                                <td style="white-space: normal;">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $archive->number }}
                                                </td>
                                                <td>{{ jdate($archive->meetingDate) }}</td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    @if($archive->file == "storage/archive/nothing")
                                                        ---
                                                    @else
                                                        <a target="_blank" href="/{{ $archive->file }}"> {!! $archive->file !== "storage/archive/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                    @endif
                                                </td>


{{--                                                <td>{{ $archive->type }}</td>--}}



                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a style="display:inline" data-toggle="modal" data-target="#ReferralsTdl{{ $archive->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>


                                                    <form style="display:inline" class="" action="{{url('archive/delete', $archive->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <button style="display:inline; border: none" onclick="return confirm('آیا برای حذف اطمینان دارید؟');" type="submit">
                                                            <i style="font-size: 20px" class="ft-x-square danger"></i>
                                                        </button>
                                                      </form>

                                                    {{-- <a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"
                                                       href="archive/delete/{{ $archive->id }}"><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a> --}}
                                                </td>
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
