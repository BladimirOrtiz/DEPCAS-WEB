<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class State extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'states';

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
