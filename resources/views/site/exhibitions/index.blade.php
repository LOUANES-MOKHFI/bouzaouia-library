@extends('site.layouts.master')
@section('title')
 المعارض المحلية و الدولية
@endsection
@section('css')
<style>
    th{
        text-align: right
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
                    <li><a href="#">المعرض المحلية و الدولية  </a></li>
                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="container text-right" style="direction:rtl">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered display" style="width:100%;text-align: right;">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>سم المعرض</th>
                    <th>الدولة</th>
                    <th>الولاية</th>
                    <th>من تاريخ</th>
                    <th>إلى تاريخ</th>
                </tr>
            </thead>
            <tbody>
            @isset($exhibitions)
                @if($exhibitions->count() <1)
                    <tr class="text-center">
                        <td colspan="6" style="font-size: 17px;font-weight:bold">لا توجد معارض</td>
                    </tr>
                @endif
                @foreach($exhibitions as $key=>$exhibition)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$exhibition -> title}}</td>
                        <td>{{$exhibition -> pays}}</td>
                        <td>{{$exhibition -> state == null ? '/' : $exhibition -> state}}</td>
                        <td>{{$exhibition -> date_from}}</td>
                        <td>{{$exhibition -> date_to}}</td>
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>

</div>
@endsection
@section('js')

@endsection