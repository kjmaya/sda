<?php

namespace taller4\models;

class Docentes{
    private $codigo;
    private $nombre;
    private $ocupacion; 

    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
?>