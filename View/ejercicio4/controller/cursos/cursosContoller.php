<?php

namespace taller4\controllers\curso;

// use taller4\controllers\docente\DocentesController;
use taller4\controllers\docente\DocentesController;
use taller4\controllers\EntityController;
use taller4\models\cursos;

class CursosController extends EntityController
{

    private $dataTable = 'cursos';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if ($resultSQL !== false && $resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $curso = new Cursos();
                $curso->set('codigo', $item['cod']);
                $curso->set('nombre', $item['nombre']);
                $codDoc = $item['codDocente'];
                $docenteController = new DocentesController();
                $docentes = $docenteController->getItem($codDoc);

                if ($docentes !== null) {
                    $nomDocente = $docentes->get('nombre');
                    $curso->set('codDocente', $nomDocente);
                } else {
                    echo "no existe";
                }

                array_push($lista, $curso);
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
                $curso = new Cursos();
                $curso->set('codigo', $item['cod']);
                $curso->set('nombre', $item['nombre']);
                $codDoc = $item['codDocente'];
                $docentesController = new DocentesController();
                $docente = $docentesController->getItem($codDoc);

                if ($docente !== null) {
                    $nombreDeCurso = $docente->get('nombre');
                    $curso->set('nombreDeCurso', $nombreDeCurso);
                } else {
                    echo "no existe";
                }
                break;
            }
        }
        return $curso;
    }

    function addItem($codigo, $cursonom, $codDocente)
    {
        $sql = "INSERT INTO cursos (cod,nombre, codDocente) VALUES ('$codigo','$cursonom', '$codDocente')";
        echo '<a href="cursos.php">Volver</a>';
        echo $sql;
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "Curso agregado con éxito";
        } else {
            return "Error al agregar curso";
        }
    }

    function updateItem($curso)
    {
    }

    function deleteItem($codigo)
    {
        $sql = "DELETE FROM " . $this->dataTable . " WHERE cod = '$codigo'";
        $resultSQL = $this->execSql($sql);

        if ($resultSQL) {
            return "Curso eliminado con éxito";
        } else {
            return "Error al eliminar curso";
        }
    }
}
