<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    
    static $rules = [
        'id_user' => 'required',
        'sabor' => 'required',
        'tamanio' => 'required',
        'etiqueta' => 'required',
        'precio' => 'required',
        'status' => 'null',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_user','sabor','tamanio','etiqueta','precio','status'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
