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
        <h4 class="modal-title" id="myModalLabel17">افزودن کمیسیون جزیی </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="CommissionPartial" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> کمیسیون جزیی</h4>
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


            <div class="form-group row">
              <label class="col-md-3 label-control" for="arzeshmoamele">ارزش معامله </label>
              <div class="col-md-9">
                <input type="text" id="arzeshmoamele" class="form-control"  name="arzeshmoamele">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="tedadestelambaha">تعداد فقره های استعلام بها  </label>
              <div class="col-md-9">
                <input type="text" id="tedadestelambaha" class="form-control"  name="tedadestelambaha">
              </div>
            </div>

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="fileestelambaha">بارگزاری مستندات استعلام بها</label>
                <div class="col-md-9">
                  <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha">
                </div>
              </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="typekala">نوع و مشخصات کالا </label>
              <div class="col-md-9">
                <input type="text" id="typekala" class="form-control" name="typekala">
              </div>
            </div>





            <div class="form-group row last">
              <label class="col-md-3 label-control" for="datesabt">تاریخ ثبت خرید</label>
              <div class="col-md-9">
                <input type="text" id="datesabt" class="form-control" name="datesabt">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
              <div class="col-md-9">
                <input type="text" id="mahaltahvil" class="form-control"  name="mahaltahvil">
              </div>
            </div>



            <div class="form-group row last">
              <label class="col-md-3 label-control" for="hazinehaml">هزینه حمل</label>
              <div class="col-md-9">
                <input type="text" id="hazinehaml" class="form-control" name="hazinehaml">
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
                <label class="col-md-3 label-control" for="email_status">آیا مکاتبات از طریق ایمیل tc@persiatc.com  انجام شده ؟ </label>
                <div class="col-md-9">
                    <select name="email_status" id="" class="form-control">
                        <option>انتخاب کنید</option>
                        <option value="بله">بله</option>
                        <option value="خیر">خیر</option>
                    </select>
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
@foreach($commissions as $commission)
<div style="font-family:Byekan" class="modal fade text-left" id="editid{{ $commission->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $commission->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $commission->id }}">بروزرسانی فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="CommissionPartial/update" class="form form-horizontal form-bordered striped-rows">
            @csrf
            <input type="hidden" class="form-control" value="{{ $commission->id }}"  name="id">

            <div style="font-family:byekan" class="form-body">
              <h4 class="form-section"><i class="ft-user"></i> کمیسیون جزیی</h4>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="mozoo">موضوع معامله</label>
                <div class="col-md-9">
                  <input type="text" id="mozoo" class="form-control" value="{{ $commission->mozoo }}"  name="mozoo">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="darkhastkonande">نام درخواست کننده خرید کالا یا خدمات</label>
                <div class="col-md-9">
                  <input type="text" id="darkhastkonande" class="form-control" value="{{ $commission->darkhastkonande }}"  name="darkhastkonande">
                </div>
              </div>


              <div class="form-group row">
                <label class="col-md-3 label-control" for="arzeshmoamele">ارزش معامله </label>
                <div class="col-md-9">
                  <input type="text" id="arzeshmoamele" class="form-control" value="{{ $commission->arzeshmoamele }}"  name="arzeshmoamele">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="tedadestelambaha">تعداد فقره های استعلام بها  </label>
                <div class="col-md-9">
                  <input type="text" id="tedadestelambaha" class="form-control" value="{{ $commission->tedadestelambaha }}"  name="tedadestelambaha">
                </div>
              </div>

              <div  class="form-group row last">
                  <label class="col-md-3 label-control" for="fileestelambaha">بارگزاری مجدد مستندات استعلام بها</label>
                  <div class="col-md-9">
                    <input type="file" id="fileestelambaha" value="{{ $commission->fileestelambaha }}" class="form-control" name="fileestelambaha">
                  </div>
                </div>

              <div class="form-group row last">
                <label class="col-md-3 label-control" for="typekala">نوع و مشخصات کالا </label>
                <div class="col-md-9">
                  <input type="text" id="typekala" class="form-control" value="{{ $commission->typekala }}" name="typekala">
                </div>
              </div>





              <div class="form-group row last">
                <label class="col-md-3 label-control" for="datesabt">تاریخ ثبت خرید</label>
                <div class="col-md-9">
                  <input type="text" id="datesabt" class="form-control" value="{{ $commission->datesabt }}" name="datesabt">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
                <div class="col-md-9">
                  <input type="text" id="mahaltahvil" class="form-control" value="{{ $commission->mahaltahvil }}"  name="mahaltahvil">
                </div>
              </div>



              <div class="form-group row last">
                <label class="col-md-3 label-control" for="hazinehaml">هزینه حمل</label>
                <div class="col-md-9">
                  <input type="text" id="hazinehaml" class="form-control" value="{{ $commission->hazinehaml }}" name="hazinehaml">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="garanti">گارانتی </label>
                <div class="col-md-9">
                  <input type="text" id="garanti" class="form-control" value="{{ $commission->garanti }}"  name="garanti">
                </div>
              </div>


              <div class="form-group row last">
                <label class="col-md-3 label-control" for="khadamatpasazforosh">خدمات پس از فروش </label>
                <div class="col-md-9">
                  <input type="text" id="khadamatpasazforosh" class="form-control" value="{{ $commission->khadamatpasazforosh }}"  name="khadamatpasazforosh">
                </div>
              </div>

              <div class="form-group row last">
                  <label class="col-md-3 label-control" for="email_status">آیا مکاتبات از طریق ایمیل tc@persiatc.com  انجام شده ؟ </label>
                  <div class="col-md-9">
                      <select name="email_status" id="" class="form-control">
                          <option>انتخاب کنید</option>
                          <option value="بله">بله</option>
                          <option value="خیر">خیر</option>
                      </select>
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

