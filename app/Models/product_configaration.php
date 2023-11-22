<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_configaration extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_item_id',
        'variation_option_id'
    ];
    public function productItem()
    {
        return $this->belongsTo(product_item::class, 'product_item_id');
    }

    public function variationOption()
    {
        return $this->belongsTo(variation_option::class, 'variation_option_id');
    }


}
