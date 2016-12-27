@extends('admin.main')

@section('body-title')
    {{ trans('faq::faq.qa.title') }}

    <a href="{{ route('faq::admin::qa::create') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('faq::faq.button.create') }}
    </a>
@endsection

@section('body')
    <div class="faq-index">

        @if(!$questionsAnswers->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('faq::faq.qa.table.uri') }}</th>
                        <th>{{ trans('faq::faq.qa.table.title') }}</th>
                        <th>{{ trans('faq::faq.qa.table.created') }}</th>
                        <th>{{ trans('faq::faq.qa.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsAnswers as $questionAnswer)
                        <tr>
                            <th>{{ $questionAnswer->id }}</th>
                            <td><a href="#" target="_blank">{{ $questionAnswer->slug }}</a>
                            </td>
                            <td>{{ $questionAnswer->title }}</td>
                            <td>{{ df($questionAnswer->created_at) }}</td>
                            <td class="for-form-inline">
                                <form action="{{ route('faq::admin::qa::status', ['id' => $questionAnswer->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    @if($questionAnswer->status == \Ourgarage\faq\Models\QuestionAnswer::STATUS_ACTIVE)
                                        <input type="hidden" name="status"
                                               value="{{ \Ourgarage\faq\Models\QuestionAnswer::STATUS_DISABLED }}">
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.qa.popup.deactivate')"
                                                class="btn btn-xs btn-success" data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <input type="hidden" name="status"
                                               value="{{ \Ourgarage\faq\Models\QuestionAnswer::STATUS_ACTIVE }}">
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.qa.popup.activate')"
                                                class="btn btn-xs btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-power-off"></i>
                                        </button>
                                    @endif
                                </form>
                                <a href="{{ route('faq::admin::qa::edit', ['id' => $questionAnswer->id]) }}"
                                   class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('users.tooltip.edit') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action="{{ route('faq::admin::qa::destroy', ['id' => $questionAnswer->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            data-confirm="@lang('faq::faq.qa.popup.delete')"
                                            class="btn btn-xs btn-danger" data-toggle="tooltip"
                                            data-placement="top" title="{{ trans('users.tooltip.delete') }}">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $questionsAnswers->render() !!}
            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('faq::faq.qa.no-qa') }}</p>
            </div>
        @endif

    </div>
@endsection

@section('css')
    <link href="/packages/faq/css/faq.css" rel="stylesheet" type="text/css">
@endsection
