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
        //$categories = $presenter->getActiveCategories()->toJson();
        $categories = $presenter->getActiveCategories();
        //return view('faq::site.index', compact('categories'));
        
        JavaScript::put([
           'categories' => $categories
        ]);
    
        return view('faq::site.index', compact('categories'));
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
