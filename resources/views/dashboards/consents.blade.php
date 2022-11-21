@extends('layouts/dashboard')

@section('headerscripts')
<style media="screen">

.amcharts-legend-value{
  font-size: 20px!important;
  font-weight: bold!important;
}
.amcharts-legend-label{
  font-weight: bold!important;
}

</style>
@endsection

@section('content')


<div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">رضایت نامه / حسن انجام کار</h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="/consent" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="exporterName">نام صادر کننده  </label>
              <div class="col-md-9">
                <input type="text" id="exporterName" class="form-control" name="exporterName">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="subject">موضوع</label>
              <div class="col-md-9">
                <input type="text" id="subject" class="form-control"  name="subject">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="issueDate">تاریخ صدور</label>
              <div class="col-md-9">
                <input style="font-family:Byekan" autocomplete="off" class="form-control"  placeholder="کلیک کنید" name="issueDate" type="text" id="input1"/>
              </div>
            </div>



            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="file">فایل</label>
              <div class="col-md-9">
                <input type="file" id="file" class="form-control" name="file">
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
              <h4 class="card-title">لیست رضایت نامه ها </h4>
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
              <div class="card-body card-dashboard"><br><br>
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>نام  صادرکننده </th>
                      <th>موضوع </th>
                      <th>تاریخ صدور</th>
                      <th>ثبت کننده</th>
                      <th>فایل  </th>
                      <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($consents as $Certificate)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td style="white-space: normal">{{ $Certificate->exporterName }}</td>
                      <td style="white-space: normal">{{ $Certificate->subject }}</td>
                      <td>{{ jdate($Certificate->issueDate) }}</td>
                      <td>{{ $Certificate->user->name .' '. $Certificate->user->family }}</td>
                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a target="_blank" href="{{ $Certificate->file }}"> <i class="ft-file-text" ></i> </a></td>
                      <td style="text-align:center;color: #3BAFDA">
                          <a href="consent/delete/{{ $Certificate->id }}" onclick="return confirm('آیا برای حذف سند اطمینان دارید؟');"><i style="font-size: 20px" class="ft-x-square danger"></i>  </a>
                          {{-- <a href="consent/edit/{{ $Certificate->id }}">
                              <i style="font-size: 20px" class="ft-edit primary"></i>
                          </a> --}}
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



    </div>
  </div>
</div>



@endsection


@section('footerscripts')
<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
