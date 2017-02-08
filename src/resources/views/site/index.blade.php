@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans('faq::faq.front.index-head') }}</h3>
            </div>
            <div class="panel-body">
                @if(!$categories->isEmpty())

                    <form id="main" v-cloak>

                        <div class="bar">
                            <input type="text" v-model="searchString" placeholder="Enter your search terms"/>
                        </div>

                        <ul>
                            <li v-for="i in articles | searchFor searchString">
                                <a v-bind:href="i.url"><img v-bind:src="i.image"/></a>
                                <p>@{{i.title}}</p>
                            </li>
                        </ul>
                    </form>

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

@section('js')
    <script src='/libs/jquery/jquery.min.js'></script>
    <script src='/libs/bootstrap/js/bootstrap.min.js'></script>
    <script src="/libs/vue/vue.min.js"></script>
    <script src="/packages/faq/js/filter.js"></script>
@endsection
