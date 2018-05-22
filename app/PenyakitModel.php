<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
     protected $table='penyakit';
       protected $fillable =['id_penyakit','nama_penyakit'];
}
