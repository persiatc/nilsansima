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
        <h4 class="modal-title" id="myModalLabel17">افزودن کمیسیون عمده </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="CommissionMajor" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> کمیسیون عمده</h4>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">موضوع معامله</label>
              <div class="col-md-9">
                <input type="text" id="name" class="form-control"  name="onvan">
              </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="contractor"> تاریخ برگزاری مناقصه یا مزایده عمومی </label>
                <div class="col-md-9">
                  <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="from" multiple>نوع مناقصه </label>
                <div class="col-md-9">
                    <select name="" id="" class="form-control">
                        <option value="">یک مرحله ای</option>
                        <option value="">دو مرحله ای</option>
                        <option value="">عمومی  </option>
                        <option value="">محدود  </option>

                    </select>
                </div>
              </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="contractor">ارزش معامله </label>
              <div class="col-md-9">
                <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
              </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="contractor">تعداد تامین کنندگان </label>
                <div class="col-md-9">
                  <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="contractor">مشخصات کالا</label>
                <div class="col-md-9">
                  <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="contractor">ارزش کالا</label>
                <div class="col-md-9">
                  <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="from">محل تحویل کالا</label>
                <div class="col-md-9">
                  <input type="text" id="from" class="form-control"  name="from">
                </div>
              </div>



              <div class="form-group row last">
                <label class="col-md-3 label-control" for="to">هزینه حمل</label>
                <div class="col-md-9">
                  <input type="text" id="to" class="form-control" name="to">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="from">گارانتی </label>
                <div class="col-md-9">
                  <input type="text" id="from" class="form-control"  name="pardakht">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="from">خدمات پس از فروش </label>
                <div class="col-md-9">
                  <input type="text" id="from" class="form-control"  name="davar">
                </div>
              </div>

              <div class="form-group row last">
                <label class="col-md-3 label-control" for="from">مدت معامله </label>
                <div class="col-md-9">
                  <input type="text" id="from" class="form-control"  name="pardakht">
                </div>
              </div>







            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="contractorFile">بارگزاری مستندات استعلام بها</label>
                <div class="col-md-9">
                  <input type="file" id="contractorFile" class="form-control" name="contractorFile">
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
              <h4 class="card-title">لیست کمیسیون های عمده درخواست خرید با عنوان {{ $contracts->first()->purchaseRequest->onvan }} </h4>
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
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered table-striped table-bordered scroll-horizontal">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>موضوع معامله</th>
                     <th>تاریخ برگزاری مناقصه یا مزایده عمومی</th>
                     <th>نوع مناقصه</th>

                      <th>ارزش معامله</th>
                      <th>تعداد تامین کنندگان</th>
                      {{-- <th>مشخصات کالا</th>
                      <th>ارزش کالا</th> --}}
                      <th>محل تحویل کالا</th>
                      <th>هزینه حمل </th>
                      <th>گارانتی</th>
                      <th>خدمات پس از فروش</th>
                     <th>مدت معامله</th>
                     <th>مستندات استعلام بها</th>
                     {{-- <th>نظر کمیته فنی و بازرگانی</th> --}}
                     <th>نظر کمیسیون معاملات</th>
                     <th>ثبت کننده مناقصه</th>
                     <th>درخواست خرید</th>
                     <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($contracts as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                        <td style="white-space: normal">{{ $contract->mozoo }}</td>
                     <td>{{ ($contract->datebargozari )}}</td>
                      <td>{{ $contract->typemonaqese }}</td>
                     <td>{{ $contract->arzeshmoamele }}</td>
                     <td>{{ $contract->tedadtaminkonandegan }}</td>
                      <td style="white-space: normal">{{ $contract->mahaltahvil }}</td>
                      <td style="white-space: normal">{{ $contract->hazinehaml }}</td>
                     <td>{{ $contract->garanti }}</td>
                     <td>{{ $contract->khadamatpasazforosh }}</td>
                     <td>{{ $contract->modatmoamele }}</td>
                     <td>
                        @if($contract->fileestelambaha == "storage/CommissionMajor/nothing")
                        ---
                        @else
                            <a target="_blank" href="/{{ $contract->fileestelambaha }}"> {!! $contract->fileestelambaha !== "storage/CommissionPartial/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                        @endif
                    </td>

                     <td>
                         @if($contract->confirms->first() && $contract->confirms->first()->status  == 'تایید شده')
                         <a class="btn btn-sm btn-success">{{ $contract->confirms->first()->status ?? '' }}</a>
                         @elseif($contract->confirms->first() && $contract->confirms->first()->status  == 'تایید نشده')
                         <a class="btn btn-sm btn-danger">{{ $contract->confirms->first()->status ?? '' }}</a>
                         @else
                         <a class="btn btn-sm btn-warning">بررسی نشده</a>
                         @endif
                         <br>
                         <a class="btn btn-primary btn-sm" href="{{route('storeIdeaComision', ['type'=> get_class($contract), 'id' => $contract->id])}}"> ثبت نظر کمیسیون </a>
                         <br>
                         <a class="btn btn-info btn-sm" href="{{route('Confirm.index', ['type'=> get_class($contract), 'id' => $contract->id])}}"> نمایش نظرات </a>

                    </td>

                    <td>{{ $contract->user->name . " " . $contract->user->family }}</td>

                     <td>{{ $contract->purchaseRequest->onvan }} </td>
                    <td style="text-align:center;color: #3BAFDA">
                        {{-- <a href="/CommissionMajor/edit/{{ $contract->id }}"><i style="font-size: 20px" class="ft-edit"></i></a> --}}
                        <a href="/CommissionMajor/delete/{{ $contract->id }} "><i style="font-size: 20px" class="ft-x-square danger"></i>  </a>
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
