<?php

namespace App;

use App\Notifications\SendResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'idUser';
    protected $fillable = [
        'name', 'apellidos', 'pais', 'ciudad', 'active', 'cc', 'fechaN', 'nombreEmpresa', 'nit', 'esEmpresa', 'telefono', 'direccion',
        'email', 'password', 'descripcion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function SendResetPassword($token)
    {
        $this->notify(new SendResetPassword($token));
    }
}
