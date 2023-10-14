<?php

namespace App\controllers\docentes;

use App\controllers\EntityController;
use App\models\Docente;

class DocenteController extends EntityController
{

    private $dataTable = 'docentes';
    function allData()
    {
        $sql = "select * from ".$this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docente();
                $docente->set('codigo', $item['codigo']);
                $docente->set('nombre', $item['nombre']);
                array_push($lista, $docente);
            }
        }
        return $lista;
    }

    function getItem($codigo)
    {
        $sql = "select * from ".$this->dataTable . " where codigo=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $docente = null;
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docente();
                $docente->set('codigo', $item['codigo']);
                $docente->set('nombre', $item['nombre']);
                $docente->set('email', $item['email']);
                break;
            }
        }
        return $docente;
    }

    function addItem($docente)
    {
        $codigo = $docente->get('codigo');
        $nombre = $docente->get('nombre');
        $email = $docente->get('email');
        $registro = $this->getItem($codigo);
        if (isset($registro)) {
            return "El código ya existe";
        }
        $sql = "Insert into ". $this->dataTable . " (codigo,nombre)value ('$codigo','$nombre')";
        $resultSQL = $this->execSql($sql);
        if (!$resultSQL) {
            return "no se guardo";
        }
        return "se guardo con exito";
    }

    function updateItem($docente)
    {
        $codigo = $docente->get('codigo');
        $nombre = $docente->get('nombre');
        $email = $docente->get('email');
        $registro = $this->getItem($codigo);
        if (!isset($registro)) {
            return "El registro no existe";
        }
        $sql = "update" . $this->dataTable . " set ";
        $sql .= "nombre='$nombre',";
        $sql .= " where codigo=$codigo";

        $resultSQL = $this->execSql($sql);
        if (!$resultSQL) {
            return "no se guardo";
        }
        return "se guardo con exito";
    }

    function deleteItem($codigo)
    {
        $sql = "delete from ".$this->dataTable;
        $sql .= " where codigo=$codigo";
        $resultSQL = $this ->execSql($sql);
        if ($resultSQL ){
            return "registro eliminado";
        }
        return " No se pudo elieminar el registro";
    }
}
