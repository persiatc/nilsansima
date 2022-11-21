@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">

<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<!-- Timetable CSS Files -->
<link rel="stylesheet" href="vendors/timetables/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/timetables/css/timetable.css">

<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">

<!--------------------------------------------------->

<!----------- CSS Files for example -------------->
<link href="/vendors/timetables/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="/vendors/timetables/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="/css/bootstrap-glyphicons.css" rel="stylesheet" type="text/css" />



<style media="screen">

#YTO {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: Byekan!important;
  height: 500px!important;
}
#OTY {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: Byekan!important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
}


</style>
@endsection

@section('content')

<!--  Start Add Task PopUp -->
<div class="modal fade text-left" id="addTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" method="post"  action="timesheet/add" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح فعالیت <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <input type="text" id="description"   class="form-control" name="description">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="startHour">ساعت شروع <sup style="color: red; font-size: 18px" >*</sup></label>
              <div class="col-md-9">
                <input type="text" id="startHour"  placeholder="مثال: 12:10" class="form-control" name="startHour">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control"  for="endHour">ساعت پایان <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">

                <input type="text" id="endHour"  placeholder="مثال: 10:25" class="form-control" name="endHour">

              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="result">نتیجه <sup style="color: red; font-size: 18px" >*</sup> </label>
              <div class="col-md-9">
                <textarea name="result" class="form-control" rows="3" cols="80"></textarea>
              </div>

            </div>




          </div>


          <div class="form-actions">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check-square-o"></i> افزودن فعالیت
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
<!--  End Add Task PopUp -->





