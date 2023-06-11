@extends('admin.layouts.login')
@section('title','تسجيل الدخول')
@section('content')


   <form action="{{route('admin.login')}}" method="post" class="frm-single">
    @csrf
        <div class="inside">
            <div class="title"><strong>{{App\Models\Settings::where('id',1)->first()->site_name}}</strong></div>
            <!-- /.title -->
            <div class="frm-title">تسجيل الدخول</div>
            <!-- /.frm-title -->
            <div class="frm-input">
            @include('admin.includes.alerts.alerts')
            </div>

            <div class="frm-input">
                <input name="email" value="{{old('email')}}" type="email" placeholder="البريد الالكتروني" class="frm-inp"><i class="fa fa-user frm-ico"></i>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- /.frm-input -->
            <div class="frm-input"><input name="password"  type="password" placeholder="كلمة السر" class="frm-inp"><i class="fa fa-lock frm-ico"></i>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <!-- /.frm-input -->
            <div class="clearfix margin-bottom-20">
                <div class="pull-left">
                    <div class="checkbox primary"><input type="checkbox"  name="remember_me" id="rememberme"><label for="rememberme">تذكرني</label></div>
                    <!-- /.checkbox -->
                </div>
                <!-- /.pull-left -->
                <!--div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div-->
                <!-- /.pull-right -->
            </div>
            <!-- /.clearfix -->
            <button type="submit" class="frm-submit">تسجيل الدخول<i class="fa fa-arrow-circle-right"></i></button>
            <!--div class="row small-spacing">
                <div class="col-sm-12">
                    <div class="txt-login-with txt-center">or login with</div>
                </div>
                <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
                <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
            </div-->

            <div class="frm-footer">{{App\Models\Settings::where('id',1)->first()->site_name}} © {{date('Y')}}.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>
@endsection
