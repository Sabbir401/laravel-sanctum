<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion_category extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }
}
