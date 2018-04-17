<?php

class DocenteDAO {

    public function listarTodos() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from docentes;");
            $query->execute();
            $docen_list = $query->fetchAll();
            return $docen_list;
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }

}

?>