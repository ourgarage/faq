var listFaq = new Vue({
    el: '#faq',
    data: {
        searchString: "",
        categories: engin.categories
    },

    computed: {

        filteredCategory: function () {
            var categories_array = this.categories,
                searchString = this.searchString;

            if (!searchString) {
                return categories_array;
            }

            searchString = searchString.trim().toLowerCase();

            var faq_array = [];
            var result_array = [];

            $.each(categories_array, function (index, value) {
                $.each(value.faq, function (i, item) {
                    if (item.title.toLowerCase().indexOf(searchString) !== -1 || item.answer.toLowerCase().indexOf(searchString) !== -1) {
                        if (faq_array.indexOf(item) === -1) {
                            faq_array.push({
                                id: item.id,
                                title: item.title,
                                answer: item.answer
                            })
                        }
                    }
                });
            });

            result_array.push({
                title: engin.result_search,
                faq: faq_array
            });

            return result_array;
        }
    }
});
