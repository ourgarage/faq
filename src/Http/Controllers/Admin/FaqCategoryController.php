<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Notifications;
use Ourgarage\Faq\Http\Requests\FaqCategoryRequest;
use Ourgarage\Faq\Presenters\FaqPresenter;
use Ourgarage\Faq\DTO\FaqCategoryDTO;

class FaqCategoryController extends Controller
{

    /**
     * List all categories of FAQ
     *
     * @param FaqPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenter $presenter)
    {
        $categories = $presenter->getAllCategories();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.category.title'));

        return view('faq::admin.category.index', compact('categories'));
    }

    /**
     * View form for create new category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.category.add'));

        return view('faq::admin.category.category');
    }

    /**
     * Save created category in database
     *
     * @param FaqCategoryRequest $request
     * @param FaqPresenter $presenter
     * @param null|int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FaqCategoryRequest $request, FaqPresenter $presenter, $id = null)
    {
        $dto = new FaqCategoryDTO();
        $dto->setCategoryId($id);
        $dto->setSlug($request->slug);
        $dto->setTitle($request->title);

        $presenter->createOrUpdateCategory($dto, $id);

        Notifications::success(trans('faq::faq.notifications.success.category.create'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }

    /**
     * View form for edit category
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqPresenter $presenter, $id)
    {
        $category = $presenter->getByCategory($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.category.edit'));

        return view('faq::admin.category.category', compact('category'));
    }

    /**
     * Change status of category
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(FaqPresenter $presenter, $id)
    {
        $presenter->updateStatusCategory($id);

        Notifications::success(trans('faq::faq.notifications.success.category.status'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }

    /**
     * Delete category from database
     *
     * @param FaqPresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FaqPresenter $presenter, $id)
    {
        $presenter->deleteCategory($id);

        Notifications::success(trans('faq::faq.notifications.success.category.delete'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }
}
