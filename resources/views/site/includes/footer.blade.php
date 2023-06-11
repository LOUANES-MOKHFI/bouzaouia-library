@include('site.includes.components.news_letter')
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer" style="text-align:right">
						<h3 class="footer-title">عن الدار</h3>
						<p>{!! html_entity_decode(setting()->slegon) !!}</p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>{{setting()->adresse}}</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>{{setting()->phone}}</a></li>
							<li><a href="#"><i class="fa fa-fax"></i>{{setting()->fax}}</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>{{setting()->email}}</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer" style="text-align:right">
						
						<h3 class="footer-title">الأقسام</h3>
						<ul class="footer-links">
							@foreach(\App\Models\Category::where('is_active',1)->orderBy('id','DESC')->limit(4)->get() as $category)
							<li><a href="{{route('books.category',$category->slug)}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer" style="text-align:right">
						<h3 class="footer-title">معلومات أخرى</h3>
						<ul class="footer-links">
							<li><a href="{{route('about')}}">عن الدار</a></li>
							<li><a href="#">تحميل القوائم</a></li>
							<li><a href="#">طريقة الشراء </a></li>
							<li><a href="#">العارض المحلية و الدولية</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer" style="text-align:right">
						<h3 class="footer-title">الحساب</h3>
						<ul class="footer-links">
							<li><a href="#">حسابي</a></li>
							<li><a href="#">تسجيل</a></li>
							<li><a href="#">المفضلة</a></li>
							<li><a href="#">السلة</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | developped & designed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://facebook.com/louadev" target="_blank">L-DEV</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
				<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>