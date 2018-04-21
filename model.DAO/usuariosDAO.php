<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosDAO {

    function __construct() {
        
    }

    public function valExisUsu($documento) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select u.documento from usuarios as u where u.documento=?"); //Sentecia sql
            $query->bindParam(1, $documento); //Paso el documento al parametro de la setencia sql
            $query->execute(); //Ejecuta la senecia sql
            return empty($query->fetchAll()); //Se valida si la sencia ejecutada retorna algun valor
        } catch (Exception $ex) {
            echo $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function registrarUsu(UsuarioDTO $usuDto) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into usuarios values('',?,?,?,?)");//Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $usuDto->getNombre());
            $query->bindParam(2, $usuDto->getApellido());
            $query->bindParam(3, $usuDto->getDocumento());
            $query->bindParam(4, $usuDto->getClave());
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Usuario registrado con existo."; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    
    public function listarUsu(){
       $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from usuarios");//Sentecia sql
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetchAll(); //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }        
    }

}
