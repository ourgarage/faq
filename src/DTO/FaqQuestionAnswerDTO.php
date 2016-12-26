<?php

namespace Ourgarage\Faq\DTO;

class FaqQuestionAnswerDTO
{
    private $id;
    /**
     * @var int
     */
    private $category;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $question;

    /**
     * @var string
     */
    private $answer;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return FaqQuestionAnswerDTO
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return FaqQuestionAnswerDTO
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return FaqQuestionAnswerDTO
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return FaqQuestionAnswerDTO
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     * @return FaqQuestionAnswerDTO
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     * @return FaqQuestionAnswerDTO
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

}
