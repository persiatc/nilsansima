<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<table style="direction: rtl">
    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> شماره : {{ $invoice['No'] ?? '' }}</td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> كد اقتصادی : 411339837594</td>
        <td  width="80" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl">شرکت ارتباطات پرشيا (سهامي خاص )</td>

        <td rowspan="3" height="30" valign="center" align="center" style="vertical-align: middle;text-align: center;">فروشنده</td>

    </tr>

    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> شناسه ملی : 10102631409</td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> تاریخ : {{ jDate($invoice['date'])->format('Y/m/d') ?? '' }}</td>
        <td  width="80" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl">دفتر تهران : خیابان کریمخان زند، خیابان نجات الهی جنوبی، کوچه حقیقت طلب ، پلاک ۳۴ </td>

    </tr>

    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"></td>
        <td  width="80" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl">  تلفن : 88814571 </td>

    </tr>

    <tr></tr>

    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> شماره ثبت : {{ $invoice['registration_number'] ?? '' }}</td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> كد اقتصادی : {{ $invoice['economic_code'] ?? '' }}</td>
        <td  width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl"> نام شرکت : {{ $invoice['company_name'] ?? '' }}</td>

        <td rowspan="3" height="30" valign="center" align="center" style="vertical-align: middle;text-align: center;">خریدار</td>

    </tr>

    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"> اعتبار : {{ $invoice['validity'] ?? '' }}</td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center">  کد پستی : {{ $invoice['postal_code'] ?? '' }}</td>
        <td  width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl"> آدرس : {{ $invoice['address'] ?? '' }} </td>

    </tr>

    <tr>
        <td></td>
        <td></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"></td>
        <td  width="20" height="30" valign="center" style="vertical-align: middle;text-align: center"></td>
        <td  width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;direction: rtl">  تلفن : {{ $invoice['phone'] ?? '' }} </td>

    </tr>
    <tr></tr>

    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">جمع (ریال)</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">قیمت واحد (ریال)</th>

        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">واحد</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">تعداد</th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">شرح کالا</th>

    </tr>

    @foreach($invoice->products as $product)
        <tr>
            <td width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $product->total_price ?? '' }}</td>
            <td width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $product->unit_price ?? '' }}</td>
            <td width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $product->unit ?? '' }}</td>
            <td width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $product->number ?? '' }}</td>
            <td colspan="2" width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $product->description ?? '' }}</td>
        </tr>
    @endforeach

    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">{{ $invoice->total ?? '' }}</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">جمع کل</th>

        <th width="20" colspan="2"height="30" valign="center" style="vertical-align: middle;text-align: center;"></th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;"> مبلغ کل به حروف</th>

    </tr>

    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">۰</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">تخفیف</th>

        <th width="20" colspan="2"height="30" valign="center" style="vertical-align: middle;text-align: center;"></th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;"> فروش به صورت نقدی می باشد</th>

    </tr>

    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $invoice->total ?? '' }}</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">جمع کل</th>

        <th width="20" colspan="2"height="30" valign="center" style="vertical-align: middle;text-align: center;"></th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;"> مدت اعتبار </th>

    </tr>

    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">{{ $invoice->tax ?? ''}}</th>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center;">ارزش افزوده 9 درصد</th>

        <th width="20" colspan="2" height="30" valign="center" style="vertical-align: middle;text-align: center;"></th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;">
            شماره شبا:IR55 0120 0200 0000 5387 8268 31
            <br>
            شماره حساب: 5387826831  بانک ملت شعبه مستقل مرکزی
        </th>

    </tr>
    <tr>
        <th width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">{{ $invoice->final_total ?? '' }}</th>
        <td width="20" height="30" valign="center" style="vertical-align: middle;text-align: center; background-color: #eee">جمع کل پس از اعمال ارزش افزوده</td>

        <th width="20" colspan="2" height="30" valign="center" style="vertical-align: middle;text-align: right;"></th>
        <th colspan="2" width="60" height="30" valign="center" style="vertical-align: middle;text-align: right;">مهر يا امضاي فروشنده </th>

    </tr>

</table>



</html>
