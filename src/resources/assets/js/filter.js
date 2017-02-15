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

            var new_array = [];

            $.each(categories_array, function (index, value) {
                $.each(value.faq, function (i, item) {
                    if (item.title.toLowerCase().indexOf(searchString) !== -1 || item.answer.toLowerCase().indexOf(searchString) !== -1) {
                        if (new_array.indexOf(value) === -1) {
                            new_array.push(value);
                        }
                    }
                });
            });

            return new_array;
        }
    }
});
