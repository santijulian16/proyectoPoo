<?php

class ProgramasDAO {
    //Contructor
    function __construct() {
        
    }
    //Mostrar programas
    public function listarProgramas() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from programas");
            $query->execute();
            return $query->fetchAll(); 
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
    }
    //Validar si existe el programa
    public function valExisPro($codigo) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select c.codigo from programas as c where c.codigo=?"); 
            $query->bindParam(1, $codigo);
            $query->execute();
            return empty($query->fetchAll());
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    //Insertar nuevo programa
    public function insertarPrograma(ProgramaDTO $insertarPrograma) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into programas values(?,?)"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $insertarPrograma->getCodigo());
            $query->bindParam(2, $insertarPrograma->getNombre());
            $query->execute(); //Ejecuta la senecia sql
            return "(P) Programa registrado con exito."; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    //Modificar programa
    public function modificarPrograma(ProgramaDTO $modificarPrograma){
        $con = Conexion::getConexion();
        try{
            $query=$con->prepare("update programas set nombre=? where codigp=?");
            $query->bindParam(1, $modificarPrograma->getNombre());
            $query->execute();
            return "(P) Programa moficado con exito.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }
    //Eliminar programa
    public function eliminarPrograma($eliminarPrograma){
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("DELETE FROM programas WHERE codigp =?"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $eliminarPrograma);
            $query->execute(); //Ejecuta la senecia sql
            return "(P) Programa eliminado con exito.";
            ; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
}

