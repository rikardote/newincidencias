<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = ['horario'];

    public function employees()
    {
    	return $this->belongsTo(Employe::class,'horario_id');
    }
}
