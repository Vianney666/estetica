<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administradores extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Administradores';
    
    public $timestamps = false;

    
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'correo', 
        'contrasena', 
        'imagen', 
        'rol', 
        'estado'
    ];

   
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    
    public function getEmailForPasswordReset()
    {
        return $this->correo;
    }
}