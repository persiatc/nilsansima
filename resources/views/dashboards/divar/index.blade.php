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
        <h4 class="modal-title" id="myModalLabel17">ثبت آگهی</h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="Dokumentation" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">عنوان آگهی   </label>
              <div class="col-md-9">
                <input type="text" id="name" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="saderKonandeh">توضیحات</label>
              <div class="col-md-9">
                <textarea id="saderKonandeh" class="form-control"  name="saderKonandeh"></textarea>
              </div>
            </div>

            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="file">فایل پیوست</label>
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


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="">لیست آگهی های من</h1>
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
                      <th>عنوان   </th>
                      <th>تاریخ ثبت </th>
                      <th>فایل</th>
                      <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>
                   {{--  --}}
                    @foreach($Dokumentation as $Certificate)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td style="white-space: normal">{{ $Certificate->name }}</td>
                      <td>{{ $Certificate->dateEnd }}</td>
                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a target="_blank" href="{{ $Certificate->file }}"> <i class="ft-file-text" ></i> </a></td>
                      <td style="text-align:center;color: #3BAFDA">
                          <a href="Dokumentation/delete/{{ $Certificate->id }}" onclick="return confirm('آیا برای حذف سند اطمینان دارید؟');"><i style="font-size: 20px" class="ft-x-square danger"></i>  </a>
                          <a href="Dokumentation/edit/{{ $Certificate->id }}">
                              <i style="font-size: 20px" class="ft-edit primary"></i>
                          </a>
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
