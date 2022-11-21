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
                                <h4 class="card-title">   خودارزیابی ماهانه  </h4>
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
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">فرم خود ارزیابی (خود اظهاری) - کارکنان حوزه بازگانی شرکت ارتباطات پرشیا</h4>

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

                                                                <label style="text-align: right" class="col-md-4 label-control" >نام نام خانوادگی : </label>
                                                                <label style="text-align: right" class="col-md-4 label-control" >{{ \Auth::user()->name . " " . \Auth::user()->family }} </label>

                                                                <div style="border: none" class="col-md-4 "></div>

                                                                <label style="text-align: right" class="col-md-3 label-control" for="No">دوره ارزیابی از تاریخ : </label>
                                                                <div style="text-align: right" class="col-md-2">
                                                                    <input style="font-family:Byekan" class="form-control" autocomplete="off" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                                                </div>
                                                                <label  class="col-md-4 label-control" for="date">تا تاریخ  : </label>
                                                                <div class="col-md-2">
                                                                    <input style="font-family:Byekan" class="form-control" autocomplete="off" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>

                                                            <div style="border: none" class="form-group row" style="text-align:right">
                                                                <table class="table display nowrap table-striped table-bordered">
                                                                    <thead>
                                                                        <tr style="text-align: center">
                                                                            <th>محور عملکرد</th>
                                                                            <th>شاخصهای ارزیابی</th>
                                                                            <th>سقف امتیاز شاخص</th>
                                                                            <th>امتیاز مکتسبه</th>
                                                                            <th>سقف امتیاز</th>
                                                                            <th>امتیاز نهایی</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td rowspan="13">کمیت انجام کار</td>
                                                                            <td>تعیین اولویت برای انجام کارها</td>
                                                                            <td>2</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                            <td rowspan="13">87</td>
                                                                            <td rowspan="13">0</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>انجام وظایف و برنامه های محوله  و تکالیف به موقع و با کیفیت مطلوب</td>
                                                                            <td>3</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>انجام به موقع مصوبات صورتجلسات و ارجاع کار از طریق سامانه سیما (به ازائ عدم انجام هر بند  1 امتیاز منفی)</td>
                                                                            <td>5</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>جذب مشتریان جدید (به ازائ هر مشتری یک امتیاز)</td>
                                                                            <td>5</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>حفظ مشتریان قبلی(از ابتدای سال  99 تاکنون بحز شرکت های گروه IOEC)</td>
                                                                            <td>5</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>پیگیری وصول مطالبات به ازای اخذ مطالبات هر فاکتور صادره2 امتیاز</td>
                                                                            <td>8</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>ارائه ایده و طرح در جهت گسترش فعالیت ها و یا پیشنهاد بهیه سازی هزینه ها به ازای هر ایده اجرا شده  سه امتیاز</td>
                                                                            <td>6</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>اخذ قیمت از منابع تامین کننده جدید(به ازائ هر منبع جدید یک امتیاز)</td>
                                                                            <td>6</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>تعداد پیش فاکتور های  ارسالی(به ازائ هر پیش فاکتور 0/2 امتیاز)</td>
                                                                            <td>15</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>تعداد پیش فاکتور های  برنده(به ازائ هر پیش فاکتور 3 امتیاز)</td>
                                                                            <td>20</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>همکاری در تهیه اسناد و قیمت برای  مناقصات (به ازائ هر مناقصه 0.5 امتیاز)</td>
                                                                            <td>4</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>اخذ نمایندگی داخلی یا خارجی به ازائ هر نمایندگی داخلی3خارجی 6امتیاز</td>
                                                                            <td>6 </td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>دارا بودن اطلاعات و مهارت های لازم  مرتبط با وظایف شغلی و توسعه آن</td>
                                                                            <td>2</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>

                                                                        <tr style="background-color: white;">
                                                                            <td rowspan="4">اخلاق و رفتارو مسئولیت پذیری و نعامل با همکاران</td>
                                                                            <td>رعایت نظم و انظباط در تاخیر در ورود و تقدم در خروج </td>
                                                                            <td>4</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                            <td rowspan="4">13</td>
                                                                            <td rowspan="4">0</td>
                                                                        </tr>
                                                                        <tr style="background-color: white;">
                                                                            <td>مسئولیت پذیری و وجدان کاری</td>
                                                                            <td>3</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="background-color: white;">
                                                                            <td>برقراری و حفظ روابط کاری مناسب با همکاران</td>
                                                                            <td>2</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="background-color: white;">
                                                                            <td>رعایت اصول و ارزشهای اخلاقی</td>
                                                                            <td>4</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">جمع کل شاخص ها</td>
                                                                            <td>100</td>
                                                                            <td>
                                                                                <input type="text" class="form-controll">
                                                                            </td>
                                                                            <td>100</td>
                                                                            <td>0</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>


                                                            <div class="row">
                                                                <h4 class="col-md-12 mt-3">
                                                                    لطفا به سوالات ذیل پاسخ دهید:
                                                                </h4>

                                                                <label style="text-align: right" class="col-md-12 label-control mt-2" for="number">1- به نظر شما جنابعالی به تنهایی برای شرکت  به چه میزان سود آوری ایجاد نموده اید؟</label>
                                                                <div class="col-md-12">
                                                                    <textarea  class="form-control" name="status"></textarea>
                                                                </div>

                                                                <label style="text-align: right" class="col-md-12 label-control mt-2" for="number">
                                                                    2- به نظر شما جنابعالی در انجام کار های گروهی چقدر برای شرکت سود آوری ایجاد نموده اید؟
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <textarea  class="form-control" name="status"></textarea>
                                                                </div>

                                                                <label style="text-align: right" class="col-md-12 label-control mt-2" for="number">
                                                                    3- به نظر شما جنابعالی چند درصد توانمندی خود را صرف امور شرکت نموده اید ؟                                                                </label>
                                                                <div class="col-md-12">
                                                                    <textarea  class="form-control" name="status"></textarea>
                                                                </div>

                                                                <label style="text-align: right" class="col-md-12 label-control mt-2" for="number">
                                                                    4- اهم اقدامات کلانی که انجام دادهاید و منتج به نتیجه نهایی شده است را  ذکر فرمایید.                                                                </label>
                                                                <div class="col-md-12">
                                                                    <textarea  class="form-control" name="status"></textarea>
                                                                </div>

                                                                <label style="text-align: right" class="col-md-12 label-control mt-2" for="number">
                                                                    5- راه کارها و پیشنهادات اجرایی در راستای توسعه فعالیت ها  را بیان نمایید.                                                                </label>
                                                                <div class="col-md-12">
                                                                    <textarea  class="form-control" name="status"></textarea>
                                                                </div>


                                                            </div>



                                                        </div>

                                                        <div style="font-family:Byekan" class="form-actions">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check-square-o"></i> ثبت
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














