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
        <h4 class="modal-title" id="myModalLabel17">افزودن معاملات متوسط </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="CommissionMedium" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> معاملات متوسط</h4>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="mozoo">موضوع معامله</label>
              <div class="col-md-9">
                <input type="text" id="mozoo" class="form-control"  name="mozoo">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="darkhastkonande">نام درخواست کننده خرید کالا یا خدمات</label>
              <div class="col-md-9">
                <input type="text" id="darkhastkonande" class="form-control"  name="darkhastkonande">
              </div>
            </div>
            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="filemadarek">بارگزاری مدارک مورد نیاز</label>
                <div class="col-md-9">
                  <input type="file" id="filemadarek" class="form-control" name="filemadarek">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="tedadtaminkonandegan">تعداد تامین کنندگان </label>
                <div class="col-md-9">
                  <input type="text" id="tedadtaminkonandegan" class="form-control"  name="tedadtaminkonandegan">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="nametaminkonandegan">اسامی تامین کنندگان </label>
                <div class="col-md-9">
                  <input type="text" id="nametaminkonandegan" class="form-control"  name="nametaminkonandegan">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="moshakhasatkala">مشخصات کالا </label>
                <div class="col-md-9">
                  <input type="text" id="moshakhasatkala" class="form-control"  name="moshakhasatkala">
                </div>
              </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="arzeshkala">ارزش کالا </label>
              <div class="col-md-9">
                <input type="text" id="arzeshkala" class="form-control"  name="arzeshkala">
              </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
                <div class="col-md-9">
                  <input type="text" id="mahaltahvil" class="form-control"  name="mahaltahvil">
                </div>
              </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="hazinehaml">هزینه  حمل  </label>
              <div class="col-md-9">
                <input type="text" id="hazinehaml" class="form-control"  name="hazinehaml">
              </div>
            </div>

            <div class="form-group row last">
                <label class="col-md-3 label-control" for="garanti">گارانتی </label>
                <div class="col-md-9">
                  <input type="text" id="garanti" class="form-control"  name="garanti">
                </div>
              </div>

              <div class="form-group row last">
                <label class="col-md-3 label-control" for="khadamatpasazforosh">خدمات پس از فروش </label>
                <div class="col-md-9">
                  <input type="text" id="khadamatpasazforosh" class="form-control"  name="khadamatpasazforosh">
                </div>
              </div>

              <div class="form-group row last">
                <label class="col-md-3 label-control" for="zamantahvil">حداکثر زمانبندی تحویل </label>
                <div class="col-md-9">
                  <input type="text" id="zamantahvil" class="form-control"  name="zamantahvil">
                </div>
              </div>

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="fileestelambaha">بارگزاری مستندات استعلام بها</label>
                <div class="col-md-9">
                  <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha">
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


