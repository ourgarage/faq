@extends('admin.main')

@section('body-title')
    {{ isset($faq) ? trans('faq::faq.qa.edit') : trans('faq::faq.qa.add') }}
@endsection

@section('body')
    <div class="faq-index">

        @if(!$categories->isEmpty())

            @include('admin.basis.notifications-page')

            <div class="faq-box-body">
                <form class="form-horizontal"
                      action="{{ isset($faq)
                  ? route('faq::admin::qa::store', ['id' => $faq->id])
                  : route('faq::admin::qa::store') }}" method="POST">

                    @if(isset($faq))
                        {{ method_field('PUT') }}
                    @endif

                    {!! csrf_field() !!}

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.title') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control"
                                   value="{{ isset($faq) ? old('title', $faq->title) : old('title') }}">
                            <span class="glyphicon glyphicon-header form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.uri') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="slug" class="form-control"
                                   value="{{ isset($faq) ? old('slug', $faq->slug) : old('slug') }}">
                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.category') }} : *</label>
                        <div class="col-md-8">
                            <select name="category" class="form-control">
                                <option value="">{{ trans('faq::faq.qa.table.select-category') }}</option>
                                @foreach($categories as $category)
                                    @if(isset($faq))
                                        <option value="{{ $category->id }}"
                                                {{ old('category', $faq->faq_category_id) == $category->id ? 'selected' : ''}}>
                                            {{ $category->title }}
                                        </option>
                                    @else
                                        <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : ''}}>
                                            {{ $category->title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h4>{{ trans('faq::faq.qa.content') }} : </h4>

                    <div class="form-group has-feedback">
                        <div class="col-md-10">
                            <textarea id="answer" name="answer" class="form-control" rows="15">
                                {{ isset($faq) ? old('answer', $faq->answer) : old('answer') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-flat">
                                {{ isset($faq)
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
        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('faq::faq.category.no-categories') }}</p>
                <p>{{ trans('faq::faq.qa.must-category') }}</p>
                <a href="{{ route('faq::admin::categories::create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('faq::faq.button.create') }}
                </a>
            </div>
        @endif
    </div>
@endsection

@section('css')
    <link href='/packages/faq/css/faq.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
    @inject('connect', 'App\Http\ViewConnectors\EditorConnector')
    {!! $connect->connect('#answer', App::getLocale(), null, App\Http\ViewConnectors\EditorConnector::MODE_FULL, true) !!}
@endsection
