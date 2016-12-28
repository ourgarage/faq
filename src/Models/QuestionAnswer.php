<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'faq_questions_answers';

    protected $fillable = [
        'faq_category_id', 'status', 'title', 'slug', 'question', 'answer'
    ];
}
