@extends('site.layouts.master')
@section('title')
الرئيسية
@endsection
@section('css')
<style>

</style>
@endsection

@section('content')
@include('site.includes.components.alert')

@include('site.includes.components.new_product')

@include('site.includes.components.top_selling')


@endsection

@section('js')


@endsection