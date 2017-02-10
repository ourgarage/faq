@extends('site.main')

@section('body')
    <div class="container">
        <div id="faq" v-cloak>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ trans('faq::faq.front.index-head') }}</h3>
                </div>
                <div class="panel-body">

                    <input type="text" v-model="searchString" class="form-control"/>

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

    {{-- @include('site.footer') --}}
@endsection

@section('js')
    <script src='/libs/jquery/jquery.min.js'></script>
    <script src='/libs/bootstrap/js/bootstrap.min.js'></script>
    <script src="/libs/vue/vue.min.js"></script>
    {{--<script src="/packages/faq/js/filter.js"></script>--}}
    <script>
        Vue.config.debug = true;
        var apiURL = '/faq/get-data';

        var listFaq = new Vue({
                el: '#faq',

                data: {
                    searchString: "",
                    categories: {}
                },

                created: function () {
                    this.fetchData()
                },

                methods: {
                    /*fetchData: function () {
                        var xhr = new XMLHttpRequest();
                        var self = this;
                        xhr.open('GET', apiURL);
                        xhr.onload = function () {
                            self.categories = xhr.responseText;
                            alert(self.categories);
                            self.$set(self.categories, xhr.responseText);
                        };

                        //alert(JSON.stringify(self.categories));

                        xhr.send();
                    }*/
                     fetchData: function () {
                        var self = this;
                        $.get(apiURL, function (data) {
                            //this.categories = data;
                            alert(data);
                            self.$set(self.categories, data);
                        })
                    }
                },

                computed: {

                    filteredCategory: function () {
                        var categories_array = this.categories,
                            searchString = this.searchString;

                        if (!searchString) {
                            return categories_array;
                        }

                        searchString = searchString.trim().toLowerCase();

                        categories_array = categories_array.filter(function (item) {
                            if (item.title.toLowerCase().indexOf(searchString) !== -1) {
                                return item;
                            }
                        });

                        return categories_array;
                    }
                }
            });
    </script>
@endsection
