<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const DEFAULT_PAGINATE = 20;

    protected $table = 'faq_categories';

    protected $fillable = [
        'status', 'title', 'slug'
    ];

    public function questionsAnswers()
    {
        return $this->hasMany('Ourgarage\Faq\Models\QuestionAnswer');
    }
}
