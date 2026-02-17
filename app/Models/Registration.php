<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'match_id',
        'status',
    ];

    public function match()
    {
        return $this->belongsTo(FootballMatch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
