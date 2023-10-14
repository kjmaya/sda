<?php

namespace App\models;

class Docente{
    private $codigo;
    private $nombre;

    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
