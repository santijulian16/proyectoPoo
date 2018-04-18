<?php
include "../model.DAO/usuariosDAO.php";
include "../model.DTO/usuarioDTO.php";
include "../model.conexion/Conexion.php";

//valido que llegue el name del boton de registrar usuario el registro en la base de datos
IF(isset($_POST["regusu"])){
    $usuDao = new UsuariosDAO();
    $mess = ""; //Variable de mensajes
    
//    valido con documento que la perosna no este registrada en el sistema
//    si se ecuentra regitrada la variable existUsu queda cargada en true y si no queda en false
    $existUsu = $usuDao->valExisUsu($_POST['documento']);
    
    if ($existUsu) {
       $usuDto = new UsuarioDTO(); //Se crea objeto de usuario DTO
       // Se carga el objeto
       $usuDto->setDocumento($_POST['documento']);
       $usuDto->setNombre($_POST['nombre']);
       $usuDto->setApellido($_POST['apellido']);
       $usuDto->setClave($_POST['password']);
       // se realiza la insersion en base de datos pasando como parametro el objeto de usuario dto
       $mess = $usuDao->registrarUsu($usuDto);
    } else {
        //retorno mensaje de error si el usuario ya existe
        $mess = "(E)Error: Usuario a registrar ya existe.";
    }
// Redirecciono del controlador hacia la pagina de registrar usuario con una variable por GET
// con el mensaje resultante de la operación
    header("Location: ../registrarUsuario.php?msj=$mess");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

