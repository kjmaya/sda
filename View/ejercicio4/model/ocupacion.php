<?php

namespace taller4\model;

class Ocupacion{
    private $id;
    private $nombre;
    
    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
?>