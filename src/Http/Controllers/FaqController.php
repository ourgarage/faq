<?php

namespace Ourgarage\Faq\Http\Controllers;

use App\Http\Controllers\Controller;
use JavaScript;
use Ourgarage\Faq\Presenters\FaqPresenter;

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
        $categories = $presenter->getActiveCategories();
        
        JavaScript::put([
            'categories' => $categories,
            'result_search' => trans('faq::faq.front.searching')
        ]);
        
        return view('faq::site.index');
    }
}
