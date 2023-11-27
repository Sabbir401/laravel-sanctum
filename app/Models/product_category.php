<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_category_id',
    ];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id');
    }
    // Relationship with Variation model
    public function variations()
    {
        return $this->hasMany(Variation::class, 'category_id');
    }

    // Relationship with PromotionCategory model
    public function promotionCategory()
    {
        return $this->hasMany(promotion_category::class, 'category_id');
    }

    // Relationship with itself for parent-child relationships
    public function parentCategory()
    {
        return $this->belongsTo(product_category::class, 'parent_category_id');
    }

    // Relationship with itself for child-parent relationships
    public function childCategories()
    {
        return $this->hasMany(product_category::class, 'parent_category_id');
    }
}
