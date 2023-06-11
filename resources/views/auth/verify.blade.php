@extends('site.layouts.master')
@section('title')
تأكيد البريد الاكتروني
@endsection
@section('css')

@endsection
@section('content')
<div class="container"  style="direction:rtl">
    <div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تأكيد البريد الاكتروني</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                        </div>
                    @endif

                    قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.

                    إذا لم تستلم البريد الإلكتروني

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">انقر هنا لطلب آخر</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection

