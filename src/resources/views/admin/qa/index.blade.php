@extends('admin.main')

@section('body-title')
    {{ trans('faq::faq.qa.title') }}

    <a href="{{ route('faq::admin::qa::create') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('faq::faq.button.create') }}
    </a>
@endsection

@section('body')
    <div class="faq-index">

        @if(!$faqs->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('faq::faq.qa.table.title') }}</th>
                        <th>{{ trans('faq::faq.qa.table.category') }}</th>
                        <th>{{ trans('faq::faq.qa.table.created') }}</th>
                        <th>{{ trans('faq::faq.qa.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <th>{{ $faq->id }}</th>
                            <td>{{ $faq->title }}</td>
                            <td>{{ $faq->category->title }}</td>
                            <td>{{ df($faq->created_at) }}</td>
                            <td class="for-form-inline">
                                <form action="{{ route('faq::admin::qa::changeStatus', ['id' => $faq->id,
                                    'status' => $faq->status == \Ourgarage\Faq\Models\Faq::STATUS_ACTIVE
                                    ? \Ourgarage\Faq\Models\Faq::STATUS_DISABLED
                                    : \Ourgarage\Faq\Models\Faq::STATUS_ACTIVE
                                ]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    @if($faq->status == \Ourgarage\Faq\Models\Faq::STATUS_ACTIVE)
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.qa.popup.deactivate')"
                                                class="btn btn-xs btn-success" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.qa.popup.activate')"
                                                class="btn btn-xs btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-power-off"></i>
                                        </button>
                                    @endif
                                </form>
                                <a href="{{ route('faq::admin::qa::edit', ['id' => $faq->id]) }}"
                                   class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('users.tooltip.edit') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action="{{ route('faq::admin::qa::destroy', ['id' => $faq->id]) }}"
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
                {!! $faqs->render() !!}
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
