<?php

namespace Ourgarage\Faq\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;

class FaqController extends Controller
{
    public function index(FaqPresenter $presenter)
    {
        $categories = $presenter->getAllActiveCategories();

        return view('faq::site.index', compact('categories'));
    }

    public function show(FaqPresenter $presenter, $slug)
    {
        $questionAnswer = $presenter->getBySlugQuestionAnswer($slug);

        return view('faq::site.qa', compact('questionAnswer'));
    }
}
