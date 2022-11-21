@extends('layouts/dashboard')

@section('headerscripts')
<style media="screen">



    tspan{
      font-size: 16px!important;

    }
    .dataTables_wrapper{
      direction: rtl;
    }

    /* asiye added */
    .witheColor{
        color: #6c757d !important;
    }

    </style>
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">



                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ثبت معامله جزیی</h4>
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
                                <div class="card-body card-dashboard"><br><br>


                                    <div class="text-left" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت  معامله جزیی</h4>

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

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="/CommissionPartial" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $id }}" >
                                                        <input type="hidden" name="type" value="{{ $type }}" >

                                                        <div style="font-family:byekan" class="form-body productDivBody">
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

                                                              {{-- <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="typekala">نوع و مشخصات کالا </label>
                                                                <div class="col-md-9">
                                                                  <input type="text" id="typekala" class="form-control" name="typekala">
                                                                </div>
                                                              </div> --}}

                                                              <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="datesabt">تاریخ ثبت خرید</label>
                                                                <div class="col-md-9">
                                                                    <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" autocomplete="off" name="datesabt" type="text" id="input1"/>
                                                                </div>
                                                              </div>


                                                              {{-- <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="mahaltahvil">محل تحویل کالا</label>
                                                                <div class="col-md-9">
                                                                  <input type="text" id="mahaltahvil" class="form-control"  name="mahaltahvil">
                                                                </div>
                                                              </div> --}}


                                                              {{-- <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="hazinehaml">هزینه حمل</label>
                                                                <div class="col-md-9">
                                                                  <input type="text" id="hazinehaml" class="form-control" name="hazinehaml">
                                                                </div>
                                                              </div> --}}


                                                              {{-- <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="garanti">گارانتی </label>
                                                                <div class="col-md-9">
                                                                  <input type="text" id="garanti" class="form-control"  name="garanti">
                                                                </div>
                                                              </div> --}}


                                                              {{-- <div class="form-group row last">
                                                                <label class="col-md-3 label-control" for="khadamatpasazforosh">خدمات پس از فروش </label>
                                                                <div class="col-md-9">
                                                                  <input type="text" id="khadamatpasazforosh" class="form-control"  name="khadamatpasazforosh">
                                                                </div>
                                                              </div> --}}

                                                              {{-- <div class="form-group row last">
                                                                  <label class="col-md-3 label-control" for="email_status">آیا مکاتبات از طریق ایمیل tc@persiatc.com  انجام شده ؟ </label>
                                                                  <div class="col-md-9">
                                                                      <select name="email_status" id="" class="form-control">
                                                                          <option>انتخاب کنید</option>
                                                                          <option value="بله">بله</option>
                                                                          <option value="خیر">خیر</option>
                                                                      </select>
                                                                  </div>
                                                                </div> --}}


                                                                <div class="mostanadatEstelam">
                                                                    <div  class="form-group row last">
                                                                        <label class="col-md-3 label-control" for="fileestelambaha">۱بارگزاری مستندات استعلام بها</label>
                                                                        <div class="col-md-9">
                                                                          <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha1">
                                                                        </div>
                                                                    </div>
                                                                    <div  class="form-group row last">
                                                                        <label class="col-md-3 label-control" for="fileestelambaha">۲بارگزاری مستندات استعلام بها</label>
                                                                        <div class="col-md-9">
                                                                          <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha2">
                                                                        </div>
                                                                    </div>
                                                                    <div  class="form-group row last">
                                                                        <label class="col-md-3 label-control" for="fileestelambaha">۳بارگزاری مستندات استعلام بها</label>
                                                                        <div class="col-md-9">
                                                                          <input type="file" id="fileestelambaha" class="form-control" name="fileestelambaha3">
                                                                        </div>
                                                                    </div>


                                                                    {{-- <div class="form-group row ">
                                                                        <button type="button" class="btn btn-success" id="addProductBtn">
                                                                            <i class="ft-plus"></i> افزودن سند
                                                                        </button>
                                                                    </div> --}}
                                                                </div>


                                                                {{-- <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> مشخصات درخواست خرید</h4>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">عنوان خرید:</label>
                                                                            <input class="form-control" disabled value="{{ $PurchaseRequest->onvan }}">

                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control" type="hidden" value="{{ $PurchaseRequest->id }}" name="purchase_requests_id">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">خریدار:</label>
                                                                            <input class="form-control" disabled value="{{ $PurchaseRequest->peymankar }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">ارزش خرید:</label>
                                                                            <input class="form-control" disabled value="{{ $PurchaseRequest->mablagh }}">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">نحوه پرداخت:</label>
                                                                            <input class="form-control" disabled value="{{ $PurchaseRequest->pardakht }}">
                                                                        </div>
                                                                    </div>



                                                                </div> --}}

                                                                <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> فرم دستور پرداخت</h4>
                                                                <div class="row border m-1 p-1">
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-4">مدیرمحترم بازرگانی/مدیر محترم پروژه :  </div>
                                                                            <input class="form-control col-md-3" name="project_manager">
                                                                            <div class="col-md-5"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-4">خواهشمند است مبلغ (به عدد) (ریال) </div>
                                                                            <input class="form-control col-md-3" name="amount">
                                                                            <div class="col-md-5"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">در وجه شرکت به شماره حساب معرفی شده    جهت خرید </div>
                                                                            <input class="form-control col-md-4" name="to_buy">
                                                                            <div class="col-md-2">پرداخت گردد</div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                {{-- <div class="row border m-1 p-1">
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-7">مدیرعامل محترم شرکت ارتباطات پرشیا:   جناب آقای مهندس رحمانی </div>
                                                                            <div class="col-md-5"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-4">خواهشمند است مبلغ (به عدد) (ریال) </div>
                                                                            <input class="form-control col-md-3">
                                                                            <div class="col-md-5"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">در وجه شرکت به شماره حساب معرفی شده    جهت خرید </div>
                                                                            <input class="form-control col-md-4">
                                                                            <div class="col-md-2">پرداخت گردد</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row border m-1 p-1">
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-2">حسابداری: </div>
                                                                            <div class="col-md-10"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-4">مبلغ(به عدد </div>
                                                                            <input class="form-control col-md-3">
                                                                            <div class="col-md-5">ریال)</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">پرداخت از طریق چک از حساب جاری </div>
                                                                            <input class="form-control col-md-4">
                                                                            <div class="col-md-2">پرداخت گردد</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">و در سرفصل </div>
                                                                            <input class="form-control col-md-4">
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">و کد </div>
                                                                            <input class="form-control col-md-4">
                                                                            <div class="col-md-2">ثبت گردد</div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}




                                                            <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> نوع و مشخصات کالا</h4>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control">شرح کالا  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="description" class="form-control" name="row[0][description]">
                                                                </div>
                                                                <label class="col-md-3 label-control" >مقدار  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="number" class="form-control"  name="row[0][number]">
                                                                </div>
                                                                <label class="col-md-3 label-control" > مقیاس واحد  </label>
                                                                <div class="col-md-9">
                                                                    <select type="text" id="unit" class="form-control" name="row[0][unit]">
                                                                        <option value="عدد">عدد</option>
                                                                        <option value="متر">متر</option>
                                                                        <option value="دستگاه">دستگاه</option>
                                                                    </select>
                                                                </div>
                                                                <label class="col-md-3 label-control" > مرکز هزینه  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  class="form-control" placeholder="" name="row[0][cost_center]">
                                                                </div>
                                                                <label class="col-md-3 label-control" > تاریخ نیاز  </label>
                                                                <div class="col-md-9">
                                                                    <input  class="form-control"  placeholder="کلیک کنید" autocomplete="off" name="row[0][Date_required]" type="text" id="input1"/>
                                                                </div>
                                                                <label class="col-md-3 label-control" > قیمت براوردی  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  class="form-control" placeholder="به ریال وارد کنید" name="row[0][unit_price]">
                                                                </div>
                                                                <label class="col-md-3 label-control">توضیح   </label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  class="form-control" name="row[0][Explanation]">
                                                                </div>
                                                            </div>




                                                            <div class="form-group row ">
                                                                <button type="button" class="btn btn-success" id="addProductBtn">
                                                                    <i class="ft-plus"></i> افزودن کالا
                                                                </button>
                                                            </div>


                                                        </div>

                                                        <div style="font-family:Byekan" class="form-actions">
                                                          <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check-square-o"></i> افزودن
                                                          </button>


                                                        </div>
                                                      </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


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

    <script type="text/javascript">
        function removeRow(rnum) {
            jQuery('#productDiv'+rnum).remove();

        }


        $(document).ready(function () {
            let counter = 1;

            $('#addProductBtn').on('click', function() {
                let newRow = $('<div class="form-group row" id="productDiv' + counter + '"></div>');
                let cols = "";
                cols += '<label class="col-md-3 label-control" >شرح کالا  </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][description]"></div>';
                cols += '<label class="col-md-3 label-control" >مقدار  </label><div class="col-md-9"><input type="text"  class="form-control"  name="row[' + counter + '][number]"></div>';
                cols += '<label class="col-md-3 label-control" > مقیاس واحد  </label><div class="col-md-9"><select type="text" class="form-control" name="row[' + counter + '][unit]"><option value="عدد">عدد</option></select></div>';

                cols += '<label class="col-md-3 label-control" > مرکز هزینه  </label><div class="col-md-9"><input type="text" id="unit_price" class="form-control" placeholder="" name="row[0][cost_center]"></div>';
                cols += '<label class="col-md-3 label-control" > تاریخ نیاز  </label><div class="col-md-9"><input  class="form-control"  placeholder="کلیک کنید" autocomplete="off" name="row[0][Date_required]" type="text" id="input1"/></div>';

                cols += '<label class="col-md-3 label-control" > قیمت براوردی  </label><div class="col-md-9"><input type="text" class="form-control" placeholder="به ریال وارد کنید" name="row[' + counter + '][unit_price]"></div>';
                cols += '<label class="col-md-3 label-control">توضیح</label><div class="col-md-9"><input type="text" id="description" class="form-control" name="row[0][Explanation]"></div>';

                cols += '<div class="col-md-1"><button type="button" value="Remove" onclick="removeRow(' +counter+ ');" id="deleteProduct' + counter + '" class="btn btn-danger mr-1"><i class="ft-x"></i> حذف </button></div>';

                newRow.append(cols);
                $("div.productDivBody").append(newRow);
                counter++;


            });



        })

    </script>
@endsection
