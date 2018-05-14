<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsiaModel extends Model
{
     protected $table='usia';
    protected $fillable =['kode_usia','nama_usia'];
}
