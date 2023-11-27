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
        'product_image'
    ];

    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }
    public function productItems()
    {
        return $this->hasOne(product_item::class, 'product_id');
    }
}
