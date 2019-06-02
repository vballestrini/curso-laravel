<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //Pode ser omitido
    //protected $table = 'series';

    //public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::Class);
    }

}