<!--  Start Edit Task Assigned to Me -->
@foreach($contracts as $commission)
<div style="font-family:Byekan" class="modal fade text-left" id="editTdl{{ $commission->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $commission->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $commission->id }}">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="SellersContracts" class="form form-horizontal form-bordered striped-rows">
            @csrf
            <div style="font-family:byekan" class="form-body">
              <h4 class="form-section"><i class="ft-user"></i> معاملات متوسط</h4>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="mozoo">موضوع معامله</label>
                <div class="col-md-9">
                  <input type="text" id="mozoo" class="form-control"  name="mozoo">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="darkhastkonande">نام درخواست کننده خرید کالا یا خدمات</label>
                <div class="col-md-9">
                  <input type="text" id="darkhastkonande" class="form-control"  name="darkhastkonande">
                </div>
              </div>
              <div  class="form-group row last">
                  <label class="col-md-3 label-control" for="filemadarek">بارگزاری مدارک مورد نیاز</label>
                  <div class="col-md-9">
                    <input type="file" id="filemadarek" class="form-control" name="filemadarek">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="tedadtaminkonandegan">تعداد تامین کنندگان </label>
                  <div class="col-md-9">
                    <input type="text" id="tedadtaminkonandegan" class="form-control"  name="tedadtaminkonandegan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="nametaminkonandegan">اسامی تامین کنندگان </label>
                  <div class="col-md-9">
                    <input type="text" id="nametaminkonandegan" class="form-control"  name="nametaminkonandegan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="moshakhasatkala">مشخصات کالا </label>
                  <div class="col-md-9">
                    <input type="text" id="moshakhasatkala" class="form-control"  name="moshakhasatkala">
                  </div>
                </div>

              <div class="form-group row">
                <label class="col-md-3 label-control" for="arzeshkala">ارزش کالا </label>
                <div class="col-md-9">
                  <input type="text" id="arzeshkala" class="form-control"  name="arzeshkala">
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
                  <div class="col-md-9">
                    <input type="text" id="mahaltahvil" class="form-control"  name="mahaltahvil">
                  </div>
                </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="hazinehaml">هزینه  حمل  </label>
                <div class="col-md-9">
                  <input type="text" id="hazinehaml" class="form-control"  name="hazinehaml">
                </div>
              </div>

              <div class="form-group row last">
                  <label class="col-md-3 label-control" for="garanti">گارانتی </label>
                  <div class="col-md-9">
                    <input type="text" id="garanti" class="form-control"  name="garanti">
                  </div>
                </div>

                <div class="form-group row last">
                  <label class="col-md-3 label-control" for="khadamatpasazforosh">خدمات پس از فروش </label>
                  <div class="col-md-9">
                    <input type="text" id="khadamatpasazforosh" class="form-control"  name="khadamatpasazforosh">
                  </div>
                </div>

                <div class="form-group row last">
                  <label class="col-md-3 label-control" for="zamantahvil">حداکثر زمانبندی تحویل </label>
                  <div class="col-md-9">
                    <input type="text" id="zamantahvil" class="form-control"  name="zamantahvil">
                  </div>
                </div>

              <div  class="form-group row last">
                  <label class="col-md-3 label-control" for="fileestelambaha">بارگزاری مستندات استعلام بها</label>
                  <div class="col-md-9">
                    <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha">
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
@endforeach
<!--  End Edit Task Assigned to Me -->






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
              <h4 class="card-title">لیست معاملات  متوسط</h4>
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
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-striped table-bordered scroll-horizontal">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>موضوع خرید</th>
                     <th>نام درخواست کننده</th>
                     <th>مدارک </th>

                      <th>تعداد تامیین کنندگان</th>
                     <th>اسامی تامین کنندگان </th>
                     <th>مشخصات کالا </th>
                     <th>ارزش کالا </th>

                     <th>محل تحویل کالا </th>
                     <th>هزینه حمل </th>
                     <th>گارانتی</th>
                     <th>خدمات پس از فروش</th>
                     <th>حداکثر زمانبندی تحویل </th>
                     <th>مستندات استعلام بها</th>
                     <th>نظر معاملات معاملات</th>
                     <th>عملیات</th>


                    </tr>
                  </thead>
                  <tbody>

                  @foreach($contracts as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $loop->iteration }}</td>

                        <td style="white-space: normal"><a href="{{ url('SellerContract/show/' . $contract->id) }}">{{ $contract->onvan }}</a></td>
                     <td>{{ $contract->mozoo }}</td>
                      <td>{{ $contract->tarafedovvom }}</td>
                     <td>{{ $contract->mablaghMahiane }}</td>
                     <td>{{ $contract->mablaghSaliane }}</td>
                      <td style="white-space: normal">{{ $contract->moddat }}</td>
                      <td style="white-space: normal">{{ $contract->from }}</td>
                      <td style="white-space: normal">{{ $contract->to }}</td>
                     <td>{{ $contract->pardakht }}</td>
                     <td>{{ $contract->davar }}</td>
                     <td>{{ $contract->description }}</td>
                     <td>{{ $contract->description }}</td>
                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a href="{{ $contract->contractorFile }}"> <i class="ft-file-text" ></i> </a></td>
                      <td style="text-align:center;color: #3BAFDA"><a href="SellerContract/edit/{{ $contract->id }}"><i style="font-size: 20px" class="ft-edit"></i></a> <a href="SellerContract/delete/{{ $contract->id }} "><i style="font-size: 20px" class="ft-x-square danger"></i>  </a> </td>
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