<!--  Start Edit Task Assigned to Me -->
@foreach($commissions as $commission)
<div style="font-family:Byekan" class="modal fade text-left" id="PurchaseRequestFormsStatus{{ $commission->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $commission->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $commission->id }}">بروزرسانی وضعیت فرم درخواست خرید</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">

        <form style="vertical-align:center;text-align:center"  method="post" action="CommissionPartial/update" class="form form-horizontal form-bordered striped-rows">
            @csrf
            <input type="hidden" class="form-control" value="{{ $commission->id }}"  name="id">
            <input type="hidden" class="form-control" value="{{ get_class($commission) }}"  name="type">


            <div style="font-family:byekan" class="form-body">


                <div class="form-group row">
                    <label class="col-md-3 label-control" for="status">تاییدیه  </label>
                    <div class="col-md-9">
                        <select name="status" id="status" class="form-control">
                            <option value="تایید شده">بله</option>
                            <option value="تایید نشده">خیر</option>
                        </select>
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
              <h4 class="card-title">لیست کمیسیون های جزیی</h4>
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
                <table style="font-family:Byekan;width: 100%" class="table display nowrap   table-striped table-bordered scroll-horizontal ">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>موضوع معامله</th>
                     <th>نام درخواست کننده</th>
                      <th>ارزش معامله</th>
                     <th>تعداد فقره های استعلام بها</th>
                     <th>مستندات استعلام بها</th>
                      {{-- <th>نوع و مشخصات کالا</th> --}}
                      <th>تاریخ ثبت خرید</th>
                      <th>وضعیت فرم درخواست پرداخت</th>
                      <th>وضعیت فرم درخواست خرید</th>
                      <th>درخواست خرید</th>
                      <th>ثبت کننده </th>
                      {{-- <th>محل تحویل کالا</th>
                     <th>هزینه حمل </th>
                     <th>گارانتی</th>
                     <th>خدمات پس از فروش</th>
                      <th>نحوه انجام مکاتبات از طریق ایمیل شرکت</th>
                      <th>نظر کمیسیون معاملات</th>
                      <th>عملیات</th> --}}

                    </tr>
                  </thead>
                  <tbody>

                  @foreach($commissions as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td
                        <td style="white-space: normal">{{ $contract->mozoo }}</td>
                     <td>{{ $contract->darkhastkonande }}</td>
                      <td>{{ $contract->arzeshmoamele }}</td>
                     <td>{{ $contract->tedadestelambaha }}</td>
                     <td>
                        {{-- @if($contract->fileestelambaha == "storage/CommissionPartial/nothing")
                        ---
                    @else --}}
                    <a target="_blank" href="/{{ $contract->fileestelambaha1 }}"> {!! $contract->fileestelambaha1 !== "storage/CommissionPartial/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                    <a target="_blank" href="/{{ $contract->fileestelambaha2 }}"> {!! $contract->fileestelambaha2 !== "storage/CommissionPartial/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                    <a target="_blank" href="/{{ $contract->fileestelambaha3 }}"> {!! $contract->fileestelambaha3 !== "storage/CommissionPartial/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
                    {{-- @endif --}}

                    </td>
                      {{-- <td style="white-space: normal">{{ $contract->typekala }}</td> --}}

                    <td style="white-space: normal">{{ $contract->datesabt }}</td>
                    <td><a class="btn btn-sm btn-warning">{{ $contract->PaymentOrderForms->first()->status ?? ''  }}</a></td>
                    <td>
                        {{-- <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#PurchaseRequestFormsStatus{{ $contract->id }}" >{{ $contract->PurchaseRequestForms->first()->status ?? ''  }}</a> --}}

                        <a class="btn btn-sm btn-warning" href="{{route('updatePurchaseRequestFormsStatus', ['type'=> get_class($contract), 'id' => $contract->id])}}">
                            {{-- {{ $contract->PurchaseRequestForms->first()->status ?? ''  }} --}}
                            پیگیری فرم درخواست خرید
                        </a>
                    </td>
                    <td>{{ $contract->purchaseRequest->onvan }} </td>
                    <td>{{ $contract->user->name . " " . $contract->user->family }}</td>

                      {{-- <td style="white-space: normal">{{ $contract->mahaltahvil }}</td>
                     <td>{{ $contract->hazinehaml }}</td>
                     <td>{{ $contract->garanti }}</td>
                     <td>{{ $contract->khadamatpasazforosh }}</td>
                     <td>{{ $contract->email_status ?? ''}}</td>
                    <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" >
                        <a href="Commission/storeIdeaComision"> ثبت نظر کمیسیون </a>
                    </td>

                      <td style="text-align:center;color: #3BAFDA">
                        <a data-toggle="modal" data-target="#editTdl{{ $contract->id }}" ><i style="font-size: 20px; color: #007bff" class="ft-edit"></i></a>
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
