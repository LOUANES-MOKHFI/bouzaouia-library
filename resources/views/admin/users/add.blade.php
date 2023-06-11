@extends('admin.layouts.master')

@section('title')
أضف مستخدم
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
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}"> المستخدمين  </a>
                            </li>
                            <li class="breadcrumb-item active">أضف مستخدم
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
                                <h4 class="card-title" id="basic-layout-form">  أضف مستخدم </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <form class="form" action="{{route('admin.users.store')}}"
                                          method="POST"
                                          enctype='multipart/form-data'>
                                        @csrf

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i>معلومات المستخدم </h4>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> افسم و اللقب</label>
                                                        <input type="text" value="{{old('name')}}" id="name"
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
                                                        <label for="projectinput1">البريد الالكتروني</label>
                                                        <input type="email" id="abbr"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('email')}}"
                                                               name="email">

                                                        @error("email")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الدور</label>
                                                        <select class="form-control select2" id="role" name="role_id">
                                                            <optgroup label=" {{__('admin/users.choserole')}}">
                                                            @if($roles && $roles->count()>0)
                                                                @foreach($roles as $role)
                                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>

                                                        @error("role_id")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                    <label for="projectinput1">كلمة السر</label>
                                                    <input type="password" id="abbr"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value=""
                                                               name="password">

                                                        @error("password")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                    <label for="projectinput1">تأكيد كلمة السر</label>
                                                    <input name="password_confirmation" type="password"
                                                               class="form-control"
                                                               placeholder="  ">
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





