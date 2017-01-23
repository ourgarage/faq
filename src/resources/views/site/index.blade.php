@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans('faq::faq.front.index-head') }}</h3>
            </div>
            <div class="panel-body">
                @if(!$categories->isEmpty())
                    @foreach($categories as $category)
                        @if(!$category->faq->isEmpty())
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $category->title }}</div>
                                <div class="panel-body">
                                    @include('faq::site._qa-category', ['$category' => $category])
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    {{ trans('faq::faq.front.no-qa') }}
                @endif
            </div>
        </div>
    </div>
@endsection
