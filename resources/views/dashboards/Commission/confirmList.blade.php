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
              <h4 class="card-title">نظرات کمیسیون {{ $commission->mozoo }} </h4>
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
              {{-- <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></button> --}}
              <div class="card-body card-dashboard"><br><br>
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered table-striped table-bordered scroll-horizontal">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>ثبت کننده</th>
                      <th>وضعیت</th>
                     <th>توضیحات</th>
                     <th>موضوع معامله</th>

                    </tr>
                  </thead>
                  <tbody>

                  @foreach($confirms as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $contract->user->name . " " . $contract->user->family }}</td>


                     <td>
                         @if($contract->status && $contract->status  == 'تایید شده')
                         <a class="btn btn-sm btn-success">{{ $contract->status }}</a>
                         @elseif($contract->status && $contract->status  == 'تایید نشده')
                         <a class="btn btn-sm btn-danger">{{ $contract->status }}</a>
                        @endif

                    </td>
                    <td>{{ ($contract->description )}}</td>
                    <td>{{ $commission->mozoo }}</td>

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
