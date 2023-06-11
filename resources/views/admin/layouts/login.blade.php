<!DOCTYPE html>
<html class="js" lang="en" data-textdirection="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}" dir="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

    <title>{{setting()->site_name}} - @yield('title')</title>

	@include('admin.includes.style')
	@yield('css')






    @yield('style')

</head>
<body>

	<div id="single-wrapper">

	@yield('content')
	</div>
	<!-- /.main-content -->


	<script src="{{asset('assets/admin/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('assets/admin/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('assets/admin/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/admin/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('assets/admin/plugin/waves/waves.min.js')}}"></script>

	<script src="{{asset('assets/admin/scripts/main.min.js')}}"></script>

	@yield('script')
</body>
</html>
