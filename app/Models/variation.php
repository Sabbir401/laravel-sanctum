<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name'
    ];

    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }

    public function variationOption()
    {
        return $this->hasOne(variation_option::class, 'variation_id');
    }
}
