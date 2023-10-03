<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Institution extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'institution';
    protected $primaryKey = 'id_institution  ';
    /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'institution_name',
            'institution_type',
            'institution_location',
            'attention_days',
            'opening_time',
            'closing_time',
            'institution_email',
            'institution_phonenumber',
            'area_responsible',
        ];

    public function requests()
    {
        return $this->hasMany(Solicitud::class);
    }

}
