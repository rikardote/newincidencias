<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
    use HasFactory;

    protected $table = 'deparments';

    protected $fillable = ['code', 'description'];

    public function getCodeAttribute($value)
    {

        return str_pad($value, 5, '0', STR_PAD_LEFT);
    }

    public function setdescriptionAttribute($value)
    {
        $this->attributes['description'] = strtoupper($value);
    }

    public function getDeparmentAttribute($value)
    {

       return $this->code . ' - ' . $this->description;

    }
}
