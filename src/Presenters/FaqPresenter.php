<?php

namespace Ourgarage\Faq\Presenters;

use Illuminate\Database\Eloquent\Collection;
use Ourgarage\Faq\DTO\FaqCategoryDTO;
use Ourgarage\Faq\Models\Category;

class FaqPresenter
{
    /**
     * Get all categories of FAQ
     *
     * @return Collection|Category[]
     */
    public function getAllCategories()
    {
        return Category::paginate(Category::PER_PAGE);
    }

    /**
     * Create or update category of FAQ
     *
     * @param FaqCategoryDTO $dto
     * @param int|null $id
     * @return bool
     */
    public function createOrUpdateCategory(FaqCategoryDTO $dto, $id = null)
    {
        $category = Category::findOrNew($id);

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
     * @return bool
     */
    public function updateStatusCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->status = $category->status == Category::STATUS_ACTIVE ? Category::STATUS_DISABLED : Category::STATUS_ACTIVE;
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

}
