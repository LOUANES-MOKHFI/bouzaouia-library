@extends('site.layouts.master')
@section('title')
حسابي
@endsection
@section('css')
<style>
     table,td,th {text-align: right; direction: rtl;}
</style>
@endsection
@section('content')
<div id="breadcrumb" class="section" style="text-align: right">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">حسابي </a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav" >
                        <li class="active"><a style="font-size:20px" data-toggle="tab" href="#tab1">حسابي</a></li>
                        <li><a data-toggle="tab" href="#tab2">طلبياتي</a></li>
                        <!--li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li-->
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">

                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12" style="text-align:right">

                                </div>
                            </div>
                        </div>


                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12" style="text-align:right">
                                    <div class="col-sm-12 col-md-12 col-md-offset-1">
                                        @isset($orders)
                                        @foreach($orders as $order)
                                        <h4>كود الطلبية : <span class="text-info">{{$order->code}}</span></h4>
                                        <h4>حالة الطلبية : 
                                            @if($order->status == 0)
                                                <span class="text-danger"> في انتضار التأكيد  </span>
                                            @else
                                                <span class="text-success"> الطلبية مؤكدة</span>
                                            @endif
                                        </h4>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>الكتب</th>
                                                    <th>العنوان</th>
                                                    <th>المؤلف</th>
                                                    <th>الكمية</th>
                                                    <th class="text-right">السعر</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($order->details)
                                                @foreach($order->details as $item)
                                                <tr>
                                                    <td><img src="{{asset('assets/books/cover/'.$item->book->cover)}}" width="80px" height="100px"></td>
                                                    <td>{{$item->book->title}}</td>
                                                    <td>{{$item->book->author}}</td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{$item->price}}</td>
                                                </tr>
                                                    
                                                @endforeach
                                                @endisset
                                                
                                               
                                                
                                            </tbody>
                                        </table>
                                        @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    <!-- /product tab content  -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection