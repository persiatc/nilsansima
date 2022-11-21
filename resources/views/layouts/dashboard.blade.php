<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="PersiaTC Dashboard">
    <meta name="keywords" content="PersiaTC Dashboard">
    <meta name="author" content="AliRahmani">
    <title>@yield('title', 'داشبورد مدیریت شرکت  نیلسان کیش')</title>
    {{-- <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="/css-rtl/vendors.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/icofont.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-callout.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/animate/animate.css">

    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->

    <script src="/js/scripts/highcharts/highcharts.js"></script>
    <script src="/js/scripts/highcharts/highcharts-more.js"></script>
    <script src="/js/scripts/highcharts/series-label.js"></script>
    <script src="/js/scripts/highcharts/exporting.js"></script>
    <script src="/js/scripts/highcharts/export-data.js"></script>
    <script src="/js/scripts/highcharts/variable-pie.js"></script>

    <link rel="stylesheet" type="text/css" href="/css-rtl/app.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/calendars/clndr.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/core/colors/palette-climacon.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/pages/users.css">
    <link rel="stylesheet" type="text/css" href="/css-rtl/plugins/extensions/toastr.css">



    <style media="screen">

        @font-face {
            font-family: 'BBardiya';
            src: url('/css-rtl/fontsFA/BBardiya.eot');
            src: url('/css-rtl/fontsFA/BBardiya.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BBardiya.woff') format('woff'), url('/css-rtl/fontsFA/BBardiya.ttf') format('truetype'), url('/css-rtl/fontsFA/BBardiya.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'BKoodakBold';
            src: url('/css-rtl/fontsFA/BKoodakBold.eot');
            src: url('/css-rtl/fontsFA/BKoodakBold.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BKoodakBold.woff') format('woff'), url('/css-rtl/fontsFA/BKoodakBold.ttf') format('truetype'), url('/css-rtl/fontsFA/BKoodakBold.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        /*@font-face {*/
        /*    font-family: 'BYekan';*/
        /*    src: url('/css-rtl/fontsFA/BYekan.eot');*/
        /*    src: url('/css-rtl/fontsFA/BYekan.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/BYekan.eot') format('woff'), url('/css-rtl/fontsFA/BYekan.eot') format('truetype'), url('/css-rtl/fontsFA/BYekan.eot') format('svg');*/
        /*    font-weight: normal;*/
        /*    font-style: normal;*/
        /*}*/

        @font-face {
            font-family: 'Rezvan';
            src: url('/css-rtl/fontsFA/Rezvan.eot');
            src: url('/css-rtl/fontsFA/Rezvan.eot') format('embedded-opentype'), url('/css-rtl/fontsFA/Rezvan.woff') format('woff'), url('/css-rtl/fontsFA/Rezvan.ttf') format('truetype'), url('/css-rtl/fontsFA/Rezvan.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

        #monthly {
            width: 100%;
            height: 500px;
        }

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

        a, span, p, h1, h2, h3, h4, h5, h6, label, input, button {
            font-family: 'Byekan' !important;
        }

        .dataTables_info {
            font-family: 'Byekan' !important;
        }

        .dow {
            font-family: 'Byekan' !important;
        }

        .pdp-header {
            font-family: 'Byekan' !important;
            height: 25px !important;
        }

        .days {
            font-family: 'Byekan' !important;
        }

        .c-search > .form-control {
            border-radius: 0px;
            border-width: 0px;
            border-bottom-width: 1px;
            font-size: 1.3em;
            padding: 12px 12px;
            height: 44px;
            outline: none !important;
        }

        .c-search > .form-control:focus {
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none;
        }

        .c-search > .input-group-btn .btn {
            border-radius: 0px;
            border-width: 0px;
            border-left-width: 1px;
            border-bottom-width: 1px;
            height: 44px;
        }


        .c-list {
            padding: 0px;
            min-height: 44px;
        }

        .title {
            display: inline-block;
            font-size: 1.7em;
            font-weight: bold;
            padding: 5px 15px;
        }

        ul.c-controls {
            list-style: none;
            margin: 0px;
            min-height: 44px;
        }

        ul.c-controls li {
            margin-top: 8px;
            float: left;
        }

        ul.c-controls li a {
            font-size: 1.7em;
            padding: 11px 10px 6px;
        }

        ul.c-controls li a i {
            min-width: 24px;
            text-align: center;
        }

        ul.c-controls li a:hover {
            background-color: rgba(51, 51, 51, 0.2);
        }

        .c-toggle {
            font-size: 1.7em;
        }

        .name {
            font-size: 1.7em;
            font-weight: 700;
        }

        .c-info {
            padding: 5px 10px;
            font-size: 1.25em;
        }

    /*    asiye added*/
        .main-menu.menu-dark .navigation > li.active > a {
            background: #007bff;
        }
        .app-content .content-wrapper{
            background: #eee !important;
        }
        .orangeColor{
            color:  #c2c7d0 !important;
            font-weight: bold !important;
        }
        .leftPosition{
            display: inline;
            position: absolute;
            right: 900px;
            top: -60px;
        }
        .dt-button-collection.dropdown-menu{
            left: 0 !important;
            width: 100px;
            right: 1200px;

        }

    </style>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/css-rtl/style.css">


    <script src="vendors/js/charts/amcharts/amcharts.js"></script>
    <script src="vendors/js/charts/amcharts/serial.js"></script>
    <script src="vendors/js/charts/amcharts/gauge.js"></script>
    <script src="vendors/js/charts/amcharts/pie.js"></script>
    <script src="vendors/js/charts/amcharts/export.min.js"></script>
    <link rel="stylesheet" href="vendors/js/charts/amcharts/export.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="vendors/js/charts/amcharts/amcharts.css" type="text/css" media="all"/>
    <script src="vendors/js/charts/amcharts/light.js"></script>


    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-default.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-dark.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-latoja.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-melon.css"/>
    <link rel="stylesheet" href="/vendors/datepicker/css/persianDatepicker-lightorang.css"/>
    <script src="/vendors/datepicker/js/prism.js"></script>

    {{-- <link rel="stylesheet" href="/timePicker/user-friendly-time-picker/dist/css/timepicker.min.css" />
    <script src="/timePicker/user-friendly-time-picker/dist/js/timepicker.min.js"></script> --}}

@yield('headerscripts')
<!-- END Custom CSS-->

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header" style="background: #343a40;">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="/dashboard"><img style="display:inline"
                                                                                    class="brand-logo" alt="Nilsan"
                                                                                    src="/favicon.png">
                        <h3 style="font-family:'Byekan'; color: #fff" class="brand-text">سیما</h3></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                                                  data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content" style="background: #343a40">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a style="color: #DCDCDC;" class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"> </i></a></li>

                    <h3 style="margin: auto;color: #DCDCDC;">شرکت  نیلسان کیش </h3>

                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li style="Display:none;" class="dropdown dropdown-language nav-item">

                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="/dahsboard/en"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="flag-icon flag-icon-gb"></i>
                           <span>English</span>
                           <span class="selected-language"></span>
                        </a>


                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                        </div>

                    </li>


                    <li class="dropdown dropdown-notification nav-item">
                        <a style="color:#DCDCDC" class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon ft-bell" style="color: #007bff"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            {{-- <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">دفترچه تلفن</span></h6>
                                <br><br>
                            </li> --}}
                            <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">


                                    <ul class="list-group" id="contact-list">

                                        <li class="list-group-item">
                                            <div class="col-xs-12">
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <br/><br/>
                                                <span class="">
                                                    <span class="text-success">
                                                            <b> تاریخ امروز </b>
                                                            <span>{{ jdate(now())->format('l ، m %B Y') }}</span>
                                                    </span>
                                                    <br/><br/>
                                                </span>
                                                <span class="">
                                                    <span class="text-muted">
                                                            <b> فعالیت محول شده امروز شما </b>
                                                            <span>{{ $box['1']  ?? ''}}</span>
                                                    </span>
                                                    <br/><br/>
                                                </span>
                                                <span class="">
                                                    <span class="text-muted">
                                                            <b>فعالیت انجام شده امروز شما</b>
                                                            <span>{{ $box['2']  ?? ''}}</span>

                                                    </span>
                                                    <br/><br/>
                                                </span>


                                            </div>
                                            <div class="clearfix"></div>
                                        </li>


                                    </ul>


                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a style="color:#DCDCDC" class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon ft-phone"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">دفترچه تلفن</span></h6>
                                <br><br>
                            </li>
                            <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">


                                    <ul class="list-group" id="contact-list">

                                        <li class="list-group-item">
                                            <div class="col-xs-12">
                                            </div>
                                            <div class="col-xs-12 col-sm-9">
                                                <span class="name">رضا رضایی</span><br/><br/>
                                                <span class="ft-user"> <span
                                                            class="text-muted"><b> مسوول اداری </b> </span><br/><br/></span>
                                                <span class="ft-phone"> <span style="font-size:20px"
                                                                              class="">4044</span><br/></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>


                                    </ul>


                            </li>
                        </ul>
                    </li>


                    <li class="dropdown dropdown-user nav-item">
                        <a style="color: #DCDCDC" class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="{{ \Auth::user()->avatar ? \Auth::user()->avatar : 'favicon.png'}}"
                                        alt="avatar"><i></i>
                            </span><span
                                    class="user-name"  style="color: #DCDCDC"> {{ \Auth::user()->name . " " . \Auth::user()->family }} </span></a>
                        <div class="dropdown-menu dropdown-menu-right" style="border: 1px solid #DCDCDC;">

                            <a class="dropdown-item" href="/profile"><i class="ft-user"></i> تنظیمات حساب کاربری</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="ft-power"></i> خروج از سامانه</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" style="background: #343a40;">
        <ul style="background: #343a40;" class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header" style="color: #DCDCDC;"><span data-i18n="nav.category.layouts">ماژول های سامانه</span><i
                        class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right"
                        data-original-title="داشبورد"></i>
            </li>


            <li class=" {{{ (Request::is('timesheet') ? 'active' : '') }}} nav-item">
                <a class="orangeColor" href="/timesheet"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.dash.main">تایم شیت من</span></a>
            </li>

            <li class=" {{{ (Request::is('dashboard') ? 'active' : '') }}} nav-item">
                <a class="orangeColor" href="/dashboard"><i class="icofont icofont-dashboard-web"></i><span class="menu-title" data-i18n="nav.dash.main">فعالیت ارجاع شده من</span></a>
            </li>

            {{-- <li class="{{{ (Request::is('*invoices*') ? 'active' : '') }}} {{{ (Request::is('*tenders*') ? 'active' : '') }}}  nav-item has-sub">
                <a class="orangeColor" href="#"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.templates.main"> ارجاع کار</span></a>

                <ul class="menu-content" style="">

                    <li style="" class="{{{ (Request::is('*invoices*') ? 'active' : '') }}}   nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*invoices*') ? 'active' : '') }}}  " href="{{ url('/invoices') }}" data-i18n="nav.templates.vert.classic_menu"> استعلام /صدورپیش فاکتور  </a>
                    </li>
                    <li style="" class="{{{ (Request::is('*tenders*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*tenders*') ? 'active' : '') }}}  " href="{{ url('/tenders') }}" data-i18n="nav.templates.vert.classic_menu"> مناقصه/کارپذیری  </a>
                    </li>



                </ul>
            </li> --}}




            {{-- <li class="{{{ (Request::is('invoices') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/invoices"><i class="ft-bar-chart"></i><span class="menu-title" data-i18n="nav.dash.main">پیش فاکتورهای صادرشده </span></a>
            </li> --}}




            {{-- <li class="{{{ (Request::is('*tenders*') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/tenders"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.dash.main">کار پذیری</span></a>
            </li> --}}

            {{-- <li class="{{{ (Request::is('Inquiry') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Inquiry"><i class="icon-basket"></i><span class="menu-title" data-i18n="nav.dash.main">  ثبت استعلامات  </span></a>

            </li>

            <li class="{{{ (Request::is('avl') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/avl"><i class="icon-basket"></i><span class="menu-title" data-i18n="nav.dash.main">تامین کنندگان کالا  </span></a>

            </li> --}}


            {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 53 ||auth()->user()->id == 51 || auth()->user()->id == 6 || auth()->user()->id == 34 || auth()->user()->id == 40 || auth()->user()->id == 39 || auth()->user()->id == 35) --}}
            {{-- <li class="{{{ (Request::is('contracts') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/contracts"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">قرارداد با کارفرمایان</span></a>
            </li> --}}
            {{-- @endif --}}

            {{-- <li class="{{{ (Request::is('SellersContracts') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/SellersContracts"><i class="icon-docs"></i><span class="menu-title" data-i18n="nav.dash.main">قرارداد با پیمانکاران</span></a>
            </li> --}}



            <li class="{{{ (Request::is('*archives*') ? 'active' : '') }}}   nav-item has-sub">
                <a class="orangeColor" href="#"><i class="icon-equalizer"></i><span class="menu-title" data-i18n="nav.templates.main"> صورتجلسات</span></a>

                <ul class="menu-content" style="">
                    {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 6 || auth()->user()->id == 36  || auth()->user()->id == 54) --}}
                        <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}} nav-item">
                            <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/هیئت مدیره') }}" data-i18n="nav.templates.vert.classic_menu"> هیات مدیره</a>
                        </li>
                    {{-- @endif --}}
                    {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 6|| auth()->user()->id == 30|| auth()->user()->id == 35|| auth()->user()->id == 40|| auth()->user()->id == 45 || auth()->user()->id == 36 || auth()->user()->id == 54 ) --}}
                    <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/شورای مدیران') }}" data-i18n="nav.templates.vert.classic_menu"> شورای مدیران  </a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 6 || auth()->user()->id == 50|| auth()->user()->id == 30  || auth()->user()->id == 36 || auth()->user()->id == 54 ) --}}
                    <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/بخش فنی') }}" data-i18n="nav.templates.vert.classic_menu"> بخش فنی  </a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 6 || auth()->user()->id == 35 || auth()->user()->id == 28 || auth()->user()->id == 39 || auth()->user()->id == 34 || auth()->user()->id == 45 || auth()->user()->id == 53 || auth()->user()->id == 36 || auth()->user()->id == 54 ) --}}
                    <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/بازرگانی') }}" data-i18n="nav.templates.vert.classic_menu"> بازرگانی  </a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if(auth()->user()->id == 48 || auth()->user()->id == 6 || auth()->user()->id == 25 || auth()->user()->id == 23 || auth()->user()->id == 40 || auth()->user()->id == 36 || auth()->user()->id == 54) --}}
                    <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/مالی') }}" data-i18n="nav.templates.vert.classic_menu"> مالی  </a>
                    </li>
                    {{-- @endif --}}

                    <li style="" class="{{{ (Request::is('*archives*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*archives*') ? 'active' : '') }}}  " href="{{ url('archives/متفرقه') }}" data-i18n="nav.templates.vert.classic_menu"> متفرقه  </a>
                    </li>


                </ul>
            </li>


            {{-- <li class="{{{ (Request::is('PurchaseRequest') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/PurchaseRequest"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">درخواست خرید</span></a>
            </li>

            <li class="{{{ (Request::is('*Commission*') ? 'active' : '') }}}   nav-item has-sub">
                <a class="orangeColor" href="#"><i class="icon-equalizer"></i><span class="menu-title" data-i18n="nav.templates.main"> ثبت معاملات</span></a>

                <ul class="menu-content" style="">
                    <li style="" class="{{{ (Request::is('*CommissionPartial*') ? 'active' : '') }}} nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*CommissionPartial*') ? 'active' : '') }}}  " href="{{ url('CommissionPartial') }}" data-i18n="nav.templates.vert.classic_menu"> معاملات جزئی</a>
                    </li>

                    <li style="" class="{{{ (Request::is('*CommissionMedium*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*CommissionMedium*') ? 'active' : '') }}}  " href="{{ url('CommissionMedium') }}" data-i18n="nav.templates.vert.classic_menu"> معاملات متوسط  </a>
                    </li>
                    <li style="" class="{{{ (Request::is('*CommissionMajor*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*CommissionMajor*') ? 'active' : '') }}}  " href="{{ url('CommissionMajor') }}" data-i18n="nav.templates.vert.classic_menu"> معاملات عمده </a>
                    </li>

                </ul>
            </li> --}}


            <li style="" class="{{{ (Request::is('Proceedings') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Proceedings"><i class="icon-magnet"></i><span class="menu-title" data-i18n="nav.dash.main">مصوبات</span></a>
            </li>

            {{-- <li style="" class="{{{ (Request::is('financialGuarantes') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/financialGuarantes"><i class="icon-wallet"></i><span class="menu-title" data-i18n="nav.dash.main">ضمانت نامه مالی</span></a>
            </li> --}}


            <li class="{{{ (Request::is('Certificates') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Certificates"><i class="icon-badge"></i><span class="menu-title" data-i18n="nav.dash.main">رتبه ها و گواهینامه ها</span></a>
            </li>
            <li class="{{{ (Request::is('Dokumentation') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Dokumentation"><i class=" icon-picture"></i><span class="menu-title" data-i18n="nav.dash.main">مستندات </span></a>
            </li>
             <li class="{{{ (Request::is('regulations') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/regulations"><i class="icon-speech"></i><span class="menu-title" data-i18n="nav.dash.main">آیین نامه ها</span></a>
            </li>

            <li class="{{{ (Request::is('instructions') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/instructions"><i class="icon-rocket"></i><span class="menu-title" data-i18n="nav.dash.main">دستورالعمل ها  </span></a>
            </li>

            <li class="{{{ (Request::is('phoneBooks') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/phoneBooks"><i class="icon-phone"></i><span class="menu-title" data-i18n="nav.dash.main">دفترچه تلفن</span></a>
            </li>


            <li style="" class="{{{ (Request::is('Suggestions') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Suggestions"><i class="icon-feed"></i><span class="menu-title" data-i18n="nav.dash.main"> پیشنهادات و انتقادات</span></a>
            </li>
            <li style="" class="{{{ (Request::is('Baner') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/Baner"><i class="icon-docs"></i><span class="menu-title" data-i18n="nav.dash.main">  اطلاعیه ها</span></a>
            </li>

            {{-- <li style="" class="{{{ (Request::is('forms') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/forms"><i class="icon-docs"></i><span class="menu-title" data-i18n="nav.dash.main"> فرم ها</span></a>
            </li>
            <li style="" class="{{{ (Request::is('consent') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/consent"><i class="ft-bar-chart"></i><span class="menu-title" data-i18n="nav.dash.main"> رضایت نامه ها</span></a>
            </li>

            <li style="" class="{{{ (Request::is('PerformanceEvaluation/create') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/PerformanceEvaluation/create"><i class="icon-wallet"></i><span class="menu-title" data-i18n="nav.dash.main">کارکرد ارزیابی عملکرد</span></a>
            </li> --}}

            {{-- <li style="" class="{{{ (Request::is('dailyWork') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/dailyWork"><i class="ft-tablet"></i><span class="menu-title" data-i18n="nav.dash.main"> گزارش روزانه</span></a>
            </li> --}}


            {{-- <li style="" class="{{{ (Request::is('chat') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/chat"><i class="icon-speech"></i><span class="menu-title" data-i18n="nav.dash.main">  چت</span></a>
            </li> --}}

            <li style="" class="{{{ (Request::is('divar') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/divar"><i class="icon-wallet"></i><span class="menu-title" data-i18n="nav.dash.main">  آگهی ها</span></a>
            </li>

            <li style="" class="{{{ (Request::is('article') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/article"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">  مقالات</span></a>
            </li>

            {{-- <li class="{{{ (Request::is('*archives*') ? 'active' : '') }}}   nav-item has-sub">
                <a class="orangeColor" href="#"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.templates.main"> ارجاع کار</span></a>

                <ul class="menu-content" style="">

                    <li style="" class="{{{ (Request::is('*invoices*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*invoices*') ? 'active' : '') }}}  " href="{{ url('/invoices') }}" data-i18n="nav.templates.vert.classic_menu"> استعلام /صدورپیش فاکتور  </a>
                    </li>
                    <li style="" class="{{{ (Request::is('*tenders*') ? 'active' : '') }}}  nav-item">
                        <a class="menu-item orangeColor {{{ (Request::is('*tenders*') ? 'active' : '') }}}  " href="{{ url('/tenders') }}" data-i18n="nav.templates.vert.classic_menu"> مناقصه/کارپذیری  </a>
                    </li>



                </ul>
            </li> --}}

            {{-- <li style="" class="{{{ (Request::is('InfoCompany') ? 'active' : '') }}}  nav-item">
                <a class="orangeColor" href="/InfoCompany"><i class="ft-tablet"></i><span class="menu-title" data-i18n="nav.dash.main"> اطلاعات دفتر</span></a>
            </li> --}}
            @can('administrator')
                <li class="{{{ (Request::is('users') ? 'active' : '') }}}   nav-item has-sub">
                    <a class="orangeColor" href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="nav.templates.main">تنظیمات سیستم</span></a>

                    <ul class="menu-content" style="">
                        <li style="" class="{{{ (Request::is('users') ? 'active' : '') }}}  nav-item">
                            <a class="menu-item orangeColor" href="users" data-i18n="nav.templates.vert.classic_menu">مدیریت کاربران</a>
                        </li>

                        {{-- <li style="" class="{{{ (Request::is('users') ? 'active' : '') }}}  nav-item">
                            <a class="menu-item orangeColor" href="" data-i18n="nav.templates.vert.classic_menu">مدیریت تایم شیت کارکنان</a>
                        </li> --}}

                        {{-- <li style="" class="{{{ (Request::is('dailyWorkAllUser') ? 'active' : '') }}}  nav-item">
                            <a class="menu-item orangeColor" href="/dailyWorkAllUser" data-i18n="nav.templates.vert.classic_menu">مدیریت فعالیت های کارکنان</a>
                        </li> --}}

                    </ul>
                </li>
            @endcan


        </ul>
    </div>
