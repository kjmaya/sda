<?php

namespace taller4\controllers\docente;

use taller4\controllers\EntityController;
use taller4\controllers\ocupaciones\ocupacionController;
use taller4\models\Docentes;

class DocentesController extends EntityController
{

    private $dataTable = 'docentes';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docentes();
                $docente->set('codigo', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $codOcu = $item['idOcupacion'];
                $ocupacionController = new ocupacionController();
                $ocupacion = $ocupacionController->getItem($codOcu);

                if ($ocupacion !== null) {
                    $nombreDeLaOcupacion = $ocupacion->get('nombre');
                    $docente->set('nombreOcupacion', $nombreDeLaOcupacion);
                } else {
                    echo "no existe";
                }

                array_push($lista, $docente);
            }
        }
        return $lista;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where cod=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $docente = null;
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docentes();
                $docente->set('codigo', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $codOcu = $item['idOcupacion'];
                $ocupacionController = new ocupacionController();
                $ocupacion = $ocupacionController->getItem($codOcu);

                if ($ocupacion !== null) {
                    $nombreDeLaOcupacion = $ocupacion->get('nombre');
                    $docente->set('nombreOcupacion', $nombreDeLaOcupacion);
                } else {
                    echo "no existe";
                }
                break;
            }
        }
        return $docente;
    }

    function addItem($codigo, $docentenom, $id_ocupacion)
    {
        $sql = "INSERT INTO docentes (cod,nombre, idOcupacion) VALUES ('$codigo','$docentenom', $id_ocupacion)";
        echo '<a href="docentes.php">Volver</a>';
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "Docente agregado con éxito";
        } else {
            return "Error al agregar docente";
        }
    }

    function updateItem($docente)
    {
        
    }

    function deleteItem($codigo)
    {
        $sql = "DELETE FROM " .$this->dataTable. " WHERE cod = '$codigo'";
        $resultSQL = $this->execSql($sql);

        if ($resultSQL) {
            return "Docente eliminado con éxito";
        } else {
            return "Error al eliminar docente";
        }
    }
}
