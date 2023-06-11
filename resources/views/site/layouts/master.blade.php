<!DOCTYPE html>

<html lang="ar" dir="rtl">

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		 <meta name="description" content="
تعتبر الأكاديمية سليلة دار الوليد للتوثيق المتخصصة في استيراد الكتب من الدول العربية الشقيقة وتوزيعها منذ سنة 2005 وبالتالي ولجت الدار إلى بلورة القفزة النوعية الثانية من الشراء وإعادة البيع إلى الإنتاج وإستغلال مقومات البلد من أقلام ومحتوى مشهود له في كل الأقطار العربية .
وستبذل الأكاديمية كل مجهوداتها لايصال مشروعها لكل مؤلف،مبدع ،مؤسسة جامعية ،ثقافية  للمساهمة في عملية النشر والعمل على مرئيته من خلال المشاركة في المعارض المحلية والدولية،وتحيين موقعها الالكتروني بشكل منتظم كما تضمن نشر إنتاجهم وفق أسس منهجية وعلمية في عالم النشر الذي أصبح فيه الكتاب صناعة مهمة بحاجة إلى كثير من الحرفة والدربة والفن والذوق والجمال" charset="utf-8">

		 <link rel="icon" href="{{asset('assets/books/logo/'.setting()->logo)}}" />

		<title>@yield('title') - {{setting()->site_name}}</title>

		

		@include('site.includes.style')

		@yield('css')


    </head>

	<body>

		@include('site.includes.top-bar')
		@include('site.includes.nav')
		@yield('content')
		@include('site.includes.footer')


		<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

		@include('site.includes.script')
		@yield('js')

		<script>

			$(document).ready(function() {

				  $(".shoModalNotLogin").click(function () {

					$(".modalDialog1").modal("show");

				  });

				  $(".thanks-btn1").on('click',function(){

					$(".modalDialog1").css("display","none");

				});

				  $(".close1").on('click',function(){

					$(".modalDialog1").css("display","none");

				});

				$(".modal-backdrop1").click(function () {

					$(".modalDialog1").css("display","none");

				  });

			});

		</script>

	</body>

</html>

