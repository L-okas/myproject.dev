<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $imagesPath = '/images/';

    protected $fillable = ['path'];

    public function getPathAttribute($photo){ //funkcija iskvieciama kai tik kazkur iskvieciama Photo klase kur bandoma gauti to atributo reiksme
        return $this->imagesPath . $photo;
    }


}
