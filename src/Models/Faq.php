<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'faq_questions';

    protected $fillable = [
        'faq_category_id', 'status', 'title', 'slug', 'answer'
    ];
    
    /**
     * Get category of question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Ourgarage\Faq\Models\Category', 'faq_category_id');
    }
}
