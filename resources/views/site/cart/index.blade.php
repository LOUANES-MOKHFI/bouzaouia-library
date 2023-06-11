@extends('site.layouts.master')
@section('title')
السلة
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
                    <li><a href="#">السلة</a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>

                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>
@include('site.includes.components.alert')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الكتب</th>
                        <th>الكمية</th>
                        <th>تحديث</th>
                        <th class="text-right">السعر</th>
                        <th class="text-right">المجموع</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @isset($items)
                    @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-4 text-right">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('assets/books/cover/'.getCover($item->id))}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">  {{$item->title}}</a></h4>
                                <h5 class="media-heading"> قسم :<a href="#">  {{getCategory($item->id)->name}}</a></h5>
                            </div>
                        </div></td>

                        <form action="{{route('update_cart')}}" method="post">
                            @csrf
                            <td class="cart-product-quantity col-sm-1 col-md-1 text-right">
                                <div class="quant-input">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="hash" value="{{$item->hash}}">
                                    <input type="number" min="1" name="qty" class="form-control" id="exampleInputEmail1" value="{{$item->quantity}}">
                                </div>
                            </td>
                            <td class="cart-product-edit col-sm-1 col-md-1 text-right">
                                <button class="btn fa fa-spinner" style="color: red"></button>
                            </td>
                        </form>
                        <td class="col-sm-1 col-md-1 text-right"><strong>{{$item->price}} دج</strong></td>
                        <td class="col-sm-1 col-md-1 text-right"><strong>{{$item->price * $item->quantity}} دج</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a class="delete btn btn-danger" href="{{route('clear_item',$item->hash)}}"><i class="fa fa-close"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>المجموع</h3></td>
                        <td class="text-right"><h3><strong>{{\Jackiedo\Cart\Facades\Cart::name('shopping')->getSubtotal()}} دج</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a class="btn btn-default" href="{{route('books')}}">تابع التسوق <span class="fa fa-shopping-cart"></span></a>
                        </td>
                        <td>
                            @if(count($items) > 0)
                            
                            <a class="btn btn-success" href="{{route('checkout')}}">
                                انهاء عملية الشراء
                                <span class="fa fa-play"></span>
                            </a>
                           
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection