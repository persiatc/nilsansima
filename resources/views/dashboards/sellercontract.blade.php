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
        <h4 class="modal-title" id="myModalLabel17">افزودن قرارداد فروشندگان</h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="SellersContracts" class="form form-horizontal form-bordered striped-rows">
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
              <label class="col-md-3 label-control" for="contractor">نام پیمانکار </label>
              <div class="col-md-9">
                <input type="text" id="contractor" class="form-control" placeholder="نام پیمانکار" name="tarafedovvom">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">مبلغ ماهیانه  </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: ۳۰۰۰۰۰۰۰" name="mablaghMahiane">
              </div>
            </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">مبلغ سالیانه  </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: ۱۳۰۰۰۰۰" name="mablaghSaliane">
              </div>
            </div>





            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">مدت قرارداد</label>
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
              <label class="col-md-3 label-control" for="from">نحوه پرداخت </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="مثال: چک" name="pardakht">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">داور مرضی الطرفین </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" placeholder="" name="davar">
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
    <div class="content-body"><!-- project stats -->


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">لیست قرارداد با فروشندگان یا پیمانکاران</h4>
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
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-exportTableButton file-export ">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>عنوان قرارداد</th>
{{--                      <th>موضوع قرارداد</th>--}}
                      <th>نام پیمانکار</th>
{{--                      <th>مبلغ ماهیانه</th>--}}
{{--                      <th>مبلغ سالیانه</th>--}}
                      <th>مدت قرارداد</th>
                      <th>تاریخ شروع</th>
                      <th>تاریخ پایان</th>
{{--                      <th>نحوه پرداخت </th>--}}
{{--                      <th>داور مرضی الطرفین</th>--}}
{{--                      <th>توضیحات</th>--}}
                      <th>فایل قرارداد</th>
                      <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($contracts as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                        <td style="white-space: normal"><a href="{{ url('SellerContract/show/' . $contract->id) }}">{{ $contract->onvan }}</a></td>
{{--                      <td>{{ $contract->mozoo }}</td>--}}
                      <td>{{ $contract->tarafedovvom }}</td>
{{--                      <td>{{ $contract->mablaghMahiane }}</td>--}}
{{--                      <td>{{ $contract->mablaghSaliane }}</td>--}}
                      <td style="white-space: normal">{{ $contract->moddat }}</td>
                      <td style="white-space: normal">{{ $contract->from }}</td>
                      <td style="white-space: normal">{{ $contract->to }}</td>
{{--                      <td>{{ $contract->pardakht }}</td>--}}
{{--                      <td>{{ $contract->davar }}</td>--}}
{{--                      <td>{{ $contract->description }}</td>--}}
                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a href="{{ $contract->contractorFile }}"> <i class="ft-file-text" ></i> </a></td>
                      <td style="text-align:center;color: #3BAFDA"><a href="SellerContract/edit/{{ $contract->id }}"><i style="font-size: 20px" class="ft-edit"></i></a> <a href="SellerContract/delete/{{ $contract->id }} "><i style="font-size: 20px" class="ft-x-square danger"></i>  </a> </td>
                    </tr>
                  @endforeach


                  </tbody>
{{--                  <tfoot>--}}
{{--                    <tr style="text-align: center" >--}}
{{--                      <th>ردیف</th>--}}
{{--                      <th>عنوان قرارداد</th>--}}
{{--                      <th>موضوع قرارداد</th>--}}
{{--                      <th>طرف دوم قرارداد</th>--}}
{{--                      <th>مبلغ ماهیانه</th>--}}
{{--                      <th>مبلغ سالیانه</th>--}}
{{--                      <th>مدت قرارداد</th>--}}
{{--                      <th>تاریخ شروع</th>--}}
{{--                      <th>تاریخ پایان</th>--}}
{{--                      <th>نحوه پرداخت </th>--}}
{{--                      <th>داور مرضی الطرفین</th>--}}
{{--                      <th>توضیحات</th>--}}
{{--                      <th>فایل قرارداد</th>--}}
{{--                      <th>تغییرات</th>--}}
{{--                    </tr>--}}
{{--                  </tfoot>--}}
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
