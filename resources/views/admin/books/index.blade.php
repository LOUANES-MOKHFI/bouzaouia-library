@extends('admin.layouts.master')
@section('title')
الكتب
@endsection

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <h4 class="box-title">قائمة الكتب</h4>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                    <a href="{{route('admin.books.create')}}"
                    class="box-title btn btn-primary float-right">
                    <i class="fa fa-plus-circle"></i> أضف كتاب</a>
                </div>
            </div>
            @include('admin.includes.alerts.alerts')
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الغلاف</th>
                            <th>العنوان</th>
                            <th>المؤلف</th>
                            <th>السعر</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>الغلاف</th>
                            <th>العنوان</th>
                            <th>المؤلف</th>
                            <th>السعر</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @isset($books)
                        @foreach($books as $key=>$book)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset('assets/books/cover/'.$book->cover)}}" width="100" style="height:130px"></td>
                                <td>{{$book -> title}}</td>
                                <td>{{$book -> author}}</td>
                                <td>{{$book -> price}}</br>
                                	@if($book->special_price == 1) <span class="text-danger">{{$book->special_price_value}}</span>@endif
                                </td>
                                <td>{{$book -> getActive()}}</td>
                                <td>
                                	<a href="{{route('admin.books.changeStatus',$book -> uuid)}}" class="btn btn-sm btn-bordered @if($book->is_active == 1) btn-primary @else btn-successتفعيل  @endif waves-effect" title="تعديل">
                                        @if($book->is_active == 1) تعطيل  @else تفعيل @endif
                                    </a>

                                    <a href="{{route('admin.books.show',$book -> uuid)}}" class="btn btn-sm btn-bordered btn-primary waves-effect" title="استضهار الكتاب">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.books.edit',$book -> uuid)}}" class="btn  btn-sm btn-bordered btn-warning waves-effect waves-light" title="تعديل">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.books.delete',$book -> uuid)}}" class="btn btn-sm btn-bordered  btn-danger waves-effect waves-light" title="حذف">
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