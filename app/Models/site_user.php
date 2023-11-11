<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_user extends Model
{
    use HasFactory;
    public function userAddress()
    {
        return $this->hasOne(user_address::class, 'user_id');
    }
}
