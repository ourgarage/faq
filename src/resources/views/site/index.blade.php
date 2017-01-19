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
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse{{ $category->id }}">
                                                {{ $category->title }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $category->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">

                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $category->title }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            @foreach($category->questionsAnswers as $questionAnswer)
                                                <ul>
                                                    <li>{{ $questionAnswer->title }}</li>
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
