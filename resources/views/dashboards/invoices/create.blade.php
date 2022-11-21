@extends('layouts/dashboard')

@section('headerscripts')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">افزودن پیش فاکتور صادر شده </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت پیش فاکتورهای صادر شده</h4>

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

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('invoices')}}" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <div style="font-family:byekan" class="form-body productDivBody">


                                                            <div class="form-group row" style="text-align:right">
                                                                <label class="col-md-1 label-control" style="writing-mode: vertical-rl;text-orientation: mixed;color: black;font-size: 18px;" >فروشنده</label>

                                                                <label style="text-align: right" class="col-md-4 label-control" >شركت ارتباطات پرشيا (سهامي خاص )</label>
                                                                <label class="col-md-3 label-control" >كد اقتصادي:  411339837594</label>
                                                                <label class="col-md-2 label-control" for="No">شماره : </label>
                                                                <div class="col-md-2">
                                                                    <input type="text" id="No" class="form-control"  name="No">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="text-align: right;padding-top:0px;" class="col-md-4 label-control" >تلفن : 82849500 </label>
                                                                <label style="padding-top:0px;" class="col-md-3 label-control" >شناسه ملی: 10102631409</label>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" for="date">تاریخ : </label>
                                                                <div class="col-md-2">
                                                                    <input style="font-family:Byekan" class="form-control" autocomplete="off" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                                                </div>


                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;white-space:nowrap" class="col-md-8 label-control" >دفترتهران: خیابان کریمخان زند، خیابان نجات الهی جنوبی، خیابان اراک ، پلاک ۲۷ ،طبقه سوم</label>

                                                            </div>

                                                            <div class="form-group row" style="text-align:right">
                                                                <label class="col-md-1 label-control" style="writing-mode: vertical-rl;text-orientation: mixed;color: black;font-size: 18px;" >خریدار</label>

                                                                <label class="col-md-2 label-control" for="company_name">نام شرکت : </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="company_name" class="form-control"  name="company_name">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >آدرس : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="address" class="form-control" name="address">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >تلفن : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="phone" class="form-control" name="phone">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >اعتبار : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="validity" class="form-control" name="validity">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >کد اقتصادی : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="economic_code" class="form-control" name="economic_code">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >کد پستی : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="postal_code" class="form-control" name="postal_code">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >شناسه ملی : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="national_code" class="form-control" name="national_code">
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <label style="padding-top:0px;" class="col-md-2 label-control" >شماره ثبت : </label>
                                                                <div class="col-md-9" style="padding-top:0px;">
                                                                    <input type="text" id="registration_number" class="form-control" name="registration_number">
                                                                </div>

                                                                {{--<div class="col-md-1"></div>--}}
                                                                {{--<label style="padding-top:0px;" class="col-md-2 label-control" >تخفیف: </label>--}}
                                                                {{--<div class="col-md-9" style="padding-top:0px;">--}}
                                                                    {{--<input type="text" id="discount" class="form-control" name="discount" placeholder="بدون درصد وارد شود">--}}
                                                                {{--</div>--}}

                                                            </div>



                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control">شرح کالا  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="description" class="form-control" name="row[0][description]">
                                                                </div>
                                                                <label class="col-md-3 label-control" >تعداد  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="number" class="form-control"  name="row[0][number]">
                                                                </div>
                                                                <label class="col-md-3 label-control" > واحد  </label>
                                                                <div class="col-md-9">
                                                                    <select type="text" id="unit" class="form-control" name="row[0][unit]">
                                                                        <option value="عدد">عدد</option>
                                                                        <option value="متر">متر</option>
                                                                        <option value="دستگاه">دستگاه</option>

                                                                    </select>
                                                                </div>
                                                                <label class="col-md-3 label-control" > قیمت واحد  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="unit_price" class="form-control" placeholder="به ریال وارد کنید" name="row[0][unit_price]">
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
                                                                <i class="fa fa-check-square-o"></i> ثبت
                                                            </button>

                                                            {{--<button type="button" class="btn btn-warning mr-1">--}}
                                                                {{--<i class="ft-x"></i> لغو--}}
                                                            {{--</button>--}}
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
                cols += '<label class="col-md-3 label-control" >تعداد  </label><div class="col-md-9"><input type="text"  class="form-control"  name="row[' + counter + '][number]"></div>';
                cols += '<label class="col-md-3 label-control" > واحد  </label><div class="col-md-9"><select type="text" class="form-control" name="row[' + counter + '][unit]"><option value="عدد">عدد</option></select></div>';
                cols += '<label class="col-md-3 label-control" > قیمت واحد  </label><div class="col-md-6"><input type="text" class="form-control" placeholder="به ریال وارد کنید" name="row[' + counter + '][unit_price]"></div>';
                cols += '<div class="col-md-1"><button type="button" value="Remove" onclick="removeRow(' +counter+ ');" id="deleteProduct' + counter + '" class="btn btn-danger mr-1"><i class="ft-x"></i> حذف </button></div>';

                newRow.append(cols);
                $("div.productDivBody").append(newRow);
                counter++;


            });



        })

    </script>
@endsection














