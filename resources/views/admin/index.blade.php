@extends('admin.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
	<div class="col-lg-4 col-xs-12">
		<div class="box-content" style="height:140px">
			<a href="{{route('admin.books')}}">
			<h4 class="box-title text-info">كل الكتب</h4>
			<div class="content widget-stat">
				<div id="traffic-sparkline-chart-1" class="left-content margin-top-15"></div>
				<div class="right-content">
					<h2 class="counter text-info">{{$books->count()}}</h2>
					<p class="text text-info">قائمة الكتب</p>
				</div>
			</div>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-12">
		<div class="box-content" style="height:140px">
			<h4 class="box-title text-success">الكتب المعروضة للبيع</h4>
			<div class="content widget-stat">
				<div id="traffic-sparkline-chart-2" class="left-content margin-top-10"></div>
				<div class="right-content">
					<h2 class="counter text-success">{{$active_books->count()}}</h2>
					<p class="text text-success">Some text here</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-xs-12">
		<div class="box-content" style="height:140px">
			<h4 class="box-title text-success">الكتب الغير معروضة للبيع</h4>
			<div class="content widget-stat">
				<div id="traffic-sparkline-chart-3" class="left-content"></div>
				<div class="right-content">
					<h2 class="counter text-danger">{{$inactive_books->count()}}</h2>
					<p class="text text-danger">Some text here</p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- /.col-lg-6 col-xs-12 -->
</div>

<div class="row small-spacing" style="direction: rtl">
	<div class="col-lg-3 col-md-6 col-xs-12">
		<a href="{{route('admin.orders')}}">
		<div class="box-content bg-success text-white">
			<div class="statistics-box with-icon">
				<i class="ico small fa fa-shopping-cart"></i>
				<p class="text text-white">كل الطلبيات</p>
				<h2 class="counter">{{$orders->count()}}</h2>
			</div>
		</div>
		</a>
	</div>
	<div class="col-lg-3 col-md-6 col-xs-12">
		<div class="box-content bg-info text-white">
			<div class="statistics-box with-icon">
				<i class="ico small fa fa-shopping-cart"></i>
				<p class="text text-white">الطلبيات المؤكدة</p>
				<h2 class="counter">{{$confirmed_orders->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-xs-12">
		<div class="box-content bg-danger text-white">
			<div class="statistics-box with-icon">
				<i class="ico small fa fa-shopping-cart"></i>
				<p class="text text-white">الطلبيات الغير مؤكدة</p>
				<h2 class="counter">{{$notconfirmerd_orders->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-xs-12">
		<div class="box-content bg-warning text-white">
			<div class="statistics-box with-icon">
				<i class="ico small">دج</i>
				<p class="text text-white">السعر الكلي للطلبيات</p>
				<h2 class="counter">{{$sum_sale}}</h2>
			</div>
		</div>
		<!-- /.box-content -->
	</div>
</div>
<div class="row small-spacing">
	<div class="col-lg-12 col-xs-12">
		<div class="box-content">
			<h4 class="box-title">أفضل الكتب مبيعا</h4>			
			<div class="table-responsive table-purchases">
				<table id="example" class="table table-striped table-bordered display" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>العنوان</th>
							<th>المؤلف</th>
							<th>السعر</th>
							<th>الحالة</th>
							<th>عدد المبيعات</th>
							<th>العمليات</th>
						</tr>
					</thead>
					<tbody>
					@isset($best_books)
						@foreach($best_books as $key=>$book)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$book -> title}}</td>
								<td>{{$book -> author}}</td>
								<td>{{$book -> price}}</br>
									@if($book->special_price == 1) <span class="text-danger">{{$book->special_price_value}}</span>@endif
								</td>
								<td>{{$book -> getActive()}}</td>
								<td>{{$book -> nbr_saled}}</td>
								<td>
									<a href="{{route('admin.books.changeStatus',$book -> uuid)}}" class="btn btn-sm btn-bordered @if($book->is_active == 1) btn-primary @else btn-successتفعيل  @endif waves-effect" title="تعديل">
										@if($book->is_active == 1) تعطيل  @else تفعيل @endif
									</a>

									<a href="{{route('admin.books.show',$book -> uuid)}}" class="btn btn-sm btn-bordered btn-primary waves-effect" title="استضهار الكتاب">
										<i class="fa fa-eye"></i>
									</a>
									<a href="{{route('admin.books.edit',$book -> uuid)}}" class="btn  btn-sm btn-bordered btn-warning waves-effect waves-light" title="تعديل">
										<i class="fa fa-edit"></i>
									</a>
									<a href="{{route('admin.books.delete',$book -> uuid)}}" class="btn btn-sm btn-bordered  btn-danger waves-effect waves-light" title="حذف">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						@endforeach
					@endisset
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row small-spacing">
	<div class="col-lg-12 col-xs-12">
		<div class="box-content">
			<h4 class="box-title">آخر 5 طلبية</h4>
			<table id="example" class="table table-striped table-bordered display" style="width:100%">
				<thead>
					<tr>
						<th>#</th>
						<th>كود الطلبية</th>
						<th>تاريخ الطلبية</th>
						<th>طريقة الدفع</th>
						<th>حالة الطلبية</th>
						<th> العميل</th>
						<th> الولاية</th>
						<th>العمليات</th>
					</tr>
				</thead>
				<tbody>
					@isset($last_orders)
						@foreach($last_orders as $key => $order)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$order -> code}}</td>
								<td>{{$order->created_at}}</td>
								<td>{{$order->paid_methode}}</td>
								<td>
									@if($order->status == 0)
										<span class="text-danger">طلبية جديدة</span>
									@else
										<span class="text-success">طلبية مؤكدة</span>
									@endif
								</td>
								<td>{{$order->user->name}}<br>{{$order->user->email}}</td>
								<td>{{$order->state->name}}</td>

								<td>
									<a href="{{route('admin.orders.details',$order -> id)}}"
										class="btn btn-info btn-sm btn-bordered waves-effect waves-light"title="عرض">
										<i class="fa fa-eye"></i>
									</a>
									@if($order->status == 0)
									<a href="{{route('admin.orders.change_status',$order -> id)}}"
										class="btn btn-success btn-sm btn-bordered waves-effect waves-light">
										تأكيد الطلبية
									</a>
									@endif
									

								</td>
							</tr>
						@endforeach
					@endisset
				</tbody>
			</table>
		</div>
		<!-- /.box-content -->
	</div>
	
</div>

<!-- /.row -->

@endsection

@section('js')

@endsection