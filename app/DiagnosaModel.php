<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosaModel extends Model
{
    protected $table='diagnosa';
       protected $fillable =['id','id_user','id_penyakit'];
}
