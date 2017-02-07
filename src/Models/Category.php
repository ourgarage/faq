<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'faq_categories';

    protected $fillable = [
        'status', 'title', 'slug'
    ];
    
    /**
     * Get questions of category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faq()
    {
        return $this->hasMany('Ourgarage\Faq\Models\Faq', 'faq_category_id');
    }
}
