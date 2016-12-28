@extends('admin.main')

@section('body-title')
    {{ trans('faq::faq.category.title') }}

    <a href="{{ route('faq::admin::categories::create') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('faq::faq.button.create') }}
    </a>
@endsection

@section('body')
    <div class="faq-index">

        @if(!$categories->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('faq::faq.category.table.uri') }}</th>
                        <th>{{ trans('faq::faq.category.table.title') }}</th>
                        <th>{{ trans('faq::faq.category.table.created') }}</th>
                        <th>{{ trans('faq::faq.category.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td><a href="#" target="_blank">{{ $category->slug }}</a>
                            </td>
                            <td>{{ $category->title }}</td>
                            <td>{{ df($category->created_at) }}</td>
                            <td class="for-form-inline">
                                <form action="{{ route('faq::admin::categories::changeStatus', ['id' => $category->id,
                                    'status' => $category->status == \Ourgarage\faq\Models\Category::STATUS_ACTIVE
                                    ? \Ourgarage\faq\Models\Category::STATUS_DISABLED
                                    : \Ourgarage\faq\Models\Category::STATUS_ACTIVE
                                ]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    @if($category->status == \Ourgarage\faq\Models\Category::STATUS_ACTIVE)
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.category.popup.deactivate')"
                                                class="btn btn-xs btn-success" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <button type="submit"
                                                data-confirm="@lang('faq::faq.category.popup.activate')"
                                                class="btn btn-xs btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-power-off"></i>
                                        </button>
                                    @endif
                                </form>
                                <a href="{{ route('faq::admin::categories::edit', ['id' => $category->id]) }}"
                                   class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('users.tooltip.edit') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action="{{ route('faq::admin::categories::destroy', ['id' => $category->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            data-confirm="@lang('faq::faq.category.popup.delete')"
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

            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('faq::faq.category.no-categories') }}</p>
            </div>
        @endif

    </div>
@endsection

@section('css')
    <link href="/packages/faq/css/faq.css" rel="stylesheet" type="text/css">
@endsection
