@extends('site.layouts.master')
@section('title')
عن الدار 
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
                    <li><a href="#"> عن الدار </a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="container text-right">
    {!! html_entity_decode(setting()->about) !!}
</div>

@endsection
@section('js')

@endsection