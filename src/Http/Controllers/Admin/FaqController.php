<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Notifications;
use Ourgarage\Faq\Http\Requests\FaqRequest;
use Ourgarage\Faq\DTO\FaqDTO;

class FaqController extends Controller
{
    /**
     * Get all questions & answers
     *
     * @param FaqPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenter $presenter)
    {
        $faqs = $presenter->getAllFaqs();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.title'));

        return view('faq::admin.qa.index', compact('faqs'));
    }

    /**
     * View form for create new Faq
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
     * Save created Faq in database
     *
     * @param FaqRequest $request
     * @param FaqPresenter $presenter
     * @param null|int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FaqRequest $request, FaqPresenter $presenter, $id = null)
    {
        $dto = new FaqDTO();
        $dto->setId($id);
        $dto->setCategory($request->category);
        $dto->setTitle($request->title);
        $dto->setSlug($request->slug);
        $dto->setAnswer($request->answer);

        $presenter->createOrUpdateFaq($dto);

        Notifications::success(trans('faq::faq.notifications.success.qa.create'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }

    /**
     * View form for edit Faq
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqPresenter $presenter, $id)
    {
        $faq = $presenter->getByFaq($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.qa.edit'));

        return view('faq::admin.qa.qa', compact('faq'));
    }

    /**
     * Change status of Faq
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @param int $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(FaqPresenter $presenter, $id, $status)
    {
        $presenter->updateStatusFaq($id, $status);

        Notifications::success(trans('faq::faq.notifications.success.qa.status'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }

    public function destroy(FaqPresenter $presenter, $id)
    {
        $presenter->deleteFaq($id);

        Notifications::success(trans('faq::faq.notifications.success.qa.delete'), 'top');

        return redirect()->route('faq::admin::qa::index');
    }
}
