@extends('admin.layouts.master')
@section('title')
الصلاحيات
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <h4 class="box-title">الصلاحيات</h4>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <a href="{{route('admin.roles.create')}}" class="box-title btn btn-primary float-right">
                        <i class="fa fa-plus-circle"></i> أضف دور</a>
                </div>
            </div>
            @include('admin.includes.alerts.alerts')
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم الدور</th>
                            <th width="400">الصلاحيات </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>#</th>
                            <th>إسم الدور</th>
                            <th width="400">الصلاحيات </th>
                            <th>العمليات</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @isset($roles)
                        @foreach($roles as $key=>$role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role -> name}}</td>
                                <td>
                                @foreach($role->permissions as $permission)
                                    {{$permission}},
                                @endforeach
                                </td>

                                <td>

                                        <a href="{{route('admin.roles.edit',$role -> uuid)}}" class="btn btn-sm btn-bordered btn-warning waves-effect waves-light"
                                        title="{{__('admin/patients.edit')}}"><i class="fa fa-edit"></i></a>


                                        <a href="{{route('admin.roles.delete',$role -> uuid)}}" class="btn btn-sm btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/patients.delete')}}">
                                    <i class="fa fa-trash"></i></a>

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


