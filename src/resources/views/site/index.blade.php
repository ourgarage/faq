@extends('site.main')

@section('body')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans('faq::faq.front.index-head') }}</h3>
            </div>
            <div id="faq-list" class="panel-body">
                @if(!empty($categories))

                    <div v-for="category in categories" class="panel panel-default">
                        <div class="panel-heading">@{{ category.title }} - @{{ category.id }}</div>

                        <div class="panel-body">

                            <div v-for="faq in category.faq">

                                <ul>
                                    <li>
                                        <a href="#@{{ faq.id }}" data-toggle="collapse" aria-expanded="false"
                                           aria-controls="">
                                            @{{ faq.title }} - @{{ faq.id }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="collapse">
                                    <div class="well">
                                        @{{ faq.answer }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

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

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    {{----}}<script src='/libs/jquery/jquery.min.js'></script>
    <script src='/libs/bootstrap/js/bootstrap.min.js'></script>
    <script src="/libs/vue/vue.min.js"></script>
    <script src="/packages/faq/js/filter.js"></script>
    <script>
        var listFaq = new Vue({
            el: '#faq-list',
            data: {
                categories: {!! $categories !!}
            }
        })
    </script>
@endsection
