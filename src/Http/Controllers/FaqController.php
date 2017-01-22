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
        $categories = $presenter->getActiveCategories();

        return view('faq::site.index', compact('categories'));
    }

    /**
     * Get question-answer by slug
     *
     * @param FaqPresenter $presenter
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(FaqPresenter $presenter, $slug)
    {
        $questionAnswer = $presenter->getQuestionAnswerBySlug($slug);

        return view('faq::site.qa', compact('questionAnswer'));
    }
}
