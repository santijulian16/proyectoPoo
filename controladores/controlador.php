<?php

include "../model.DAO/usuariosDAO.php";
include "../model.DTO/usuarioDTO.php";
include "../model.DTO/applicausuario.php";
include '../model.DAO/aplicacionesDao.php';
include "../model.conexion/Conexion.php";

//valido que llegue el name del boton de registrar usuario el registro en la base de datos
IF (isset($_POST["regusu"])) {
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
} elseif (isset($_POST["guadarperm"])) {
    $usudao = new UsuariosDAO();
    $appdao = new AplicacionesDao();
    $listapp = $appdao->listaraplicaciones();

    foreach ($listapp as $aplicacion) {
        if (isset($_POST[$aplicacion['codigo']])) {
            $permrc = true;
        } else {
            $permrc = false;
        }

        $id_per = $aplicacion['codigo'];
        $id_usu = $_POST['idusu'];
        $extapp = $usudao->validarappusu($id_usu, $id_per);

        if ($permrc != $extapp) {
            $appusu = new Applicausuario();
            $appusu->setCod_usu($id_usu);
            $appusu->setCod_app($id_per);
            if ($permrc == true && $extapp == false) {
                $mess = $usudao->agregarPermiso($appusu);
            } elseif ($permrc == false && $extapp == true) {
                $mess = $usudao->eliminarPermiso($appusu);
            }
        }
    }

// Redirecciono del controlador hacia la pagina de registrar usuario con una variable por GET
// con el mensaje resultante de la operación
    header("Location: ../web/usuarios/listusuarios.php?msj=$mess");
} else if (isset($_POST['login'])) {
    $usuario = $_POST['documento'];
    $pw = $_POST['password'];
    $usuDao = new UsuariosDAO();
//    $log = mysql_query("SELECT * FROM usuarios WHERE documento='$usuario' AND clave='$pw'");
    $usu = $usuDao->login($usuario, $pw);
//    if (mysql_num_rows($log) > 0) {
    if ($usu['codigo'] != null) {
//        $row = mysql_fetch_array($log); 
        session_start();
        $_SESSION['user'] = $usu['codigo'];
//        echo '<script window.location="../PaginaInicio.php"; </script>';
//        echo $_SESSION['user'];
//        header("Location: ../PaginaInicio.php");
//        header("Location: ../web/usuarios/listusuarios.php");
        header("Location: ../PaginaInicio.php");
    } else {
        echo '<script> alert("Usuario o contraseña son incorrectos.");</script>';
        echo '<script> window.location="../index.php"; </script>';
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

