<?php

namespace Ourgarage\Faq\Presenters;

use Illuminate\Database\Eloquent\Collection;
use Ourgarage\Faq\DTO\FaqCategoryDTO;
use Ourgarage\Faq\DTO\FaqQuestionAnswerDTO;
use Ourgarage\Faq\Models\Category;
use Ourgarage\Faq\Models\QuestionAnswer;

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
     * Get all questions-answers
     *
     * @return Collection|QuestionAnswer[]
     */
    public function getAllQuestionsAnswers()
    {
        return QuestionAnswer::paginate(FaqPresenter::PER_PAGE);
    }

    /**
     * Create or update question-answer
     *
     * @param FaqQuestionAnswerDTO $dto
     * @return bool
     */
    public function createOrUpdateQuestionAnswer(FaqQuestionAnswerDTO $dto)
    {
        $questionAnswer = QuestionAnswer::findOrNew($dto->getId());

        $questionAnswer->faq_category_id = $dto->getCategory();
        $questionAnswer->title = $dto->getTitle();
        $questionAnswer->slug = $dto->getSlug();
        $questionAnswer->question = $dto->getQuestion();
        $questionAnswer->answer = $dto->getAnswer();
        $questionAnswer->save();

        return true;
    }

    /**
     * Get selected question-answer
     *
     * @param int $id
     * @return object
     */
    public function getByQuestionAnswer($id)
    {
        return QuestionAnswer::findOrFail($id);
    }

    /**
     * Update question-answer status
     *
     * @param int $id
     * @param int $status
     * @return bool
     */
    public function updateStatusQuestionAnswer($id, $status)
    {
        $questionAnswer = QuestionAnswer::findOrFail($id);

        $questionAnswer->status = $status;
        $questionAnswer->save();

        return true;
    }

    /**
     * Delete question-answer
     *
     * @param int $id
     * @return bool
     */
    public function deleteQuestionAnswer($id)
    {
        QuestionAnswer::destroy($id);

        return true;
    }

    /**
     * Get all active categories of FAQ
     *
     * @return Collection|Category[]
     */
    public function getActiveCategories()
    {
        return Category::where('status', Category::STATUS_ACTIVE)->paginate(FaqPresenter::PER_PAGE);
    }

    /**
     * Get question-answer
     *
     * @param string $slug
     * @return object
     */
    public function getBySlugQuestionAnswer($slug)
    {
        return QuestionAnswer::where('slug', $slug)->first();
    }
}
