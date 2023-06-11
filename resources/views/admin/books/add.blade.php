@extends('admin.layouts.master')
@section('title')
إضافة كتاب
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
                            <li class="breadcrumb-item active">إضافة كتاب
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
                                <h4 class="card-title" id="basic-layout-form"> ضافة كتاب </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <form class="form" action="{{route('admin.books.store')}}"
                                          method="POST"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان</label>
                                                        <input type="text" value="{{old('title')}}" id="title"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="title">
                                                        @error("title")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> المؤلف</label>
                                                        <input type="text" value="{{old('author')}}" id="author"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="author">
                                                        @error("author")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">القسم</label>
                                                        <select class="form-control" name="category" required>
                                                        	<option value="">اختر من الصائمة</option>
                                                        	@isset($categories)
                                                        	@foreach($categories as $key=> $category)
                                                        		<option value="{{$category->id}}">{{$category->name}}</option>
                                                        	@endforeach
                                                        	@endisset
                                                        </select>
                                                        @error("category")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
											</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> السنة</label>
                                                        <input type="text" value="{{old('year')}}" id="year"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="year">
                                                        @error("year")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الصفحات</label>
                                                        <input type="text" value="{{old('nbr_page')}}" id="nbr_page"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="nbr_page">
                                                        @error("nbr_page")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الباركود</label>
                                                        <input type="text" value="{{old('barcode')}}" id="barcode"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="barcode">
                                                        @error("barcode")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> السعر</label>
                                                        <input type="text" value="{{old('price')}}" id="price"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="price">
                                                        @error("price")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="projectinput1">تخفيض</label>

                                                        <div class="switch primary">
                                                                <input type="checkbox" value="1" id="switch-1" name="special_price">
                                                                <label for="switch-1">تخفيض</label>
                                                        </div>

                                                        @error("special_price")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group hidden" id="special_price_value">
                                                        <label for="projectinput1"> السعر بعد التخفيض</label>
                                                        <input type="text" value="{{old('special_price_value')}}"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="special_price_value">
                                                        @error("special_price_value")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> نوع التجليد</label>
                                                        <input type="text" value="{{old('binding_type')}}" id="binding_type"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="binding_type">
                                                        @error("binding_type")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الطبعة</label>
                                                        <input type="text" value="{{old('edition_number')}}" id="edition_number"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="edition_number">
                                                        @error("edition_number")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> لون الطباعة</label>
                                                        <input type="text" value="{{old('imprint_color')}}" id="imprint_color"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="imprint_color">
                                                        @error("imprint_color")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الوزن</label>
                                                        <input type="text" value="{{old('size')}}" id="size"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="size">
                                                        @error("size")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الجم</label>
                                                        <input type="text" value="{{old('weight')}}" id="weight"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="weight">
                                                        @error("weight")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="projectinput1">الحالة</label>

                                                        <div class="switch primary">
                                                                <input type="checkbox" value="1" checked id="switch-2" name="is_active">
                                                                <label for="switch-2">مفعل</label>
                                                        </div>

                                                        @error("is_active")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            	<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الفهرس</label>
                                                        <input type="file" value="{{old('contents')}}" id="contents"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="contents" reauired>
                                                        @error("contents")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الغلاف</label>
                                                        <input type="file" value="{{old('cover')}}" id="cover"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="cover" reauired>
                                                        @error("cover")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> المحتوى</label>
                                                        <input type="file" value="{{old('file')}}" id="file"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="file">
                                                        @error("file")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput2">النبذة</label>
                                                        <textarea id="tinymce" name="description" cols="90" rows="10"></textarea>
                                                        @error("description")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> عودة
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        directionality : 'rtl',  // change this value according to your HTML
        language: 'ar'
    });

</script>
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