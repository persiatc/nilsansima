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




<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">تغییر اطلاعات کاربری</h4>
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
              <div class="card-body">
                <p>در این بخش میتوانید اطلاعات کاربری خود را مشاهده و ویرایش نمایید.</p>

                @if ($errors->any())
                <div style="font-family:Byekan" class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <br>
                <ul class="nav nav-tabs nav-top-border no-hover-bg">
                  <li class="nav-item">
                    <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" aria-expanded="true">اطلاعات کاربری</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="false">تغییر رمز عبور</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab13" href="#tab13" aria-expanded="false">تغییر تصویر پروفایل</a>
                  </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                  <div role="tabpanel" class="tab-pane active" id="tab11" aria-expanded="true" aria-labelledby="base-tab11">
                    <form class="form" method="post" action="/profile/updateInformation" >
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> اطلاعات کاربری</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">نام</label>
                              <input type="text" id="name" class="form-control" value="{{ $user->name }}"  name="name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="family">نام خانوادگی</label>
                              <input type="text"  id="family" class="form-control" value="{{ $user->family }}" name="family">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">آدرس ایمیل</label>
                              <input type="text" style="direction: ltr; font-family: Arial!important" id="email" class="form-control" value="{{ $user->email }}" disabled name="email">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="mobileNumber">شماره تماس</label>
                              <input type="text" id="mobileNumber" class="form-control" value="{{ $user->mobileNumber }}" name="mobileNumber">
                            </div>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="groupName">واحد</label>
                              <input type="text" id="groupName" class="form-control" value="{{ $user->groupName }}" disabled name="groupName">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">سمت</label>
                              <input type="text" id="position" class="form-control" value="{{ $user->position }}" disabled name="position">
                            </div>
                          </div>
                        </div>




                        <div class="form-actions">
                          <button type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ذخیره
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab12" aria-labelledby="base-tab12">
                    <form class="form" action="profile/updatePassword" method="post">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> تغییر رمز عبور</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">رمز عبور جدید:</label>
                              <input type="password" style="direction:ltr" id="password" class="form-control"  name="password">
                            </div>
                          </div>
                        </div>


                        <div class="form-actions">
                          <button type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ذخیره
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab13" aria-labelledby="base-tab13">
                    <form class="form" action="profile/updateAvatar" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> تصویر پروفایل</h4>
                        <div class="form-group">
                          <label id="avatar" class="file center-block">
                            <fieldset class="form-group">

                              <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" style="min-width: 450px" name="avatar" for="avatar">جهت بروزرسانی تصویر پروفایل اینجا کلیک کنید.</label>
                            </div>
                            </fieldset>
                            <span class="file-custom"></span>
                          </label>
                        </div>

                        <div class="form-actions">
                          <button type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ذخیره
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

@endsection


@section('footerscripts')
<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