</div>


@yield('content')


<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">تمامی حقوق سامانه برای شرکت ارتباطات پرشیا محفوظ میباشد.</span><span
                class="float-md-right d-block d-md-inline-blockd-none d-lg-block"></span></p>
</footer>


<!-- BEGIN VENDOR JS-->
<script src="/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<!-- BEGIN ROBUST JS-->
<script src="/js/core/app-menu.js" type="text/javascript"></script>
<script src="/js/core/app.js" type="text/javascript"></script>
<script src="/js/scripts/customizer.js" type="text/javascript"></script>
<script src="/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>


<script src="/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<script src="/vendors/datepicker/js/persianDatepicker.js"></script>
<script type="text/javascript">




    $(function () {
        $("#input1, #span1").persianDatepicker({
            theme: 'dark',
            formatDate: "YYYY/MM/DD"

        // formatDate: "YYYY/MM/DD hh:mm:ss:ms"
    });
    });

    $(function () {
        $(".date").persianDatepicker({
            theme: 'dark',
            formatDate: "YYYY/MM/DD"

        // formatDate: "YYYY/MM/DD hh:mm:ss:ms"
    });
    });

</script>

<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
@include('layouts.partials')
@yield('footerscripts')
<!-- END PAGE LEVEL JS-->


</body>

</html>
