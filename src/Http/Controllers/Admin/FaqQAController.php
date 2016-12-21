<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenters;
use Notifications;

class FaqQAController extends Controller
{
    /**
     * Get all QA
     *
     * @param FaqPresenters $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenters $presenter)
    {
        $questionsAnswers = $presenter->getAllQuestionsAnswers();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.title'));

        return view('faq::admin.qa.index', compact('questionsAnswers'));
    }

    public function create()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.add'));

        return view('faq::admin.qa.qa');
    }
}
