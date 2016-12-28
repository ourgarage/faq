<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Notifications;
use Ourgarage\Faq\Http\Requests\FaqQuestionAnswerRequest;
use Ourgarage\Faq\DTO\FaqQuestionAnswerDTO;

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

    /**
     * Save created question-answer in database
     *
     * @param FaqQuestionAnswerRequest $request
     * @param FaqPresenter $presenter
     * @param null|int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FaqQuestionAnswerRequest $request, FaqPresenter $presenter, $id = null)
    {
        $dto = new FaqQuestionAnswerDTO();
        $dto->setId($id);
        $dto->setCategory($request->category);
        $dto->setTitle($request->title);
        $dto->setSlug($request->slug);
        $dto->setQuestion($request->question);
        $dto->setAnswer($request->answer);

        $presenter->createOrUpdateQuestionAnswer($dto);

        Notifications::success(trans('faq::faq.notifications.success.qa.create'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }

    /**
     * View form for edit question-answer
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqPresenter $presenter, $id)
    {
        $questionAnswer = $presenter->getByQuestionAnswer($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.edit'));

        return view('faq::admin.qa.qa', compact('questionAnswer'));
    }

    /**
     * Change status of question-answer
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @param int $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(FaqPresenter $presenter, $id, $status)
    {
        $presenter->updateStatusQuestionAnswer($id, $status);

        Notifications::success(trans('faq::faq.notifications.success.qa.status'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }

    public function destroy(FaqPresenter $presenter, $id)
    {
        $presenter->deleteQuestionAnswer($id);

        Notifications::success(trans('faq::faq.notifications.success.qa.delete'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }
}
