<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candle extends Model
{
    static $rules = [
        'id_user' => 'required',
        'id_sale' => 'null',
        'nombre' => 'required',
        'precio' => 'required',
        'status' => 'null',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_user','id_sale','nombre','precio','status'];


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }


}
