@extends('admin.layouts.master')
@section('title')
المعرض المحلية و الدولية
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <h4 class="box-title">المعرض المحلية و الدولية </h4>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <a href="{{route('admin.exhibitions.create')}}"
                    class="box-title btn btn-primary float-right">
                    <i class="fa fa-plus-circle"></i> أضف معرض</a>
                </div>
            </div>
            @include('admin.includes.alerts.alerts')
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>سم المعرض</th>
                            <th>الدولة</th>
                            <th>الولاية</th>
                            <th>من تاريخ</th>
                            <th>إلى تاريخ</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>سم المعرض</th>
                            <th>الدولة</th>
                            <th>الولاية</th>
                            <th>من تاريخ</th>
                            <th>إلى تاريخ</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @isset($exhibitions)
                        @foreach($exhibitions as $key=>$exhibition)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$exhibition -> title}}</td>
                                <td>{{$exhibition -> pays}}</td>
                                <td>{{$exhibition -> state}}</td>
                                <td>{{$exhibition -> date_from}}</td>
                                <td>{{$exhibition -> date_to}}</td>
                                <td>{{$exhibition -> getActive()}}</td>
                                <td>
                                    <a href="{{route('admin.exhibitions.edit',$exhibition -> id)}}" class="btn  btn-sm btn-bordered btn-warning waves-effect waves-light" title="تعديل">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.exhibitions.delete',$exhibition -> id)}}" class="btn btn-sm btn-bordered  btn-danger waves-effect waves-light" title="حذف">
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