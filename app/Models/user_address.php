<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    use HasFactory;
    public function siteUser()
    {
        return $this->belongsTo(site_user::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(address::class, 'address_id');
    }
}
