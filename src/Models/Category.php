<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'faq_categories';

    protected $fillable = [
        'status', 'title', 'slug', 'meta_keywords', 'meta_description', 'meta_title'
    ];

    public function questionsAnswers()
    {
        return $this->hasMany('Ourgarage\Fag\Models\QuestionAnswer');
    }
}
