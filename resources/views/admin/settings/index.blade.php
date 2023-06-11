@extends('admin.layouts.master')
@section('title')
الإعدادات
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
                            <li class="breadcrumb-item active">الإعدادات
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
                                <h4 class="card-title" id="basic-layout-form"> الإعدادات </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                	@include('admin.includes.alerts.alerts')
                                    <form class="form" action="{{route('admin.settings.update')}}"
                                          method="POST"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم الموقع</label>
                                                        <input type="text" value="{{$setting->site_name}}" id="site_name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="site_name">
                                                        @error("site_name")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> البريد الالكتروني</label>
                                                        <input type="text" value="{{$setting->email}}" id="email"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="email">
                                                        @error("email")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الهاتف</label>
                                                        <input type="text" value="{{$setting->phone}}" id="phone"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="phone">
                                                        @error("phone")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الفاكس</label>
                                                        <input type="text" value="{{$setting->fax}}" id="phone"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="fax">
                                                        @error("fax")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
											</div>
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">صفحة الفايسبوك</label>
                                                        <input type="text" value="{{$setting->facebook}}" id="facebook"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="facebook">
                                                        @error("facebook")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">صفحة الانستغرام</label>
                                                        <input type="text" value="{{$setting->instagram}}" id="instagram"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="instagram">
                                                        @error("instagram")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الينكد إن</label>
                                                        <input type="text" value="{{$setting->linkedin}}" id="linkedin"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="linkedin">
                                                        @error("linkedin")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان</label>
                                                        <input type="text" value="{{$setting->adresse}}" id="linkedin"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="adresse">
                                                        @error("adresse")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">اللوغو</label>
                                                        <input type="file" id="logo"
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="logo">
                                                        @error("logo")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @isset($setting)
                                                @if($setting->logo != null)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <img src="{{asset('assets/books/logo/'.$setting->logo)}}" width="120">
                                                    </div>
                                                </div>
                                                @endif
                                                @endisset

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> نبذة قصيرة عن الدار</label>
                                                        <textarea id="" class="form-control" name="slegon" cols="90" rows="10">{!! html_entity_decode($setting->slegon) !!}</textarea>
                                                        @error("slegon")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">عن الدار</label>
                                                        <textarea id="tinymce" name="about" cols="90" rows="10">{!! html_entity_decode($setting->about) !!}</textarea>
                                                        @error("about")
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

@endsection