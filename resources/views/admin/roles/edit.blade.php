@extends('admin.layouts.master')
@section('title')
تعديل دور
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
                            <li class="breadcrumb-item"><a href=""> الصلاحيات</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل دور - {{$role -> name}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="box-content">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">تعديل دور </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form"
                                          action="{{route('admin.roles.update',$role -> uuid)}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input name="id" value="{{$role -> id}}" type="hidden">
                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i>معلومات الدور </h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">اسم الدور</label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$role -> name}}"
                                                               name="name">
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="row">
                                                        @foreach(Config('roles.permissions') as $name=> $value)
                                                        <div class="form-group col-sm-4">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="chk-box" name="permissions[]" value="{{$name}}" {{in_array($name, $role->permissions)? 'checked' : ''}}> {{$value}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                        @error('permissions.0')
                                                           <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> عودة
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفض
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