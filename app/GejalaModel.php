<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GejalaModel extends Model
{
     protected $table='gejala';
     protected $fillable =['kode_gejala','nama_gejala'];
}
