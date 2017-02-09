<?php

namespace Ourgarage\Faq\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;
use JavaScript;

class FaqController extends Controller
{
    /**
     * Index page of FAQ
     *
     * @param FaqPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenter $presenter)
    {
        $categories = $presenter->getActiveCategories()->toJson();

        return view('faq::site.index', compact('categories'));
    
        //return view('faq::site.index');
    }
    
    /**
     * Get all data to Vue.js
     *
     * @param FaqPresenter $presenter
     * @return string
     */
    public function getCategoriesToJson(FaqPresenter $presenter)
    {
        return $presenter->getActiveCategories()->toJson();
    }
}
