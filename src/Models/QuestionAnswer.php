<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const DEFAULT_PAGINATE = 20;

    protected $table = 'faq_questions_answers';

    protected $fillable = [
        'status', 'title', 'slug', 'question', 'answer'
    ];
}
