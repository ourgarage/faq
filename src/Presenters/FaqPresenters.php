<?php

namespace Ourgarage\Faq\Presenters;

use Illuminate\Database\QueryException;
use Ourgarage\Faq\Models\Category;
use Ourgarage\Faq\Models\QuestionAnswer;

class FaqPresenters
{
    /**
     * Get all categories of FAQ
     *
     * @return mixed
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Create new category of FAQ
     *
     * @param $data
     * @return bool
     */
    public function createCategory($data)
    {
        try {
            Category::create([
                'title' => $data->title,
                'slug' => $data->slug
            ]);
        } catch (QueryException $e) {
            return true;
        }
    }

    public function getByCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update category of FAQ
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public function updateCategory($data, $id)
    {
        try {
            Category::where('id', $id)->update([
                'title' => $data->title,
                'slug' => $data->slug
            ]);
        } catch (QueryException $e) {
            return true;
        }
    }

    /**
     * Update category status
     *
     * @param $id
     * @return bool
     */
    public function updateStatusCategory($id)
    {
        try {
            $category = Category::find($id);

            $category->update([
                'status' => $category->status == Category::STATUS_ACTIVE ? Category::STATUS_DISABLED : Category::STATUS_ACTIVE,
            ]);
        } catch (QueryException $e) {
            return true;
        }
    }

    /**
     * Delete category of FAQ
     *
     * @param $id
     * @return bool
     */
    public function destroyCategory($id)
    {
        try {
            Category::destroy($id);
        } catch (QueryException $e) {
            return true;
        }
    }

    public function getAllQuestionsAnswers()
    {
        return QuestionAnswer::paginate(20);
    }

}
