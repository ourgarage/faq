@extends('admin.main')

@section('body-title')
    {{ isset($category) ? trans('faq::faq.category.edit') : trans('faq::faq.category.add') }}
@endsection

@section('body')
    <div class="faq-index">

        @include('admin.basis.notifications-page')

        <div class="faq-box-body">
            <form class="form-horizontal"
                  action="{{ isset($category)
                  ? route('faq::admin::categories::store', ['id' => $category->id])
                  : route('faq::admin::categories::store') }}" method="POST">

                @if(isset($category))
                    {{ method_field('PUT') }}
                @endif

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('faq::faq.category.table.title') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               value="{{ isset($category) ? old('title', $category->title) : old('title') }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('faq::faq.category.table.uri') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               value="{{ isset($category) ? old('slug', $category->slug) : old('slug') }}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-flat">
                            {{ isset($category)
                            ? trans('faq::faq.button.save')
                            : trans('faq::faq.button.create') }}
                        </button>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        <a href="{{ url()->previous() }}" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i> {{ trans('faq::faq.button.back') }}
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('css')
    <link href='/packages/faq/css/faq.css' rel='stylesheet' type='text/css'>
@endsection

