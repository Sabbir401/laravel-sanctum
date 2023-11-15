<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class site_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'site_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'Phone_number'
    ];
    public function userAddress()
    {
        return $this->hasOne(user_address::class, 'user_id');
    }
}
