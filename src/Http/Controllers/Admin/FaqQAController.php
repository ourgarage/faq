<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Notifications;

class FaqQAController extends Controller
{
    public function index(FaqPresenter $presenter)
    {
        $questionsAnswers = $presenter->getAllQuestionsAnswers();

        return view('faq::admin.qa.');
    }
}
