<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date_start',
        'event_date_end',
        'event_description'
    ];

    public function photos(): HasMany {
        return $this->hasMany(Photo::class);
    }
}
