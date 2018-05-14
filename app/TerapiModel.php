<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerapiModel extends Model
{
     protected $table='terapi';
       protected $fillable =['kode_terapi','nama_terapi'];
}
