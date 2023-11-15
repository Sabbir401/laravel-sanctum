<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_addresses';

    protected $fillable = [
        'student_id',
        'alternate_phone',
        'course',
        'roll_no'
    ];
    public function siteUser()
    {
        return $this->belongsTo(site_user::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(address::class, 'address_id');
    }
}
