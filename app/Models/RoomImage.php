<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomImage extends Model
{
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
