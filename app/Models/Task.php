<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'priority'
    ];

    //User this in tinker class.
    //App\Models\Task::factory()->times(250)->create();


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
