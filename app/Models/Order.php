<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    

    static $rules = [
        'id_user' => 'required',
        'id_sale' => 'null',
        'nombre' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'sabor' => 'required',
        'relleno' => 'required',
        'rebanadas' => 'required',
        'decoracion' => 'required',
        'precio' => 'required',
        'anticipo' => 'required',
        'fechaEntrega' => 'required',
        'horaEntrega' => 'required',
        'status' => 'null',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_user','id_sale','nombre','telefono','direccion','sabor','relleno','rebanadas','decoracion','precio','anticipo','fechaEntrega','horaEntrega','status'];


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
