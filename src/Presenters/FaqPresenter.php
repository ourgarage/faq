<?php

namespace Ourgarage\Faq\Presenters;

use Illuminate\Database\Eloquent\Collection;
use Ourgarage\Faq\DTO\FaqCategoryDTO;
use Ourgarage\Faq\DTO\FaqDTO;
use Ourgarage\Faq\Models\Category;
use Ourgarage\Faq\Models\Faq;

class FaqPresenter
{
    const PER_PAGE = 20;

    /**
     * Get all categories of FAQ
     *
     * @return Collection|Category[]
     */
    public function getAllCategories()
    {
        return Category::paginate(FaqPresenter::PER_PAGE);
    }

    /**
     * Create or update category of FAQ
     *
     * @param FaqCategoryDTO $dto
     * @return bool
     */
    public function createOrUpdateCategory(FaqCategoryDTO $dto)
    {
        $category = Category::findOrNew($dto->getId());

        $category->title = $dto->getTitle();
        $category->slug = $dto->getSlug();
        $category->save();

        return true;
    }

    /**
     * Get selected category
     *
     * @param int $id
     * @return object
     */
    public function getByCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update category status
     *
     * @param int $id
     * @param int $status
     * @return bool
     */
    public function updateStatusCategory($id, $status)
    {
        $category = Category::findOrFail($id);

        $category->status = $status;
        $category->save();

        return true;
    }

    /**
     * Delete category of FAQ
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        Category::destroy($id);

        return true;
    }

    /**
     * Get all FAQ
     *
     * @return Collection|Faq[]
     */
    public function getAllFaqs()
    {
        return Faq::with('category')->paginate(FaqPresenter::PER_PAGE);
    }

    /**
     * Create or update FAQ
     *
     * @param FaqDTO $dto
     * @return bool
     */
    public function createOrUpdateFaq(FaqDTO $dto)
    {
        $faq = Faq::findOrNew($dto->getId());

        $faq->faq_category_id = $dto->getCategory();
        $faq->title = $dto->getTitle();
        $faq->slug = $dto->getSlug();
        $faq->answer = $dto->getAnswer();
        $faq->save();

        return true;
    }

    /**
     * Get selected FAQ
     *
     * @param int $id
     * @return object
     */
    public function getByFaq($id)
    {
        return Faq::findOrFail($id);
    }

    /**
     * Update FAQ status
     *
     * @param int $id
     * @param int $status
     * @return bool
     */
    public function updateStatusFaq($id, $status)
    {
        $faq = Faq::findOrFail($id);

        $faq->status = $status;
        $faq->save();

        return true;
    }

    /**
     * Delete FAQ
     *
     * @param int $id
     * @return bool
     */
    public function deleteFaq($id)
    {
        Faq::destroy($id);

        return true;
    }

    /**
     * Get all active categories of FAQ
     *
     * @return Collection|Category[]
     */
    public function getActiveCategories()
    {
        return Category::where('status', Category::STATUS_ACTIVE)
            ->has('faq')->with(['faq' => function ($query) {
                $query->where('status', Faq::STATUS_ACTIVE);
            }])->get();
    }
}
