<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'Description',
        'product_code',
        'origin',
        'product_image_1',
        'product_image_2',
        'product_image_3',
        'product_image_4'
    ];

    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }
    public function productItems()
    {
        return $this->hasOne(product_item::class, 'product_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(product_category::class, 'parent_category_id');
    }

    public function country()
    {
        return $this->belongsTo(country::class, 'origin');
    }


}
