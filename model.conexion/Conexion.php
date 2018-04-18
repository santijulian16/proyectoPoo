<?php

class Conexion {

    public static function getConexion() {
        $con = null;
        try {
            $dsn = 'mysql:dbname=' . 'asignamaterias' . ';host=' . 'localhost' . ';port=' . '3306';
            // Se crea objeto PDO con los datos de la conexion de la base de datos
            $con = new PDO($dsn, 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage(); 
        }
        return $con;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

