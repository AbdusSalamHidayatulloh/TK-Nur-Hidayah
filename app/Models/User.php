<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'birthdate'
    ];

    protected $hidden = ['password'];

    public function teacher(): HasOne {
        return $this->hasOne(Teacher::class);
    }
}
