<!DOCTYPE html>

<html lang="en" >

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		 <meta name="description" content="تعتبر الأكاديمية سليلة دار الوليد للتوثيق المتخصصة في استيراد الكتب من الدول العربية الشقيقة وتوزيعها منذ سنة 2005 وبالتالي ولجت الدار إلى بلورة القفزة النوعية الثانية من الشراء وإعادة البيع إلى الإنتاج وإستغلال مقومات البلد من أقلام ومحتوى مشهود له في كل الأقطار العربية .
وستبذل الأكاديمية كل مجهوداتها لايصال مشروعها لكل مؤلف،مبدع ،مؤسسة جامعية ،ثقافية  للمساهمة في عملية النشر والعمل على مرئيته من خلال المشاركة في المعارض المحلية والدولية،وتحيين موقعها الالكتروني بشكل منتظم كما تضمن نشر إنتاجهم وفق أسس منهجية وعلمية في عالم النشر الذي أصبح فيه الكتاب صناعة مهمة بحاجة إلى كثير من الحرفة والدربة والفن والذوق والجمال" charset="utf-8">

		 <link rel="icon" href="{{asset('assets/books/logo/'.setting()->logo)}}" />

		<title>@yield('title') - {{setting()->site_name}}</title>

		

		@include('site.includes.style')

		@yield('css')

		<style>

			body,h1,h2,h3,h4,h5,h6,a,input,button,span,li,ul,p,td,th,table,tbody,thead{

				font-family:asterisk-override,Jazeera, Inter, Cerebri Sans, Helvetica, Arial, sans-serif;

			}

			   .modal-backdrop {

					display: none;

				}

				.modalDialog1 {

					position: fixed;

					font-family: Arial, Helvetica, sans-serif;

					top: 0;

					right: 0;

					bottom: 0;

					left: 0;

					z-index: 99999;

					opacity:1;

					-webkit-transition: opacity 400ms ease-in;

					-moz-transition: opacity 400ms ease-in;

					transition: opacity 400ms ease-in;

					pointer-events: auto;

					display:none;

				/*	background:rgba(0,0,0,0.8);*/

				}

				.modal-backdrop1 {

					background: rgba(0,0,0,0.8);

					position: absolute;

					top: 0;

					height: 100%;

					width: 100%;

				}

				.modalDialog1:target {

					opacity:1;

					pointer-events: auto;

				}

				.modalDialog1 .overlay {

					width: 450px;

					position: relative;

					margin: 5% auto;

					padding: 40px 50px;

					border-radius:0;

					background:white;

					z-index: 9999;

				}

				.close1 {

					background:black;

					color: #FFFFFF;

					line-height: 25px;

					position: absolute;

					right: -12px;

					text-align: center;

					top: -10px;

					text-decoration: none;

					font-weight: bold;

					opacity: 1;

					width: 40px;

					height: 30px;

					border-radius: 50%;

					padding: 6px 0px;

				}

				.modal-backdrop1.in{

					opacity:0;

				}

				.close1:focus, .close1:hover {

					background:black;

					color:white;

					opacity:1;

					text-decoration:none;

				}

				.modal-body1 .coupon-btn1, .modal-body1 .thanks-btn1 {

					background: #dc241e;

					width: 36%;

					float: left;

					display: inline-block;

					margin: 30px 20px 20px;

					color: #fff;

					cursor: pointer;

					font-family: "Oswald", sans-serif;

				}

				.modal-head1 {

					text-align:center;

				}

				.modal-body1 .coupon-btn1 {

					background:gray;

				}

				body.modal-open {

					overflow:auto; 

					padding-right:0 !important;

				}

				.heading {

				display:table;

				width:100%;

				}

		</style>

    </head>

	<body>

		<!-- HEADER -->

		@include('site.includes.header')

		

		<!-- /HEADER -->



		<!-- NAVIGATION -->

		@include('site.includes.nav')

		<!-- /NAVIGATION -->



		<!-- SECTION -->

		@yield('content')



		<!-- FOOTER -->

		@include('site.includes.modals.notLogin')

		@include('site.includes.footer')

		<!-- /FOOTER -->



		<!-- jQuery Plugins -->

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

