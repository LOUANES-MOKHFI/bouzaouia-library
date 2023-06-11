<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title') - {{setting()->site_name}}</title>

	<!-- Main Styles -->
	@include('admin.includes.style')
	@yield('css')
</head>

<body>
<div class="main-menu">
	@include('admin.includes.header_bar')
	@include('admin.includes.sidebar')

	
	<!-- /.header -->
	
	<!-- /.content -->
</div>
<!-- /.main-menu -->

	@include('admin.includes.header')
	
<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		@yield('content')		
		
		@include('admin.includes.footer')
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	@include('admin.includes.script')
	@yield('js')
</body>
</html>