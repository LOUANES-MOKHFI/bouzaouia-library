@extends('site.layouts.master')
@section('title')
@isset($category)
{{$category->name}}
@else
الكتب
@endisset
@endsection
@section('css')
<style>
    .product{
        width: 200px;
    }
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
                    <li><a href="#">@isset($keyword) {{$keyword}} @else  الكتب @endisset</a></li>
                    <li><a href="{{route('books')}}">كل الكتب</a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>


                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@include('site.includes.components.alert')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                   
                   
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @isset($books)
                    @foreach($books as $key=>$book)
                    <div class="col-md-3 col-xs-6">
                        @include('site.includes.components.book')
                    </div>
                    @endforeach
                    @endisset
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                @include('site.includes.components.pagination')
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection
@section('js')

@endsection