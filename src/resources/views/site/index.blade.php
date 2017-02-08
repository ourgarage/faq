@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans('faq::faq.front.index-head') }}</h3>
            </div>
            <div class="panel-body">
                @if(!empty($categories))

                    <ul id="example-1">
                        <li v-for="(i, pr) in items">
                            @{{ i.faq }}
                        </li>
                    </ul>
                {{-- dd($categories) }}
                    {{--@foreach($categories as $category)
                        @if(!$category->faq->isEmpty())
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $category->title }}</div>
                                <div class="panel-body">
                                    @include('faq::site._qa-category', ['$category' => $category])
                                </div>
                            </div>
                        @endif
                    @endforeach--}}

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
    <script>
        var example1 = new Vue({
            el: '#example-1',
            data: {
                items: {!! $categories !!}
            }
        })
    </script>
@endsection
