<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'SKU',
        'qty_in_stock',
        'price'
    ];
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function productConfigur()
    {
        return $this->hasOne(product_configaration::class, 'product_item_id');
    }
}
