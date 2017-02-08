<?php

namespace Ourgarage\Faq\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;

class FaqController extends Controller
{
    /**
     * Index page of FAQ. Get all categories
     *
     * @param FaqPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenter $presenter)
    {
        $categories = $presenter->getActiveCategories()->toJson();

        return view('faq::site.index', compact('categories'));
    }
}
