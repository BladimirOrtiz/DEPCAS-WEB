<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Municipality extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'municipality';

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function colonies()
    {
        return $this->hasMany(Colony::class);
    }
}