<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

      @if ($errors->any())
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif










      <!-- Start TimeSheet Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">فعالیت های روزانه شما</h4>
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
                <button  style="float: right;margin-right: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="icon-plus"></i>  افزودن پروژه  </span></button><br><br>
                <div class="card-body card-dashboard">


                    <table style="font-family:Byekan;direction: rtl; " class="table display nowrap table-striped table-bordered scroll-horizontal file-export" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2">ردیف</th>
                          <th rowspan="2">نام پروژه </th>
                          <th rowspan="2">کارفرما</th>
                          <th colspan="2">HR Information</th>
                          <th colspan="3">Contact</th>
                        </tr>
                        <tr>
                          <th>Position</th>
                          <th>Salary</th>
                          <th>Office</th>
                          <th>Extn.</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>

                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Salary</th>
                          <th>Office</th>
                          <th>Extn.</th>
                          <th>E-mail</th>
                        </tr>
                      </tfoot>

                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>$320,800</td>
                          <td>Edinburgh</td>
                          <td>5421</td>
                          <td>t.nixon@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>$170,750</td>
                          <td>Tokyo</td>
                          <td>8422</td>
                          <td>g.winters@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>$86,000</td>
                          <td>San Francisco</td>
                          <td>1562</td>
                          <td>a.cox@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>$433,060</td>
                          <td>Edinburgh</td>
                          <td>6224</td>
                          <td>c.kelly@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>$162,700</td>
                          <td>Tokyo</td>
                          <td>5407</td>
                          <td>a.satou@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Brielle Williamson</td>
                          <td>Integration Specialist</td>
                          <td>$372,000</td>
                          <td>New York</td>
                          <td>4804</td>
                          <td>b.williamson@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Herrod Chandler</td>
                          <td>Sales Assistant</td>
                          <td>$137,500</td>
                          <td>San Francisco</td>
                          <td>9608</td>
                          <td>h.chandler@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Rhona Davidson</td>
                          <td>Integration Specialist</td>
                          <td>$327,900</td>
                          <td>Tokyo</td>
                          <td>6200</td>
                          <td>r.davidson@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Colleen Hurst</td>
                          <td>Javascript Developer</td>
                          <td>$205,500</td>
                          <td>San Francisco</td>
                          <td>2360</td>
                          <td>c.hurst@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Sonya Frost</td>
                          <td>Software Engineer</td>
                          <td>$103,600</td>
                          <td>Edinburgh</td>
                          <td>1667</td>
                          <td>s.frost@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jena Gaines</td>
                          <td>Office Manager</td>
                          <td>$90,560</td>
                          <td>London</td>
                          <td>3814</td>
                          <td>j.gaines@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Quinn Flynn</td>
                          <td>Support Lead</td>
                          <td>$342,000</td>
                          <td>Edinburgh</td>
                          <td>9497</td>
                          <td>q.flynn@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Charde Marshall</td>
                          <td>Regional Director</td>
                          <td>$470,600</td>
                          <td>San Francisco</td>
                          <td>6741</td>
                          <td>c.marshall@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Haley Kennedy</td>
                          <td>Senior Marketing Designer</td>
                          <td>$313,500</td>
                          <td>London</td>
                          <td>3597</td>
                          <td>h.kennedy@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Tatyana Fitzpatrick</td>
                          <td>Regional Director</td>
                          <td>$385,750</td>
                          <td>London</td>
                          <td>1965</td>
                          <td>t.fitzpatrick@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Michael Silva</td>
                          <td>Marketing Designer</td>
                          <td>$198,500</td>
                          <td>London</td>
                          <td>1581</td>
                          <td>m.silva@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Paul Byrd</td>
                          <td>Chief Financial Officer (CFO)</td>
                          <td>$725,000</td>
                          <td>New York</td>
                          <td>3059</td>
                          <td>p.byrd@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Gloria Little</td>
                          <td>Systems Administrator</td>
                          <td>$237,500</td>
                          <td>New York</td>
                          <td>1721</td>
                          <td>g.little@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Bradley Greer</td>
                          <td>Software Engineer</td>
                          <td>$132,000</td>
                          <td>London</td>
                          <td>2558</td>
                          <td>b.greer@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Dai Rios</td>
                          <td>Personnel Lead</td>
                          <td>$217,500</td>
                          <td>Edinburgh</td>
                          <td>2290</td>
                          <td>d.rios@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jenette Caldwell</td>
                          <td>Development Lead</td>
                          <td>$345,000</td>
                          <td>New York</td>
                          <td>1937</td>
                          <td>j.caldwell@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Yuri Berry</td>
                          <td>Chief Marketing Officer (CMO)</td>
                          <td>$675,000</td>
                          <td>New York</td>
                          <td>6154</td>
                          <td>y.berry@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Caesar Vance</td>
                          <td>Pre-Sales Support</td>
                          <td>$106,450</td>
                          <td>New York</td>
                          <td>8330</td>
                          <td>c.vance@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Doris Wilder</td>
                          <td>Sales Assistant</td>
                          <td>$85,600</td>
                          <td>Sidney</td>
                          <td>3023</td>
                          <td>d.wilder@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Angelica Ramos</td>
                          <td>Chief Executive Officer (CEO)</td>
                          <td>$1,200,000</td>
                          <td>London</td>
                          <td>5797</td>
                          <td>a.ramos@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Gavin Joyce</td>
                          <td>Developer</td>
                          <td>$92,575</td>
                          <td>Edinburgh</td>
                          <td>8822</td>
                          <td>g.joyce@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jennifer Chang</td>
                          <td>Regional Director</td>
                          <td>$357,650</td>
                          <td>Singapore</td>
                          <td>9239</td>
                          <td>j.chang@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Brenden Wagner</td>
                          <td>Software Engineer</td>
                          <td>$206,850</td>
                          <td>San Francisco</td>
                          <td>1314</td>
                          <td>b.wagner@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Fiona Green</td>
                          <td>Chief Operating Officer (COO)</td>
                          <td>$850,000</td>
                          <td>San Francisco</td>
                          <td>2947</td>
                          <td>f.green@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Shou Itou</td>
                          <td>Regional Marketing</td>
                          <td>$163,000</td>
                          <td>Tokyo</td>
                          <td>8899</td>
                          <td>s.itou@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Michelle House</td>
                          <td>Integration Specialist</td>
                          <td>$95,400</td>
                          <td>Sidney</td>
                          <td>2769</td>
                          <td>m.house@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Suki Burks</td>
                          <td>Developer</td>
                          <td>$114,500</td>
                          <td>London</td>
                          <td>6832</td>
                          <td>s.burks@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Prescott Bartlett</td>
                          <td>Technical Author</td>
                          <td>$145,000</td>
                          <td>London</td>
                          <td>3606</td>
                          <td>p.bartlett@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Gavin Cortez</td>
                          <td>Team Leader</td>
                          <td>$235,500</td>
                          <td>San Francisco</td>
                          <td>2860</td>
                          <td>g.cortez@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Martena Mccray</td>
                          <td>Post-Sales support</td>
                          <td>$324,050</td>
                          <td>Edinburgh</td>
                          <td>8240</td>
                          <td>m.mccray@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Unity Butler</td>
                          <td>Marketing Designer</td>
                          <td>$85,675</td>
                          <td>San Francisco</td>
                          <td>5384</td>
                          <td>u.butler@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Howard Hatfield</td>
                          <td>Office Manager</td>
                          <td>$164,500</td>
                          <td>San Francisco</td>
                          <td>7031</td>
                          <td>h.hatfield@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Hope Fuentes</td>
                          <td>Secretary</td>
                          <td>$109,850</td>
                          <td>San Francisco</td>
                          <td>6318</td>
                          <td>h.fuentes@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Vivian Harrell</td>
                          <td>Financial Controller</td>
                          <td>$452,500</td>
                          <td>San Francisco</td>
                          <td>9422</td>
                          <td>v.harrell@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Timothy Mooney</td>
                          <td>Office Manager</td>
                          <td>$136,200</td>
                          <td>London</td>
                          <td>7580</td>
                          <td>t.mooney@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jackson Bradshaw</td>
                          <td>Director</td>
                          <td>$645,750</td>
                          <td>New York</td>
                          <td>1042</td>
                          <td>j.bradshaw@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Olivia Liang</td>
                          <td>Support Engineer</td>
                          <td>$234,500</td>
                          <td>Singapore</td>
                          <td>2120</td>
                          <td>o.liang@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Bruno Nash</td>
                          <td>Software Engineer</td>
                          <td>$163,500</td>
                          <td>London</td>
                          <td>6222</td>
                          <td>b.nash@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Sakura Yamamoto</td>
                          <td>Support Engineer</td>
                          <td>$139,575</td>
                          <td>Tokyo</td>
                          <td>9383</td>
                          <td>s.yamamoto@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Thor Walton</td>
                          <td>Developer</td>
                          <td>$98,540</td>
                          <td>New York</td>
                          <td>8327</td>
                          <td>t.walton@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Finn Camacho</td>
                          <td>Support Engineer</td>
                          <td>$87,500</td>
                          <td>San Francisco</td>
                          <td>2927</td>
                          <td>f.camacho@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Serge Baldwin</td>
                          <td>Data Coordinator</td>
                          <td>$138,575</td>
                          <td>Singapore</td>
                          <td>8352</td>
                          <td>s.baldwin@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Zenaida Frank</td>
                          <td>Software Engineer</td>
                          <td>$125,250</td>
                          <td>New York</td>
                          <td>7439</td>
                          <td>z.frank@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Zorita Serrano</td>
                          <td>Software Engineer</td>
                          <td>$115,000</td>
                          <td>San Francisco</td>
                          <td>4389</td>
                          <td>z.serrano@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jennifer Acosta</td>
                          <td>Junior Javascript Developer</td>
                          <td>$75,650</td>
                          <td>Edinburgh</td>
                          <td>3431</td>
                          <td>j.acosta@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Cara Stevens</td>
                          <td>Sales Assistant</td>
                          <td>$145,600</td>
                          <td>New York</td>
                          <td>3990</td>
                          <td>c.stevens@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Hermione Butler</td>
                          <td>Regional Director</td>
                          <td>$356,250</td>
                          <td>London</td>
                          <td>1016</td>
                          <td>h.butler@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Lael Greer</td>
                          <td>Systems Administrator</td>
                          <td>$103,500</td>
                          <td>London</td>
                          <td>6733</td>
                          <td>l.greer@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Jonas Alexander</td>
                          <td>Developer</td>
                          <td>$86,500</td>
                          <td>San Francisco</td>
                          <td>8196</td>
                          <td>j.alexander@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Shad Decker</td>
                          <td>Regional Director</td>
                          <td>$183,000</td>
                          <td>Edinburgh</td>
                          <td>6373</td>
                          <td>s.decker@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Michael Bruce</td>
                          <td>Javascript Developer</td>
                          <td>$183,000</td>
                          <td>Singapore</td>
                          <td>5384</td>
                          <td>m.bruce@datatables.net</td>
                        </tr>
                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>$112,000</td>
                          <td>New York</td>
                          <td>4226</td>
                          <td>d.snider@datatables.net</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </section>
        <!-- End TimeSheet Table -->







      </div>
    </div>
  </div>


  @section('footerscripts')
  <script src="vendors/timetables/js/jquery.min.js"></script>
  <script src="vendors/timetables/js/jquery.magnific-popup.js"></script>
  <script src="vendors/timetables/js/timetable.js"></script>

  <script src="/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
  <script src="/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
  <script src="/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>


  <script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


  <script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
  <script src="/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>

  <script src="/vendors/timetables/js/moment.min.js"></script>
  <script src="/vendors/timetables/js/bootstrap-datetimepicker.min.js"></script>








  <script type="text/javascript">
  jQuery(document).ready(function() {

    // hide last wizard submit button
    $("[href=#finish]").hide();


    jQuery('.btn-delete-admin').click(function(e){
      alert("This admin user can't be deleted !");
      e.preventDefault();
    });

    jQuery('.btn-delete').click(function(e){
      var question = 'Are you sure you want to delete this ?';
      if (!confirm(question)) {
        e.preventDefault();
      }
    });

    // Date picker
    jQuery('.date-picker').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    // Time picker
    jQuery('.time-picker').datetimepicker({
      format: 'HH:mm'
    });
  });

</script>


@endsection
