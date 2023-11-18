<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }
}
