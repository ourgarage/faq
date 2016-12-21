<?php

namespace Ourgarage\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Notifications;
use Ourgarage\Faq\Http\Requests\FaqCategoryRequest;
use Ourgarage\Faq\Presenters\FaqPresenters;

class FaqCategoryController extends Controller
{

    /**
     * List all categories of FAQ
     *
     * @param FaqPresenters $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FaqPresenters $presenter)
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
     * @param FaqPresenters $presenter
     */
    public function store(FaqCategoryRequest $request, FaqPresenters $presenter)
    {
        $err = $presenter->createCategory($request);

        if ($err) {
            Notifications::error(trans('faq::faq.notifications.error.category.create'), 'top');

            return redirect()->back()->withInput();
        }

        Notifications::success(trans('faq::faq.notifications.success.category.create'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }

    /**
     * View form for edit category
     *
     * @param FaqPresenters $presenter
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqPresenters $presenter, $id)
    {
        $category = $presenter->getByCategory($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('faq::faq.category.edit'));

        return view('faq::admin.category.category', compact('category'));
    }

    /**
     * Save change in database
     *
     * @param FaqCategoryRequest $request
     * @param FaqPresenters $presenter
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(FaqCategoryRequest $request, FaqPresenters $presenter, $id)
    {
        $err = $presenter->updateCategory($request, $id);

        if ($err) {
            Notifications::error(trans('faq::faq.notifications.error.category.update'), 'top');

            return redirect()->back()->withInput();
        }

        Notifications::success(trans('faq::faq.notifications.success.category.update'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }

    /**
     * Change status of category
     *
     * @param FaqPresenters $presenter
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(FaqPresenters $presenter, $id)
    {
        $err = $presenter->updateStatusCategory($id);

        if ($err) {
            Notifications::error(trans('faq::faq.notifications.error.category.status'), 'top');

            return redirect()->route('faq::admin::categories::index');
        }

        Notifications::success(trans('faq::faq.notifications.success.category.status'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }

    /**
     * Delete category from database
     *
     * @param FaqPresenters $presenter
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FaqPresenters $presenter, $id)
    {
        $err = $presenter->destroyCategory($id);

        if ($err) {
            Notifications::error(trans('faq::faq.notifications.error.category.delete'), 'top');

            return redirect()->route('faq::admin::categories::index');
        }

        Notifications::success(trans('faq::faq.notifications.success.category.delete'), 'top');

        return redirect()->route('faq::admin::categories::index');
    }
}
