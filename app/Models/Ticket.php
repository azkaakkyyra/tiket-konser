<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'ticket_code',
        'type',
        'status',
        'ordered_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'ordered_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
