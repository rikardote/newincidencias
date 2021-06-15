<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employees';

    //protected $appends = ['nombre_completo'];

    protected $fillable = ['num_empleado', 'name', 'father_lastname', 'mother_lastname', 'deparment_id', 'condicion_id', 'puesto_id', 'horario_id', 'num_plaza', 'num_seguro','jornada_id', 'lactancia', 'comisionado', 'estancia'];


    public function deparment()
    {
    	return $this->belongsTo(Deparment::class,'deparment_id');
    }
    public function condicion()
    {
        return $this->belongsTo(Condicion::class,'condicion_id');
    }
    public function incidencia()
    {
        return $this->hasMany('App\Model\Incidencia');
    }
    public function horario()
    {
        return $this->belongsTo(Horario::class,'horario_id');
    }
    public function jornada()
    {
        return $this->belongsTo(Jornada::class,'jornada_id');
    }

    public function getNombreCompletoAttribute()
    {
       return $this->name . ' ' . $this->father_lastname. ' ' . $this->mother_lastname;
    }

    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function setfatherlastnameAttribute($value)
    {
        $this->attributes['father_lastname'] = strtoupper($value);
    }
    public function setmotherlastnameAttribute($value)
    {
        $this->attributes['mother_lastname'] = strtoupper($value);
    }
    public function getNumeroEmpleadoAttribute()
    {
        return str_pad($this->num_empleado, 6, '0', STR_PAD_LEFT);
    }

}
