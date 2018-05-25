<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosaGejalaModel extends Model
{
    protected $table='diagnosa_gejala';
    protected $fillable =['id','id_diagnosa','id_gejala'];
}
