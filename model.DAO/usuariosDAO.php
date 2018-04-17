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
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select u.documento from usuarios as u where u.documento=?");
            $query->bindParam(1, $documento);
            $query->execute();
            return empty($query->fetchAll());
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registrarUsu(UsuarioDTO $usuDto) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into usuarios values('',?,?,?,?)");
            $query->bindParam(1, $usuDto->getNombre());
            $query->bindParam(2, $usuDto->getApellido());
            $query->bindParam(3, $usuDto->getDocumento());
            $query->bindParam(4, $usuDto->getClave());
            $query->execute();
            return "(S)Usuario registrado con existo.";
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
    }

}
