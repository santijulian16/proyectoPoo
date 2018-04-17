<?php
include "../model.DAO/usuariosDAO.php";
include "../model.DTO/usuarioDTO.php";
include "../model.conexion/Conexion.php";

IF(isset($_POST["regusu"])){
    $usuDao = new UsuariosDAO();
    $mess = "";
    
    $existUsu = $usuDao->valExisUsu($_POST['documento']);
    
    if ($existUsu) {
       $usuDto = new UsuarioDTO();
       $usuDto->setDocumento($_POST['documento']);
       $usuDto->setNombre($_POST['nombre']);
       $usuDto->setApellido($_POST['apellido']);
       $usuDto->setClave($_POST['password']);
       $mess = $usuDao->registrarUsu($usuDto);
    } else {
        $mess = "(E)Error: Usuario a registrar ya existe.";
    }
    header("Location: ../registrarUsuario.php?msj=$mess");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

