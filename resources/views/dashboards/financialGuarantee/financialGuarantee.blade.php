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
                    <h4 class="modal-title" id="myModalLabel17"> افزودن ضمانت نامه مالی </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="{{ route('financialGuarantee.store') }}" class="form form-horizontal form-bordered striped-rows">
                        @csrf


                        <div style="font-family:byekan" class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="subject"> موضوع قرارداد </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="type"> نوع ضمانت نامه </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="type">
                                        <option value="پیش پرداخت">پیش پرداخت</option>
                                        <option value="حسن انجام کار "> حسن انجام کار</option>
                                        <option value="شرکت در مناقصه">شرکت درمناقصه</option>
                                        <option value="حسن انجام تعهدات">حسن انجام تعهدات</option>
                                        <option value="کسر از محل مطالبات"> کسر از محل مطالبات</option>
                                        <option value="چک"> چک</option>
                                        <option value="سفته"> سفته</option>


                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="validity_duration"> مدت اعتبار </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="validity_duration">
                                        <option value="سه ماه">سه ماه</option>
                                        <option value="شش ماه ">شش ماه </option>
                                        <option value="یک سال">یک سال</option>
                                        <option value="بدون تاریخ"> بدون تاریخ</option>


                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="status"> آخرین وضعیت </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="تمدید شده">تمدید شده</option>
                                        <option value="تمدید نشده ">تمدید نشده </option>

                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="active_status">  وضعیت فعال </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="active_status">
                                        <option value="گرفته شده">گرفته شده</option>
                                        <option value="تحویل بانک ">تحویل بانک </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name_of_issuing_bank"> نام بانک صادر کننده </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name_of_issuing_bank">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="beneficiary_name">نام ذینفع </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="beneficiary_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="price">مبلغ </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" autocomplete="off" class="form-control"  placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="image">تصویر </label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="image">
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
        <div style="font-family:Byekan" class="modal fade text-left" id="eidtFinancialGuarantee{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $phoneBook->id }}">ضمانت نامه مالی</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="financialGuarantee/update/{{ $phoneBook->id }}"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="name_of_issuing_bank"> نام بانک صادر کننده </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $phoneBook->name_of_issuing_bank }}" name="name_of_issuing_bank">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="beneficiary_name">نام ذینفع </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $phoneBook->beneficiary_name }}" name="beneficiary_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="price">مبلغ </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $phoneBook->price }}" name="price">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                    <div class="col-md-9">
                                        <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="image">تصویر </label>
                                    <div class="col-md-9">
                                        <input type="file" id="fileMostanadat" class="form-control" name="image">
                                    </div>
                                    <div class="col-md-9">
                                    @if($phoneBook->image == "storage/FinancialGuarantee/nothing")
                                        ---
                                    @else
                                       دانلود ضمیمه <a target="_blank" href="/{{ $phoneBook->image }}"> {!! $phoneBook->image !== "storage/FinancialGuarantee/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                    @endif
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


     <!--  Start Edit $change active date -->


    @foreach($archives as $phoneBook)
        <div style="font-family:Byekan" class="modal fade text-left" id="endDateAdd{{ $phoneBook->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $phoneBook->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="endDateAdd{{ $phoneBook->id }}">تمدید ضمانت نامه مالی {{ $phoneBook->subject }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="financialGuarantee/updateEndDate/{{ $phoneBook->id }}"  class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="end_date">تاریخ اتمام</label>
                                    <div class="col-md-9">
                                        <input style="font-family:Byekan" autocomplete="off" class="form-control" style="" placeholder="کلیک کنید" name="end_date" type="text" id="input1"/>
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

    <!--  End Edit $change active date -->


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
                                <h4 class="card-title"> ضمانت نامه های مالی  </h4>
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
                                            <th> موضوع قرارداد</th>
                                            <th> نوع ضمانت نامه</th>

                                              <th>  نام بانک صادر کننده</th>

                                            <th> مدت اعتبار</th>
                                            <th> آخرین وضعیت</th>
                                            <th> وضعیت فعال</th>
                                            <th> نام ذینفع</th>

                                            <th> مبلغ</th>
                                            <th>  تاریخ اتمام</th>
                                            <th>مشاهده تصویر</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($archives as $archive)
                                            <tr>

                                                <td style="white-space: normal;">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $archive->subject }}
                                                </td>
                                                <td>
                                                    {{ $archive->type }}
                                                </td>
                                                <td>
                                                    {{ $archive->name_of_issuing_bank }}
                                                </td>
                                                <td>
                                                    {{ $archive->validity_duration }}
                                                </td>
                                                <td>
                                                    {{ $archive->status }}
                                                </td>
                                                <td>
                                                    <span class="{{ $archive->active_status == 'تحویل بانک' ? 'badge-success' : 'badge-warning' }}">
                                                        {{ $archive->active_status }}
                                                    </span>

                                                </td>


                                                <td>
                                                    {{ $archive->beneficiary_name }}
                                                </td>
                                                <td>
                                                    {{ number_format($archive->price) }}
                                                </td>
                                                <td>{{ $archive->end_date ? jdate($archive->end_date)->format('Y/m/d') : '-' }}</td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    @if($archive->image == "storage/FinancialGuarantee/nothing")
                                                        ---
                                                    @else
                                                        <a target="_blank" href="/{{ $archive->image }}"> {!! $archive->image !== "storage/FinancialGuarantee/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                                                    @endif
                                                </td>


{{--                                                <td>{{ $archive->type }}</td>--}}



                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a style="display:inline" data-toggle="modal" data-target="#eidtFinancialGuarantee{{ $archive->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>

                                                    <a style="display:inline" title="تمدید" data-toggle="modal" data-target="#endDateAdd{{ $archive->id }}" ><i style="font-size: 20px" class="ft-clock"></i></a>

                                                    <form style="display:inline" class="" action="{{url('financialGuarantee/delete', $archive->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <button style="display:inline; border: none" onclick="return confirm('آیا برای حذف اطمینان دارید؟');" type="submit">
                                                            <i style="font-size: 20px" class="ft-x-square danger"></i>
                                                        </button>
                                                      </form>


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
