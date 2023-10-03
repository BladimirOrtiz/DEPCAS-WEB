<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
class Solicitud extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'request';
    protected $primaryKey = 'idrequest';
/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'requestfolio',
        'request_type',
        'sector_destined',
        'institution_name',
        'request_description',
        'applicant_files',
        'created_date',
        'creation_time',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_userr');
    }
    public function institution()
    {
        return $this->belongsTo(Institution::class, 'fk_institutions', 'id_institution');
    }

    public static function getRequestByIdAndUser($idrequest, $fk_userr)
    {
        return self::where('idrequest', $idrequest)
            ->where('fk_userr', $fk_userr)
            ->first();
    }
    public static function getRequestByRequestfolio($requestfolio)
{
    return static::where('requestfolio', $requestfolio)->first();
}

}
