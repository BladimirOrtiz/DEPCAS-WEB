<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model implements Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
    ];

    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Implementa los métodos requeridos por la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Nombre del campo de identificación (clave primaria)
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Valor de la clave primaria
    }

    public function getAuthPassword()
    {
        return $this->password; // Campo de contraseña
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Campo de token de recuerdo (opcional)
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Campo de token de recuerdo (opcional)
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Nombre del campo de token de recuerdo (opcional)
    }
}
