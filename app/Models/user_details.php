<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class user_details extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user_details';
    protected $primaryKey = 'iduserdetails';
	public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personalname',
        'paternallastname',
        'maternalastname',
        'birthdate',
        'curp',
        'gender',
        'cellphonenumber',
        'homenumber',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
    public function generalData()
    {
        return $this->belongsTo(GeneralData::class, 'fk_userdetailsgen');

    }

}
