<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Hotel extends Model
{
    protected $table = 'hotels';

    public function images(): HasMany
    {
        return $this->hasMany(HotelImage::class, 'hotel_id', 'id');
    }

    public function facilities(): HasMany
    {
        return $this->hasMany(HotelFacility::class, 'hotel_id', 'id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'hotel_id', 'id');
    }

    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, Room::class);
    }
}
