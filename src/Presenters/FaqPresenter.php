<?php

namespace Ourgarage\Faq\Presenters;

use Ourgarage\Faq\Models\Category;

class FaqPresenter
{
    /**
     * Get all categories of FAQ
     *
     * @return object
     */
    public function getAllCategories()
    {
        return Category::paginate(20);
    }

    /**
     * Create or update category of FAQ
     *
     * @param array $data
     * @param integer $id
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
     * @param integer $id
     * @return object
     */
    public function getByCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update category status
     *
     * @param integer $id
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
     * @param integer $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        Category::destroy($id);

        return true;
    }

}
