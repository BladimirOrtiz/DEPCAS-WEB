<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Address_Data extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'address_datas';
    protected $primaryKey = 'idaddressdata';
	public $timestamps = false;

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'postalcode',
        'state',
        'municipality',
        'colony',
        'street',
        'interiornumber',
        'outdoornumber',
        'referencesaddress',

    ];
    public function user()
{
    return $this->belongsTo(User::class, 'fk_useraddress');
}
public function generalData()
{
    return $this->belongsTo(GeneralData::class, 'fk_addressdatagen');
}
}
