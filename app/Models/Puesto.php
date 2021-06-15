<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puestos';

    protected $fillable = ['puesto'];

    public function employees()
    {
    	return $this->hasMany('App\Employe');
    }


    public function setpuestoAttribute($value)
    {
        $this->attributes['puesto'] = strtoupper($value);
    }

}
