<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requestedBy',
        'room',
        'patient',
        'startDate',
        'endDate',
        'doctors',
    ];

    protected $casts = [
        'doctors' => 'array',
        'startDate' => 'datetime:Y-m-d H:i',
        'endDate' => 'datetime:Y-m-d H:i',
    ];

    public function room()
    {
       return $this->belongsTo(Room::class);
    }
}
