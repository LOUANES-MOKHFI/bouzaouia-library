@extends('admin.layouts.master')
@section('title')
تعديل ولاية
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
                            <li class="breadcrumb-item"><a href="">Accueil </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.states')}}"> الولايات  </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل ولاية
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
                                <h4 class="card-title" id="basic-layout-form">  تعديل ولاية </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <form class="form" action="{{route('admin.states.update',$state->id)}}"
                                          method="POST"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        <input name="id" value="{{$state -> id}}" type="hidden">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">اسم الولاية</label>
                                                        <input type="text" value="{{$state->name}}" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="name">
                                                        @error("name")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الرمز البريدي</label>
                                                        <input type="text" value="{{$state->code_postal}}" id="code_postal"
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="code_postal">
                                                        @error("code_postal")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">السعر</label>
                                                        <input type="text" value="{{$state->price}}" id="price"
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="price">
                                                        @error("price")
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
                                                <i class="la la-check-square-o"></i>حفظ
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