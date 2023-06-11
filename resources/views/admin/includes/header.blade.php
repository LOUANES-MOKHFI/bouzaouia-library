<style>
	.notifications .fa {
    color:#cecece;
    line-height:60px;
    font-size:22px;
}
.notifications .num {
    position:absolute;
    top:10px;
    right:-10px;
    width:20px;
    height:20px;
    border-radius:50%;
    background:#ff2c74;
    color:#fff;
    line-height:25px;
    font-family:sans-serif;
    text-align:center;
}
</style>
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<!--div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			
		</div-->
		<!--a href="#" class="ico-item mdi mdi-email notice-alarm js__toggle_open" data-target="#message-popup"></a-->
		<a href="#" class="ico-item notifications ico-item-notif">
			<i class="fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></i>
			<span class="num notif_user" data-count="{{count(AllNewOrder())}}">{{count(AllNewOrder())}}</span>
		</a>
		<a href="{{route('admin.logout')}}" class="ico-item mdi mdi-logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">الطلبيات الجديدة</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			@if(count(AllNewOrder())>0)
			@foreach(AllNewOrder() as $key => $order)
			<li>
				<a href="{{route('admin.orders.details',$order -> id)}}">
					<span class="name">{{$order->user->name}}</span>
					<span class="desc">{{$order->user->email}}</span>
					<span class="time">{{$order->created_at}}</span>
				</a>
			</li>
			@endforeach
			@endif
		</ul>
		<!-- /.notice-list -->
		<a href="{{route('admin.orders')}}" class="notice-read-more">كل الطلبيات <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->

