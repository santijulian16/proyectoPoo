<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salonesDao
 *
 * @author santi
 */
class SalonesDao {
    function __construct() {
        
    }
    
        public function validasalhor($id_sal) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from horario where sal_codigo = ?"); //Sentecia sql
            $query->bindParam(1, $id_sal);
            $query->execute(); //Ejecuta la senecia sql
            if (empty($query->fetchAll())) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function listarSal() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from salones"); //Sentecia sql
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetchAll(); //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    
        public function eliminarSalon($id_sal) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("DELETE FROM salones WHERE codigp =?"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $id_sal);
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Salon Eliminado con existo.";
            ; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    
    
public function registrarSalon(SalonDTO $salDto) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into salones values(?,?,?,?)"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $salDto->getCodigo());
            $query->bindParam(2, $salDto->getNombre());
            $query->bindParam(3, $salDto->getEstado());
            $query->bindParam(4, $salDto->getEdi_codigo());
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Salon registrado con existo."; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    
    public function modificarSal(salonDTO $salDto){
        $con=  Conexion::getConexion();
        try{
            $query=$con->prepare("update salones set nombre=? estado=? where codigp=?");
            $query->bindParam(1, $salDto->getNombre());
            $query->bindParam(2, $salDto->getIdCat());
            $query->execute();
            return "(S) Salon Moficado con existo.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
