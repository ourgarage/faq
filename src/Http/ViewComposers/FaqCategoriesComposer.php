<?php

namespace Ourgarage\Faq\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Ourgarage\Faq\Models\Category;

class FaqCategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();

        $view->with(['categories' => $categories]);
    }
}
