@extends('admin.layouts.master')
@section('title')
المستخدمين
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"> المستخدمين</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.users.create')}}" class="box-title btn btn-primary"><i class="fa fa-plus-circle"></i> أضف مستخدم</a>
                        </div>
                    </div>
                    @include('admin.includes.alerts.alerts')
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>افسم و اللقب</th>
                                <th>البريد افلكتروني </th>
                                <th>الدور</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>افسم و اللقب</th>
                                <th>البريد افلكتروني </th>
                                <th>الدور</th>
                                <th>العمليات</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($users)
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>@isset($user->role){{$user ->role->name}}@endisset</td>

                                        <td>
                                            <a href="{{route('admin.users.edit',$user -> uuid)}}"
                                                class="btn btn-warning btn-sm btn-bordered waves-effect waves-light"title="تعديل">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.users.delete',$user -> uuid)}}"
                                                class="btn btn-danger btn-sm btn-bordered waves-effect waves-light"title="حذف">
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