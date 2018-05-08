<?php

include '../model.conexion/Conexion.php';
include '../model.DAO/salonesDao.php';  

if (isset($_POST['elim'])) {    
    $mensaje="";
    $salDao= new SalonesDao();
    $mensaje= $salDao->eliminarSalon($_POST['eliminar']);
    header("Location: ../web/salones/salones.php?msj=$mensaje");
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

