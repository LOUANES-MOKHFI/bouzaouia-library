<header class="header">
	<a href="{{route('admin')}}" class="logo"><i class="ico mdi mdi-cube-outline"></i>{{setting()->site_name}}</a>
	<button type="button" class="button-close fa fa-times js__menu_close"></button>
	<div class="user">
		<a href="#" class="avatar"><img src="{{asset('assets/admin/images/avatar-sm-5.jpg')}}" alt=""><span class="status online"></span></a>
		<h5 class="name"><a href="profile.html">{{auth('admins')->user() ? auth('admins')->user()->name : ''}}</a></h5>
		<h5 class="position">{{auth('admins')->user() ? auth('admins')->user()->role->name : ''}}</h5>
		<!-- /.name -->
		<div class="control-wrap js__drop_down">
			<i class="fa fa-caret-down js__drop_down_button"></i>
			<div class="control-list">
				<div class="control-item"><a href="{{route('admin.settings')}}"><i class="fa fa-gear"></i> الاعدادات</a></div>
				<div class="control-item"><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i> تسجيل الخروج</a></div>
			</div>
			<!-- /.control-list -->
		</div>
		<!-- /.control-wrap -->
	</div>
	<!-- /.user -->
</header>