@extends('admin.layouts.master')
@section('title')
عرض الطلبية
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                            <h4 class="box-title"> رقم الطلبية :<span class="text-danger">{{$order->id}}</span></h4>
                        </div>
                        <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                            <h6 class="box-title"> كود الطلبية :<span class="text-danger">{{$order->code}}</span></h6>
                        </div>
                        <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4">
                            <h6 class="box-title">  طريقة الدفع :<span class="text-danger">{{$order->paid_methode}}</span></h6>
                        </div>
                        
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-size: 16px">رقم العميل : <span class="text-danger"> {{$order->user->id}}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-size: 16px">اسم العميل : <span class="text-danger"> {{$order->user->name}}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p style="font-size: 16px">البريد الالكتروني : <span class="text-danger"> {{$order->user->email}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <h6 class="box-title"> معلومات التوصيل</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p style="font-size: 16px">الولاية  : <span class="text-danger"> {{$order->state->name}}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p style="font-size: 16px">البلدية و الرمز البريدي : <span class="text-danger"> {{$order->commune .' - '. $order->code_postal}}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p style="font-size: 16px"> العنوان : <span class="text-danger"> {{$order->adresse}}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p style="font-size: 16px"> رقم الهاتف : <span class="text-danger"> {{$order->phone}}</span></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <p style="font-size: 16px">الملاحضة  : <span class="text-danger"> {{$order->note == null ? '/' : $order->note}}</span></p>
                            </div>
                        </div>
                    </div>
                    @include('admin.includes.alerts.alerts')
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> صورة الكتاب</th>
                                <th>  اسم الكتاب</th>
                                <th> الباركود</th>
                                <th>  الكمية</th>
                                <th> سعر الكتاب</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                           <?php $total = 0 ?> 
                            @isset($order_details)
                                @foreach($order_details as $key => $detail)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img width="100px" src="{{asset('assets/books/cover/'.$detail->book->cover)}}" alt=""></td>
                                        <td>{{$detail->book->title}}</td>
                                        <td>{{$detail->book->barcode}}</td>
                                        <td>{{$detail->price}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <?php $total = $total+ $detail->price ?> 
                                    </tr>
                                @endforeach
                            @endisset
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="font-weight:bold">المجموع : {{$total}}</th>
                                <th></th>

                            </tr>
                            <tr>
                                <th>#</th>
                                <th> صورة الكتاب</th>
                                <th>  اسم الكتاب</th>
                                <th> الباركود</th>
                                <th>  الكمية</th>
                                <th> سعر الكتاب</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>

                </div>
                <!-- /.box-content -->
            </div>

        </div>
@endsection

@section('js')

@endsection