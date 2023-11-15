<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'addresses';

    protected $fillable = [
        'unit_number',
        'street_number',
        'address_line1',
        'address_line2',
        'city',
        'region',
        'post_code',
        'country_id',
    ];

    public function findCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function userAddress()
    {
        return $this->hasOne(user_address::class, 'address_id');
    }
}
