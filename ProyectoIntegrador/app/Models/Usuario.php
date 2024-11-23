<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    // Define el nombre de la tabla si no sigue la convención plural de Laravel
    protected $table = 'usuario';

    // Campos asignables masivamente
    protected $fillable = [
        'nombreUsuario',
        'nombre',
        'apellido',
        'correo',
        'password',
    ];

    // Oculta el campo `password` cuando se convierte el modelo a JSON
    protected $hidden = [
        'password',
    ];

    // Opcional: Configura la gestión de marcas de tiempo
    public $timestamps = true;
    public function ranking()
    {
        return $this->hasOne(Ranking::class, 'usuario_id');
    }

}