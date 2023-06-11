@extends('site.layouts.master')
@section('title')
أحدث الإصدارات
@endsection
@section('css')

@endsection
@section('content')
<div id="breadcrumb" class="section" style="text-align: right">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">أحدث الإصدارات</a></li>
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
            <!-- ASIDE -->
            <div id="aside" class="col-md-2" style="text-align: right">
                <!-- aside Widget -->
                <div class="aside" >
                    <h3 class="aside-title">الأقسام</h3>
                    <div class="checkbox-filter">
                        @isset($categories)
                        @foreach($categories as $key=>$category)
                        <div class="input-checkbox">
                            
                            <label for="category-{{$category->id}}" style="font-size:17px">
                                <span></span>
                                <a href="{{route('books.category',$category->slug)}}">{{$category->name}}</a>
                                <small>({{$category->books->count()}})</small>
                            </label>
                        </div>
                        @endforeach
                        @endisset

                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <!--div class="aside">
                    <h3 class="aside-title"> السعر</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div-->
                <!-- /aside Widget -->

                <!--div class="aside">
                    <h3 class="aside-title">سنة النشر</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number ">
                            <input id="" type="number" placeholder="2000">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number ">
                            <input id="" type="number" placeholder="2023">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </divf-->
               

                
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-10">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <!--div class="store-sort">
                        <label>
                            ترتيب حسب :
                            <select class="input-select">
                                <option value="0">شائع</option>
                                <option value="1">موضع</option>
                            </select>
                        </label>

                        <label>
                            عرض :
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div-->
                    <!--ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul-->
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