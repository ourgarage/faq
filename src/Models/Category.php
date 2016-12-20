<?php

namespace Ourgarage\Faq\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'categories';

    protected $fillable = [
        'status', 'title', 'slug', 'meta_keywords', 'meta_description', 'meta_title'
    ];

}
