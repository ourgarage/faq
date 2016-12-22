<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Notifications;
use Ourgarage\Faq\Http\Requests\FaqQuestionAnswerRequest;

class FaqQAController extends Controller
{
    /**
     * Get all questions & answers
     *
     * @param FaqPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenter $presenter)
    {
        $questionsAnswers = $presenter->getAllQuestionsAnswers();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.title'));

        return view('faq::admin.qa.index', compact('questionsAnswers'));
    }

    /**
     * View form for create new question-answer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.add'));

        return view('faq::admin.qa.qa');
    }

    public function store(FaqQuestionAnswerRequest $request, FaqPresenter $presenter, $id = null)
    {

    }
}
