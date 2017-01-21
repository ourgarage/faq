@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans('faq::faq.front.index-head') }}</h3>
            </div>
            <div class="panel-body">
                @if(!$categories->isEmpty())
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($categories as $category)
                            @include('faq::site.index-qa', ['$category' => $category])
                        @endforeach
                    </div>
                @else
                    {{ trans('faq::faq.front.no-qa') }}
                @endif
            </div>
        </div>
    </div>
@endsection
