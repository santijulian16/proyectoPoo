<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aplicacionesDao
 *
 * @author santi
 */
class AplicacionesDao {

    function __construct() {
        
    }

    public function listaraplicaciones() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from aplicaciones"); //Sentecia sql
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetchAll(); //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

}
