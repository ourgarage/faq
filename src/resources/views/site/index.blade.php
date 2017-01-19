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
                            @if(!$category->questionsAnswers->isEmpty())
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapse{{ $category->id }}"
                                               aria-expanded="true"
                                               aria-controls="collapse{{ $category->id }}">
                                                {{ $category->title }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $category->id }}" class="panel-collapse collapse"
                                         role="tabpanel"
                                         aria-labelledby="heading{{ $category->id }}">
                                        <div class="panel-body">
                                            @foreach($category->questionsAnswers as $questionAnswer)
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('faq::front::qa', ['slug' => $questionAnswer->slug]) }}">
                                                            {{ $questionAnswer->title }}</a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    {{ trans('faq::faq.front.no-qa') }}
                @endif

            </div>
        </div>
    </div>
@endsection
