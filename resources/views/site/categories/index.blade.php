@extends('site.layouts.master')
@section('title')
 التخصصات
@endsection
@section('css')
<style>
    .card-btn{
        border-radius: 1px solid red
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
                    <li><a href="#">التخصصات  </a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="container text-right" style="padding-top:10px;direction:rtl">
	<div class="row">
        @isset($categories)
        @foreach($categories as $category)
		<div class="col-sm-2 col-md-2">
			<div class="sidebar-nav">
                <div class="navbar navbar-default text-canter" role="navigation" style="text-align: center;padding:10px">
                    <a href="{{route('books.category',$category->slug)}}" class="nav-link text-canter" style="font-weight: bold">
                        {{$category->name}}
                    </a>
                </div>
			</div>
		</div>
        @endforeach
        @endisset
    </div>
</div>

@endsection
@section('js')

@endsection