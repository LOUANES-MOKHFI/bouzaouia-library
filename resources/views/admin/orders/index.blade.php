@extends('admin.layouts.master')
@section('title')
الطلبيات
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"> الطلبيات</h4>
                        </div>
                    </div>
                    @include('admin.includes.alerts.alerts')
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>كود الطلبية</th>
                                <th>تاريخ الطلبية</th>
                                <th>طريقة الدفع</th>
                                <th>حالة الطلبية</th>
                                <th> العميل</th>
                                <th> الولاية</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>كود الطلبية</th>
                                <th>تاريخ الطلبية</th>
                                <th>طريقة الدفع</th>
                                <th>حالة الطلبية</th>
                                <th> العميل</th>
                                <th> الولاية</th>
                                <th>العمليات</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($orders)
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$order -> code}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->paid_methode}}</td>
                                        <td>
                                            @if($order->status == 0)
                                                <span class="text-danger">طلبية جديدة</span>
                                            @else
                                                <span class="text-success">طلبية مؤكدة</span>
                                            @endif
                                        </td>
                                        <td>{{$order->user->name}}<br>{{$order->user->email}}</td>
                                        <td>{{$order->state->name}}</td>

                                        <td>
                                            <a href="{{route('admin.orders.details',$order -> id)}}"
                                                class="btn btn-info btn-sm btn-bordered waves-effect waves-light"title="عرض">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if($order->status == 0)
                                            <a href="{{route('admin.orders.change_status',$order -> id)}}"
                                                class="btn btn-success btn-sm btn-bordered waves-effect waves-light">
                                                تأكيد الطلبية
                                            </a>
                                            @endif
                                            

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