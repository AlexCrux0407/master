<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Forzar explícitamente el nombre de la tabla
    protected $table = 'usuarios';
    
    // Asegurar que no use convenciones automáticas
    public function getTable()
    {
        return 'usuarios';
    }

    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'apellido', 
        'nombreUsuario',
        'correo',
        'password',
        'rol'
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