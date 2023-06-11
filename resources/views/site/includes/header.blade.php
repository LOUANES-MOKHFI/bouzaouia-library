<header>
			<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<!--ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> {{setting()->phone}}</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> {{setting()->email}}</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i>{{setting()->adresse}}</a></li>
			</ul-->
			<ul class="header-links pull-right">
			@if (Route::has('login'))
				@auth
					<li><a href="{{route('profile')}}"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
					<li><a href="{{route('logout')}}" 
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> خروج</a></li>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
				@else
					@if (Route::has('register'))
						<li><a href="{{route('register')}}"><i class="fa fa-user-o"></i> تسجيل</a></li>
					@endif
					<li><a href="{{route('login')}}"><i class="fa fa-user-o"></i>تسجيل الدخول</a></li>
				@endauth
			@endif
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="{{route('home')}}" class="logo">
							<img src="{{asset('assets/books/logo/'.setting()->logo)}}" alt="{{setting()->site_name}}" width="130px">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form method="get" action="{{route('search_book')}}">
							<button class="search-btn">بحث</button>
							<input class="input" name="keyword" placeholder=" ... اسم الكتاب" style="text-align: right;">
							
							<select class="input-select" name="category">
								<option value="0">كل الأقسام</option>
								@foreach(\App\Models\Category::where('is_active',1)->get() as $category)
								<option value="{{$category->slug}}">{{$category->name}}</option>
								@endforeach
							</select>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<!-- Wishlist -->
						<div>
							<a href="#">
								<!--<i class="fa fa-heart-o"></i>
								<span>المفضلة</span>
								<div class="qty">2</div> -->
							</a>
						</div>
						<!-- /Wishlist -->

						<!-- Cart -->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"  style="font-size: 25px !important"> </i>
								<span>السلة</span>
								<div class="qty">{{count(Jackiedo\Cart\Facades\Cart::name('shopping')->getItems())}}</div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">
									@foreach(\Jackiedo\Cart\Facades\Cart::name('shopping')->getDetails()->get('items') as $key=> $book)
									<div class="product-widget">
										<div class="product-img">
											<img src="{{asset('assets/books/cover/'.getCover($book->id))}}" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">{{$book->title}}</a></h3>
											<h4 class="product-price"><span class="qty">{{$book->quantity}}x</span>{{$book->price}}</h4>
										</div>
										<a class="delete" href="{{route('clear_item',$book->hash)}}"><i class="fa fa-close"></i></a>
									</div>
									@endforeach
								</div>
								<div class="cart-summary" style="">
									<strong> <span>{{count(Jackiedo\Cart\Facades\Cart::name('shopping')->getItems())}}</span> كتب تم اختيارها </strong>
									<h5>المبلغ الكلي: {{\Jackiedo\Cart\Facades\Cart::name('shopping')->getSubtotal()}} دج</h5>
								</div>
								<div class="cart-btns">
									<a href="{{route('shoping_cart')}}">عرض السلة</a>
									@if(Auth::user())
									<a href="{{route('checkout')}}">  انهاء عملية الدفع <i class="fa fa-arrow-circle-right"></i></a>
									@else

									<a href="{{route('checkout')}}" /*class="shoModalNotLogin"*/>  انهاء عملية الدفع <i class="fa fa-arrow-circle-right"></i></a>
									
									@endif

									
								</div>
							</div>
						</div>
						<!-- /Cart -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>الصفحات</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>