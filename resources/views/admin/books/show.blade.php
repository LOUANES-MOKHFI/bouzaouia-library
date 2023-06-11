@extends('admin.layouts.master')
@section('title')
{{$book->title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.books')}}">الكتب</a>
                            </li>
                            <li class="breadcrumb-item active">{{$book->title}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body small-spacing">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="box-content">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">معلومات الكتاب    -   <span class="text-danger"> {{$book->title}} </span></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">العنوان : <span  class="text-danger" >{{$book->title}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">المؤلف : <span  class="text-danger" >{{$book->author}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">القسم : <span  class="text-danger" >{{$book->category->name}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">السعر : <span  class="text-danger" >{{$book->price}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">السعر بعد التخفيض : <span  class="text-danger" >{{$book->special_price_value}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">السنة : <span  class="text-danger" >{{$book->year}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">عدد الصفحات  : <span  class="text-danger" >{{$book->nbr_page}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الباركود : <span  class="text-danger" >{{$book->barcode}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">نوع التجليد : <span  class="text-danger" >{{$book->binding_type}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">عرقم الطبعة : <span  class="text-danger" >{{$book->edition_number}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">لون الطباعة : <span  class="text-danger" >{{$book->imprint_color}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الوزن : <span  class="text-danger" >{{$book->size}} سم</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الجم : <span  class="text-danger" >{{$book->weight}} كغ</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الحالة : <span  class="text-danger" >{{$book -> getActive()}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الفهرس : </p>
                                                    <a href="{{asset('assets/books/contents/'.$book->contents)}}" class="btn btn-info"><i class="fa fa-download"></i>  تحميل </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">الغلاف : </p>
                                                    <img src="{{asset('assets/books/cover/'.$book->cover)}}" width="150">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="projectinput1">  </label>
                                                    <p style="font-size: 16px">المحتوى : </p>
                                                    <a href="{{asset('assets/books/file/'.$book->file)}}" class="btn btn-info"><i class="fa fa-download"></i>  تحميل </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection

@section('js')
  <script>
        $('input:checkbox[name="special_price"]').change(
            function(){
                if(this.checked){
                    $('#special_price_value').removeClass('hidden');
                }
                else{
                    $('#special_price_value').addClass('hidden');
                }
            });
   </script>
@endsection