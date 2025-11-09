<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'event_id'
    ];

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class);
    }
}
