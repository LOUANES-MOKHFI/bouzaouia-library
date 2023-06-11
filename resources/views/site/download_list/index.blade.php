@extends('site.layouts.master')
@section('title')
تحميل القوائم
@endsection
@section('css')

@endsection
@section('content')
<div id="breadcrumb" class="section" style="text-align: right">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-md-offset-1">
                <ul class="breadcrumb-tree">
                    <li><a href="#">تحميل القوائم </a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
    @isset($lists)
    @if(count($lists)<1)
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <p class="alert alert-danger" style="font-size: 20px">
                            لا توجد قوائم
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container text-right">
        <h2 class="">
            تحميل القوائم
        </h2>
        <p style="font-size:18px">
            يمكنك الان الحصول على قائمة باحدث اصداراتنا من خلال تحميل القائمة على جهازك
        </p>
        <table class="table" style="direction:rtl">
            <tbody>
                @foreach($lists as $key=>$list)
                <tr>
                    <td style="font-size: 22px;font-weight:bold">{{$list->title}}</td>
                    
                    <td style="font-size:19px">
                        <a href="{{asset('assets/books/lists/'.$list->list)}}" target="_blank">
                            <i class="fa fa-download"></i> تحميل</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @endisset
@endsection
@section('js')

@endsection