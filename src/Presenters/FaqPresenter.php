<?php

namespace Ourgarage\Faq\Presenters;

use Illuminate\Database\QueryException;
use Ourgarage\Faq\Models\Category;

class FaqPresenter
{
    /**
     * Get all categories of FAQ
     *
     * @return array
     */
    public function getAllCategories()
    {
        return Category::paginate(20);
    }

    /**
     * Create or update category of FAQ
     *
     * @param $data
     * @type array
     * @param $id
     * @type int
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

    public function getByCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update category status
     *
     * @param $id
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
     * @param $id
     * @type int
     * @return bool
     */
    public function deleteCategory($id)
    {
        Category::destroy($id);

        return true;
    }

}
