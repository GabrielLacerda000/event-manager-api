<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    protected $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
