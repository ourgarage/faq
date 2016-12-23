@extends('admin.main')

@section('body-title')
    {{ isset($questionAnswer) ? trans('faq::faq.qa.edit') : trans('faq::faq.qa.add') }}
@endsection

@section('body')
    <div class="faq-index">

        @if(!$categories->isEmpty())

            @include('admin.basis.notifications-page')

            <div class="faq-box-body">
                <form class="form-horizontal"
                      action="{{ isset($questionAnswer)
                  ? route('faq::admin::qa::store', ['id' => $questionAnswer->id])
                  : route('faq::admin::qa::store') }}" method="POST">

                    @if(isset($questionAnswer))
                        {{ method_field('PUT') }}
                    @endif

                    {!! csrf_field() !!}

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.title') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control"
                                   value="{{ isset($questionAnswer) ? old('title', $questionAnswer->title) : old('title') }}">
                            <span class="glyphicon glyphicon-header form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.uri') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="slug" class="form-control"
                                   value="{{ isset($questionAnswer) ? old('slug', $questionAnswer->slug) : old('slug') }}">
                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.category') }} : *</label>
                        <div class="col-md-8">
                            <select name="category" class="form-control">
                                <option value="">{{ trans('faq::faq.qa.table.select-category') }}</option>
                                @foreach($categories as $category)
                                    @if(isset($questionAnswer))
                                        <option value="{{ $category->id }}"
                                                {{ old('category', $questionAnswer->faq_category_id) == $category->id ? 'selected' : ''}}>
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

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.question') }} : *</label>
                        <div class="col-md-8">
                            <textarea name="question" class="form-control">
                                {{ isset($questionAnswer) ? old('question', $questionAnswer->question) : old('question') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('faq::faq.qa.table.answer') }} : *</label>
                        <div class="col-md-8">
                            <textarea name="answer" class="form-control">
                                {{ isset($questionAnswer) ? old('answer', $questionAnswer->answer) : old('answer') }}
                            </textarea>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-primary btn-flat">{{ isset($questionAnswer)
                        ? trans('faq::faq.button.save')
                        : trans('faq::faq.button.create') }}</button>
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
