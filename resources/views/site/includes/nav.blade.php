<!-- <nav id="navigation">
	<div class="container">
		<div id="responsive-nav">
			<ul class="main-nav nav navbar-nav">
				<li><a href="#"></a></li>
				<li class=""><a href="{{route('about')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">عن الدار </a></li>
				<li><a href="{{route('purchase_method')}}"  style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">طريقة الشراء  </a></li>
				<li><a href="{{route('download_list')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">تحميل القوائم </a></li>
				<li><a href="{{route('categories')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px"> التخصصات  </a></li>
				<li class=""><a href="{{route('new_arrivals')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">أحدث الاصدارات</a></li>
				<li ><a href="{{route('add_your_book')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">أنشر كتابك </a></li>
				
				<li><a href="{{route('shoping_cart')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">سلة المشتريات</a></li>
				<li><a href="{{route('exhibitions')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">المعارض المحلية و الدولية</a></li>
				<li><a href="{{route('books')}}" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">الكتب</a></li>

				<li><a href="#" style="font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif !important;font-weight:bold;font-size:17px">الأقسام</a></li>

			</ul>
		</div>
	</div>
</nav>
 -->
 <div class="container-fluid mb-5">
	<div class="row border-top px-xl-5">
		<div class="col-lg-3 d-none d-lg-block">
			<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
				<h6 class="m-0">Categories</h6>
				<i class="fa fa-angle-down text-dark"></i>
			</a>
			@include('site.includes.categories')
		</div>
		<div class="col-lg-9">
			<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
				<a href="" class="text-decoration-none d-block d-lg-none">
					<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<div class="navbar-nav mr-auto py-0">
						<a href="{{route('about')}}" class="nav-item nav-link">عن الدار </a>
						<a href="{{route('purchase_method')}}" class="nav-item nav-link">طريقة الشراء </a>
						<a href="{{route('download_list')}}" class="nav-item nav-link"> تحميل القوائم </a>
						<a href="{{route('categories')}}" class="nav-item nav-link">التخصصات</a>
						<a href="{{route('books')}}" class="nav-item nav-link">الكتب </a>
						<a href="{{route('new_arrivals')}}" class="nav-item nav-link">أحدث الاصدارات </a>
						<a href="{{route('new_arrivals')}}" class="nav-item nav-link"> سلة المشتريات </a>
						<a href="contact.html" class="nav-item nav-link">اتصل بنا</a>
					</div>
					<div class="navbar-nav ml-auto py-0">
						<a href="" class="nav-item nav-link">تسجيل الدخول</a>
						<a href="" class="nav-item nav-link">تسجيل العضوية</a>
					</div>
				</div>
			</nav>
			@include('site.includes.sliders')
		</div>
	</div>
</div> 