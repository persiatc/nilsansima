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
        <h4 class="modal-title" id="myModalLabel17">افزودن قرارداد</h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="contracts" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> توضیحات قرارداد</h4>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">عنوان قرارداد</label>
              <div class="col-md-9">
                <input type="text" id="name" class="form-control" placeholder="عنوان قرارداد" name="onvan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">موضوع قرارداد</label>
              <div class="col-md-9">
                <input type="text" id="description" class="form-control" placeholder="موضوع قرارداد" name="mozoo">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="contractor">نام پیمانکار</label>
              <div class="col-md-9">
                <input type="text" id="contractor" class="form-control" placeholder="نام پیمانکار" name="peymankar">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">مبلغ قرارداد </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: ۳۰۰۰۰۰۰" name="mablagh">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">نحوه پرداخت </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: چک" name="pardakht">
              </div>
            </div>




            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">مدت قرارداد </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: یکساله" name="moddat">
              </div>
            </div>



            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">تاریخ شروع</label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: ۱۳۹۷/۰۶/۲۱" name="from">
              </div>
            </div>



            <div class="form-group row last">
              <label class="col-md-3 label-control" for="to">تاریخ پایان</label>
              <div class="col-md-9">
                <input type="text" id="to" class="form-control" placeholder="مثال: ۱۳۹۷/۱۱/۲۱" name="to">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">نوع تضمین </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: ضمانت بانکی" name="tazmin">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">ناظر قرارداد </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: شرکت ..." name="nazer">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">توضیحات</label>
              <div class="col-md-9">
                <textarea name="description" rows="8"  class="form-control" cols="80"></textarea>
              </div>
            </div>

            <div  class="form-group row last">
              <label class="col-md-3 label-control" for="contractorFile">آپلود فایل قرارداد</label>
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
    <div class="content-body">
        <h4 class="card-title alert alert-danger">برای خرید های ثبت شده معامله باید ثبت کنید!</h4>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">خرید های ثبت شده</h4>


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

            <a href="PurchaseRequest/create"  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></a>
              <div class="card-body card-dashboard"><br><br>
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-exportTableButton file-export ">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>عنوان خرید</th>
                     <th>شرح خرید</th>
                      <th>خریدار</th>
                      <th>ارزش خرید</th>
                     <th>نحوه پرداخت </th>
                      <th>مدت زمان</th>
                      <th>تاریخ شروع</th>
                      <th>تاریخ پایان</th>
                      <th>ثبت معامله جزیی مرتبط</th>

                     {{-- <th>وضعیت</th> --}}
                      <th>فایل</th>
                      {{-- <th>عملیات</th> --}}

                    </tr>
                  </thead>
                  <tbody>

                  @foreach($contracts as $contract)
                    <tr>
                      <td> {{ $loop->iteration }}</td>
                     <td>{{ $contract->onvan }}</td>
                      <td style="white-space: normal">{{ $contract->description }}</td>

                      <td style="white-space: normal">{{ $contract->peymankar }}</td>
                      <td style="white-space: normal">{{ $contract->mablagh }}</td>
                      <td style="white-space: normal">{{ $contract->pardakht }}</td>
                     <td>{{ $contract->moddat }}</td>
                     <td>{{ $contract->from }}</td>
                     <td>{{ $contract->to }}</td>


                     <td style="white-space: normal">
                        @if($contract->mablagh <= 100000000)
                            <a href="{{route('CommissionPartial.create', ['type'=> get_class($contract), 'id' => $contract->id])}}" >
                                ثبت معامله
                                <span class="badge badge-danger">
                                جزیی
                                </span>
                            </a>
                            <a href="{{route('CommissionMajor', ['type'=>get_class($contract),'id' => $contract->id])}}" title="نمایش لیست معاملات  ">
                                <i style="font-size: 20px" class="ft-list primary"></i>
                            </a>
                        @else
                            <a href="{{route('CommissionMajor.create', ['type'=> get_class($contract), 'id' => $contract->id])}}" >
                                ثبت معامله
                                <span class="badge badge-danger">
                                کلی
                                </span>
                            </a>
                            <a href="{{route('CommissionMajor', ['type'=>get_class($contract),'id' => $contract->id])}}" title="نمایش لیست معاملات  ">
                                <i style="font-size: 20px" class="ft-list primary"></i>
                            </a>
                        @endif
                    </td>
                     {{-- <td style="white-space: normal">
                        <button type="button" class="btn btn-warning mr-1">
                            {{ $contract->status }}
                          </button>

                    </td> --}}

                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a href="{{ $contract->contractorFile }}"> <i class="ft-file-text" ></i> </a></td>
                      {{-- <td style="text-align:center;color: #3BAFDA">
                          <a href="/CommissionMajor/create/{{ $contract->id }}" title="افزودن معامله"><i style="font-size: 20px" class="ft-plus-square success"></i>  </a>
                          <a href="/PurchaseRequest/CommissionMajorList/{{ $contract->id }}" title="نمایش لیست معاملات  خرید">
                              <i style="font-size: 20px" class="ft-list primary"></i>
                          </a>
                      </td> --}}

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
