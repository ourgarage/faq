@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ $faq->title }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <strong>{{ trans('faq::faq.front.answer') }}:</strong>
                    </div>
                    <div class="col-md-10">
                        {!! $faq->answer !!}
                    </div>
                </div>
                <a href="{{ route('faq::front::index') }}" class="btn btn-default">{{ trans('faq::faq.front.back') }}</a>
            </div>
        </div>
    </div>
@endsection
