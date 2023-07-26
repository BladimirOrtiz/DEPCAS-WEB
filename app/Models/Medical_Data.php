<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Medical_Data extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'medical_data';
    protected $primaryKey = 'idmedicaldatas';
	public $timestamps = false;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medicaldiagnosis',
        'blood_type',
        'allergies_type',
        'allergies',
        'additionaldescription',
        'chronic_diseases',


    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_userm');
    }

}
