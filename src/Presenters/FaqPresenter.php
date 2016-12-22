<?php

namespace Ourgarage\Faq\Presenters;

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
        return Category::paginate(20);
    }

    /**
     * Create or update category of FAQ
     *
     * @param object $data
     * @param int $id
     * @return bool
     */
    public function createOrUpdateCategory($data, $id)
    {
        $category = Category::findOrNew($id);

        $category->title = $data->title;
        $category->slug = $data->slug;
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
