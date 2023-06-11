<div class="content">

	<div class="navigation">
		
		<!-- /.title -->
		<ul class="menu js__accordion">
			<li class="current">
				<a class="waves-effect" href="{{route('admin')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>الرئيسية</span></a>
			</li>

			<li class="">
				<a class="waves-effect" href="{{route('admin.orders')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>الطلبيات</span></a>
			</li>
			
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>المستخدمين</span><span class="menu-arrow fa fa-angle-down"></span></a>
				<ul class="sub-menu js__content">
					<li><a href="{{route('admin.users')}}">قاءمة المستخدمين</a></li>
					<li><a href="{{route('admin.users.create')}}">أضف مستخدم</a></li>
				</ul>
				<!-- /.sub-menu js__content -->
			</li>
			
			
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>الأقسام</span><span class="menu-arrow fa fa-angle-down"></span></a>
				<ul class="sub-menu js__content">
					<li><a href="{{route('admin.categories')}}">قائمة الأقسام</a></li>
					<li><a href="{{route('admin.categories.create')}}">أضف قسم</a></li>
				</ul>
				<!-- /.sub-menu js__content -->
			</li>
			
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>الكتب</span><span class="menu-arrow fa fa-angle-down"></span></a>
				<ul class="sub-menu js__content">
					<li><a href="{{route('admin.books')}}">قائمة  الكتب</a></li>
					<li><a href="{{route('admin.books.create')}}">أضف  كتاب</a></li>
				</ul>
				<!-- /.sub-menu js__content -->
			</li>
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>القوائم</span><span class="menu-arrow fa fa-angle-down"></span></a>
				<ul class="sub-menu js__content">
					<li><a href="{{route('admin.lists')}}">كل القوائم</a></li>
					<li><a href="{{route('admin.lists.create')}}">أضف قائمة</a></li>
				</ul>
				<!-- /.sub-menu js__content -->
			</li>
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>المعارض</span><span class="menu-arrow fa fa-angle-down"></span></a>
				<ul class="sub-menu js__content">
					<li><a href="{{route('admin.exhibitions')}}">كل المعارض</a></li>
					<li><a href="{{route('admin.exhibitions.create')}}">أضف معرض</a></li>
				</ul>
				<!-- /.sub-menu js__content -->
			</li>
			
			<li>
				<a class="waves-effect" href="{{route('admin.states')}}"><i class="menu-icon mdi mdi-email"></i><span>الولايات</span></a>
			</li>
			<!--li>
				<a class="waves-effect" href="{{route('admin.roles')}}"><i class="menu-icon mdi mdi-email"></i><span>الصلاحيات</span></a>
			</li-->
			<li>
				<a class="waves-effect" href="{{route('admin.sliders')}}"><i class="menu-icon mdi mdi-email"></i><span>الصور</span></a>
			</li>
			<li>
				<a class="waves-effect" href="{{route('admin.settings.purchase_methode')}}"><i class="menu-icon mdi mdi-email"></i><span>طريقة الشراء</span></a>
			</li>
			<li>
				<a class="waves-effect" href="{{route('admin.settings')}}"><i class="menu-icon mdi mdi-email"></i><span>الإعدادات</span></a>
			</li>
			
			
		</ul>
	</div>
	<!-- /.navigation -->
</div>