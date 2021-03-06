@extends('site.main')

@section('body')
    <div class="container">
        <div id="faq" v-cloak>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ trans('faq::faq.front.index-head') }}</h3>
                </div>
                <div class="panel-body">

                    <input type="text" v-model="searchString" class="form-control"
                           placeholder="{{ trans('faq::faq.front.search-placeholder') }}"/>

                    <div v-for="category in filteredCategory" class="panel panel-default">
                        <div class="panel-heading">@{{ category.title }}</div>

                        <div class="panel-body">

                            <div v-for="faq in category.faq">

                                <ul>
                                    <li>
                                        <a v-bind:href="'#collapse' + faq.id" data-toggle="collapse"
                                           aria-expanded="false">
                                            @{{ faq.title }}
                                        </a>
                                    </li>
                                </ul>
                                <div v-bind:id="'collapse' + faq.id" class="collapse">
                                    <div v-html="faq.answer"></div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src='/libs/jquery/jquery.min.js'></script>
    <script src='/libs/bootstrap/js/bootstrap.min.js'></script>
    <script src="/libs/vue/vue.min.js"></script>
    <script src="/packages/faq/js/filter.js"></script>
@endsection
