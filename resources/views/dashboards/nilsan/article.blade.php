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
                    <h4 class="modal-title" id="myModalLabel17"> افزودن مقاله  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="/article/store" class="form form-horizontal form-bordered striped-rows">
                        @csrf


                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">عنوان  </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل </label>
                                <div class="col-md-9">
                                    <input type="file"  class="form-control" name="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="content">محتوا </label>
                                <div class="col-md-9">
                                    <textarea   class="form-control" name="content"></textarea>
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


        <!--  Start show Suggestion -->
        @foreach($articles as $phoneBook)
            <div style="font-family:Byekan" class="modal fade text-left" id="showDataModalDetail{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div style="text-align: center!important;" class="modal-header">
                            <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $phoneBook->id }}">جزییات مقاله  </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div  style=" direction: rtl;" class="modal-body">


                            <form style="vertical-align:center;text-align:center" class="form form-horizontal form-bordered striped-rows">

                                <div class="form-body">

                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id"> عنوان</label>
                                        <div class="col-md-9">
                                            {{ $phoneBook->title }}
                                        </div>
                                    </div>


                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id">دانلود فایل</label>
                                        <div class="col-md-9">
                                            <a href="/{{ $phoneBook->file }}" target="_blank"><i class="ft-file"></i></a>
                                        </div>
                                    </div>

                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id"> محتوا</label>
                                        <div class="col-md-9">
                                            {{ $phoneBook->content }}
                                        </div>
                                    </div>


                                </div>




                            </form>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!--  End show Suggestion -->



    <!--  Start Edit $phoneBooks -->
    @foreach($articles as $phoneBook)
        <div style="font-family:Byekan" class="modal fade text-left" id="showDataModalEdit{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="showDataModalEdit{{ $phoneBook->id }}">مقالات </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="/article/update/{{ $phoneBook->id }}"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> عنوان</label>
                                    <div class="col-md-9">
                                        <input type="text"  value="{{ $phoneBook->title }}" class="form-control" name="title" >
                                    </div>
                                </div>


                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">فایل</label>
                                    <div class="col-md-9">
                                        <input type="file"  class="form-control" name="file" >
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> محتوا</label>
                                    <div class="col-md-9">
                                        <textarea   class="form-control" name="content" >{{ $phoneBook->content }}</textarea>
                                    </div>
                                </div>


                            </div>



                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> بروزرسانی
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
                                <h4 class="card-title">   مقالات</h4>
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
                                            <th> عنوان</th>
                                            <th> تاریخ بارگذاری</th>
                                            <th> ثبت کننده</th>
                                            <th> فایل</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($articles as $archive)
                                            <tr>

                                                <td style="white-space: normal;">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $archive->title }}
                                                </td>
                                                <td style="direction: ltr;">{{ jdate($archive->created_at)->format('Y/m/d') }}</td>


                                                <td>
                                                    {{ $archive->user->name . " " . $archive->user->family }}
                                                </td>

                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    <a target="_blank" href="{{ $archive->file }}"> {!! $archive->file !== "storage/Articles/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                </td>

                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a data-toggle="modal" data-target="#showDataModalDetail{{ $archive->id }}" ><i style="font-size: 20px" class="ft-info"></i></a>

                                                    <a data-toggle="modal" data-target="#showDataModalEdit{{ $archive->id }}" ><i style="font-size: 20px" class="ft-edit"></i></a>

                                                    <a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"
                                                       href="/article/delete/{{ $archive->id }} "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a>
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
