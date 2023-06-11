@extends('admin.layouts.master')
@section('title')
قائمة الأقسام
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <h4 class="box-title">ائمة الأقسام</h4>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <a href="{{route('admin.categories.create')}}"
                    class="box-title btn btn-primary float-right">
                    <i class="fa fa-plus-circle"></i> أضف قسم</a>
                </div>
            </div>
            @include('admin.includes.alerts.alerts')
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>سم القسم</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>سم القسم</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @isset($categories)
                        @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category -> name}}</td>
                                <td>{{$category -> getActive()}}</td>
                                <td>
                                    <a href="{{route('admin.categories.edit',$category -> uuid)}}" class="btn  btn-sm btn-bordered btn-warning waves-effect waves-light" title="تعديل">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.categories.delete',$category -> uuid)}}" class="btn btn-sm btn-bordered  btn-danger waves-effect waves-light" title="حذف">
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
        <!-- /.box-content -->
    </div>

</div>

@endsection

@section('js')

@endsection