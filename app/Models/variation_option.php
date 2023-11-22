<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation_option extends Model
{
    use HasFactory;
    protected $fillable = [
        'variation_id',
        'value'
    ];

    public function variation()
    {
        return $this->belongsTo(variation::class, 'variation_id');
    }

    public function productConfigur()
    {
        return $this->hasOne(product_configaration::class, 'variation_option_id');
    }
}
