<?php
namespace taller4\controllers\ocupaciones;
include __DIR__ . '/../../model/ocupacion.php';
use taller4\controllers\EntityController;
use taller4\model\Ocupacion;

class ocupacionController extends EntityController
{

    private $dataTable = 'ocupaciones';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $ocupaciones = [];

        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $ocupacion = new Ocupacion();
                $ocupacion->set('id', $item['id']);
                $ocupacion->set('nombre', $item['nombre']);
                $ocupaciones[] = $ocupacion;
            }
        }   

        return $ocupaciones;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where id=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $ocupacion = null;
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $ocupacion = new Ocupacion();
                $ocupacion->set('codigo', $item['id']);
                $ocupacion->set('nombre', $item['nombre']);
                break;
            }
        }
        return $ocupacion;
    }

    function addItem($codigo,$ocupacion,$id)
    {
    }

    function updateItem($ocupacion)
    {
    }

    function deleteItem($codigo)
    {
    }
}
