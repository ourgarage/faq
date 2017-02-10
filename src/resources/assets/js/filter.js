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

            categories_array = categories_array.filter(function (item) {
                if (item.title.toLowerCase().indexOf(searchString) !== -1) {
                    return item;
                }
            });

            return categories_array;
        }
    }
});
