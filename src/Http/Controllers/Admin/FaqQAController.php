<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Models\QuestionAnswer;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Notifications;

class FaqQAController extends Controller
{
    public function index(FaqPresenter $presenter)
    {
        $questionsAnswers = $presenter->getAllQuestionsAnswers();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.title'));

        return view('faq::admin.qa.index', compact('questionsAnswers'));
    }
}
