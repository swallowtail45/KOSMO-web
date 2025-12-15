<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Property extends Model
{
   use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'owner_name',
        'owner_phone',
        'room_total',
        'status',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
