<?php
include "../model.DAO/programasDAO.php";
include "../model.DTO/programaDTO.php";
include "../model.conexion/Conexion.php";

//Insetar programa
if (isset ($_POST['insertarPrograma'])) {
    $cod_p = $_POST['codigo'];
    $nom_p = $_POST['Nombre'];
    //$insertprogra = $programasDao->insertarPrograma($insertarPrograma);
    $lisprogra = $programasDao->listarProgramas();
    $existPro = $programasDao->valExisPro($_POST['codigo']);
    if ($existPro) {
        $proDto = new programaDTO(); 
        $proDto->setCodigo($_POST['codigo']);
        $proDto->setNombre($_POST['Nombre']);
        $mess = $programasDao->insertarPrograma($insertarPrograma);
    } else {
        $mess = "(E)Error: Programa a insertar ya existe.";
    }
    header("Location: ../web/usuarios/agregarPrograma.php?msj=$mess");
}
//Eliminar programa
elseif (isset ($_POST['eliminarPrograma'])) {
    $cod_p = $_POST['codigo'];
    $nom_p = $_POST['Nombre'];
    $lisprogra = $programasDao->listarProgramas();
    $existPro = $programasDao->valExisPro($_POST['codigo']);
    if ($existPro) {
        $proDto = new programaDTO();
        $proDto->setCodigo($_POST['codigo']);
        $proDto->setNombre($_POST['Nombre']);
        $mess = $programasDao->eliminarPrograma($eliminarPrograma);
    } else {
        $mess = "(E)Error: Programa no existe.";
    }
    header("Location: ../web/usuarios/programas.php?msj=$mess");
}
//Modificar programa
elseif (isset ($_POST['modificarPrograma'])) {
    $cod_p = $_POST['codigo'];
    $nom_p = $_POST['Nombre'];
    $lisprogra = $programasDao->listarProgramas();
    $existPro = $programasDao->valExisPro($_POST['codigo']);
    if ($existPro) {
        $proDto = new programaDTO();
        $proDto->setCodigo($_POST['codigo']);
        $proDto->setNombre($_POST['Nombre']);
        $mess = $programasDao->modificarPrograma($modificarPrograma);
    } else {
        $mess = "(E)Error: Programa no existe.";
    }
    header("Location: ../web/usuarios/modificarPrograma.php?msj=$mess");
}

   




