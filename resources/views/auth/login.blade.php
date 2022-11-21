
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="PersiaTC">
  <meta name="keywords" content="PersiaTC">
  <meta name="author" content="AliRahmani">
  <title>@yield('title', 'داشبورد مدیریتی شرکت ارتباطات پرشیا')</title>
  <link rel="apple-touch-icon" href="/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="css/vendors.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- END Custom CSS-->
  <style media="screen">
  body{
    background-image: url("assets/images/login/<?php echo mt_rand(1,5);?>.jpg")!important;
  }

  </style>
</head>
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content ">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div style="margin-top: 50px!important;" class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                  </div>
                  <h6 style="font-family:Byekan" class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>ورود به داشبورد مدیریتی شرکت ارتباطات پرشیا</span></h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="{{ route('login') }}" method="POST" >
                      {{ csrf_field() }}
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg" name="email" value="{{ old('email') }}" id="email" placeholder="Email Address" autofocus required>

                      </fieldset>
                      <br><fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" name="password" id="password" name="password" placeholder="Password" required>




                      </fieldset>

                      @if ($errors->has('email'))
                      <span style="float: right;font-family: Byekan;color: red;direction:rtl" class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    @if ($errors->has('password'))
                    <span style="color: red"  class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <br><br>
                    <div class="form-group row">
                      <div style="font-family:Byekan" class="col-md-6 col-12 text-center text-md-right"><a style="    float: left;" href="" class="card-link">فراموشی رمز عبور</a></div>

                      <div style="direction: rtl; " class="col-md-6 col-12 text-center text-md-left">
                        <fieldset style="float: right">
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="chk-remember">
                          <label style="font-family:Byekan" for="remember-me"> بخاطر بسپار</label>
                        </fieldset>
                      </div>

                    </div>
                    <button style="font-family:Byekan" type="submit" class="btn btn-info btn-lg btn-block"> ورود   <i class="ft-unlock"></i></button>
                  </form>
                </div>
              </div>
              <div class="card-footer">
                <div class="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="js/core/app-menu.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>

</html>
