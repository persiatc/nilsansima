@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<!-- Timetable CSS Files -->
<link rel="stylesheet" href="vendors/timetables/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/timetables/css/timetable.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">
<!--------------------------------------------------->

<!----------- CSS Files for example -------------->
<link href="/vendors/timetables/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/vendors/timetables/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="/css/bootstrap-glyphicons.css" rel="stylesheet" type="text/css" />



<style media="screen">

#YTO {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: 'Byekan'!important;
  height: 500px!important;
}
#OTY {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
    font-family: 'Byekan', serif !important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
}


</style>
@endsection

@section('content')

<!--  Start Add Task PopUp -->
<div class="modal fade text-left" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن استعلام</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">


        <form  style="vertical-align:center;text-align:center" method="post"  action="/Inquiry/add" enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="title">عنوان استعلام <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="title" value="{{old('title')}}"  class="form-control" name="title">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="nahveerja">نحوه ارجاع کار <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <select class="form-control"  name="nahveerja">
                  <option value="اتوماسیون">اتوماسیون</option>
                  <option value="مدیر مافوق">مدیر مافوق</option>
                  <option value="همکار">همکار</option>
                  <option value="خودم">خودم</option>
                  <option value="مدیرعامل">مدیرعامل</option>
                </select>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control"  for="namekarfarma">نام کارفرما <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" value="{{old('namekarfarma')}}" id="namekarfarma" class="form-control" name="namekarfarma">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="nameproje">نام پروژه <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" value="{{old('nameproje')}}" id="nameproje" class="form-control" name="nameproje">
              </div>
            </div>



              <div class="form-group row">
                <label class="col-md-3 label-control" for="nahveerja">  توضیحات <sup style="color: red; font-size: 18px" >*</sup> </label>
                <div class="col-md-9">
                  <textarea class="form-control" name="description">
                    {{old('description') ?? ''}}
                  </textarea>
                </div>
              </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" value="{{old('file')}}" for="file">اسناد کارفرما </label>
              <div class="col-md-9">
                <input type="file" name="file" id="file">
              </div>
            </div>


          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن
            </button>



          </div>
        </form>


      </div>
    </div>
  </div>
</div>
<!--  End Add Task PopUp -->





<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

        @if ($errors->any())
        <div style="font-family:Byekan" class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif


      <!-- Start TimeSheet Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">  استعلام های شما</h4>
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
                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i>  افزودن استعلام   </span></button><br><br>
                <div class="card-body card-dashboard">
                  <table style="font-family:Byekan;direction: rtl; width: 100%" class="table display  table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                            <th>عنوان استعلام</th>
                            <th>ثبت کننده </th>
                            <th>نام پروژه  </th>
                            <th>نام کارفرما </th>
                            <th> نحوه ارجاع</th>
                            <th>تاریخ و زمان ثبت</th>
                            <th> جزییات</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      @foreach($InquiryPersonal as $personnelTimesheet)
                      <tr>
                        <td>{{ $personnelTimesheet->id }}</td>
                        <td>{{ $personnelTimesheet->title }}</td>
                        <td>
                            {{ \App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('name')->first() . ' ' . \App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('family')->first() }}- کارمند
                        </td>
                        <td>{{ $personnelTimesheet->nameproje }}</td>
                        <td>{{ $personnelTimesheet->namekarfarma }}</td>
                        <td>{{ $personnelTimesheet->nahveerja }}</td>

                        <td>{{ jdate($personnelTimesheet->created_at) }}</td>
                        <td style="text-align: center;vertical-align: center;color: #3BAFDA; " >
                            <a target="_blank" href="/Inquiry/detail/{{$personnelTimesheet->id}}"> جزییات</a>
                        </td>
                      </tr>
                      @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </section>
      <!-- End TimeSheet Table -->





        <!-- Start Personnels TimeSheet Table -->
        <section>
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">استعلام های پرسنل</h4>
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
                    <table style="font-family:Byekan;direction: rtl; width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                        <thead>
                        <tr style="text-align: center;">
                            <th>ردیف</th>
                            <th>عنوان استعلام</th>
                            <th>ثبت کننده </th>
                            <th>نام پروژه  </th>
                            <th>نام کارفرما </th>
                            <th> نحوه ارجاع</th>
                            <th>تاریخ و زمان ثبت</th>
                            <th> جزییات</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center" >

                            @foreach($InquiryAll as $personnelTimesheet)
                            <tr>
                                <td>{{ $personnelTimesheet->id }}</td>
                                <td>{{ $personnelTimesheet->title }}</td>
                                <td>
                                    {{ \App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('name')->first() . ' ' . \App\User::where('id', $personnelTimesheet->user_id)->get()->pluck('family')->first() }}- کارمند
                                </td>
                                <td>{{ $personnelTimesheet->nameproje }}</td>
                                <td>{{ $personnelTimesheet->namekarfarma }}</td>
                                <td>{{ $personnelTimesheet->nahveerja }}</td>

                                <td>{{ jdate($personnelTimesheet->created_at) }}</td>

                                <td style="text-align: center;vertical-align: center;color: #3BAFDA; " >
                                    <a target="_blank" href="/Inquiry/detail/{{$personnelTimesheet->id}}"> جزییات</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>


        </section>
        <!-- End Personnels TimeSheet Table -->





    </div>
  </div>
</div>

@endsection
@section('footerscripts')
<script src="vendors/timetables/js/jquery.min.js"></script>
<script src="vendors/timetables/js/jquery.magnific-popup.js"></script>
<script src="vendors/timetables/js/timetable.js"></script>

<script src="/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>


<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>

<script src="/vendors/timetables/js/moment.min.js"></script>
<script src="/vendors/timetables/js/bootstrap-datetimepicker.min.js"></script>








<script type="text/javascript">
jQuery(document).ready(function() {

  // hide last wizard submit button
  $("[href=#finish]").hide();


  jQuery('.btn-delete-admin').click(function(e){
    alert("This admin user can't be deleted !");
    e.preventDefault();
  });

  jQuery('.btn-delete').click(function(e){
    var question = 'Are you sure you want to delete this ?';
    if (!confirm(question)) {
      e.preventDefault();
    }
  });

  // Date picker
  jQuery('.date-picker').datetimepicker({
    format: 'DD-MM-YYYY'
  });

  // Time picker
  jQuery('.time-picker').datetimepicker({
    format: 'HH:mm'
  });
});

</script>


@endsection
