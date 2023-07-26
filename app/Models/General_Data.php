<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class General_Data extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'general_datas';
	public $timestamps = false;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'generaldescription',
      ];
      public function user()
      {
          return $this->hasOne(User::class);
      }

      public function userDetails()
      {
          return $this->hasOne(UserDetail::class);
      }

      public function addressData()
      {
          return $this->hasOne(AddressData::class);
      }

      public function medicalData()
      {
          return $this->hasOne(MedicalData::class);
      }
}
