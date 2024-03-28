<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $table = "empleados";
    protected $fillable =[
        'id',
        'nombre',
        'apellido',
        'foto',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function tareas(){
        return $this->belongsToMany(Tarea::class,"empleado_tarea");
    }
}
