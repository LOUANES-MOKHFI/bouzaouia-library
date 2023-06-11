@extends('admin.layouts.master')
@section('title')
تعديل معرض
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
                            <li class="breadcrumb-item"><a href="{{route('admin.exhibitions')}}">الأقسام </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل معرض
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
                                <h4 class="card-title" id="basic-layout-form">  تعديل معرض </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <form class="form" action="{{route('admin.exhibitions.update',$exhibition->id)}}"
                                          method="POST"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">اسم المعرض</label>
                                                        <input type="text" value="{{$exhibition->title}}" id="title"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="title">
                                                        @error("title")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="projectinput1">الحالة</label>

                                                        <div class="switch primary">
                                                                <input type="checkbox" value="1" {{$exhibition->is_active == 1 ? 'checked' : ''}} id="switch-2" name="is_active">
                                                                <label for="switch-2">مفعل</label>
                                                        </div>

                                                        @error("is_active")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الدولة</label>
                                                        <input type="text" value="{{$exhibition->pays}}" id="pays"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="pays">
                                                        @error("pays")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الولاية </label>
                                                        <input type="text" value="{{$exhibition->state}}" id="state"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="state">
                                                        @error("state")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">من تاريخ </label>
                                                        <input type="date" value="{{$exhibition->date_from}}" id="date_from"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="date_from">
                                                        @error("date_from")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">إلى تاريخ </label>
                                                        <input type="date" value="{{$exhibition->date_to}}" id="date_to"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="date_to">
                                                        @error("date_to")
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

@endsection