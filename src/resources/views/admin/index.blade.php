@extends('admin.main')

@section('css')
    <link href='/packages/faq/css/faq.css' rel='stylesheet' type='text/css'>
@endsection

@section('body-title')
    {{ trans('faq::faq.index.title') }}
@endsection

@section('body')
    <div class="faq-index">

    </div>
@endsection
