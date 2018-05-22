<?php 
include './model.conexion/Conexion.php';

    //Abro el archivo de imagen para cargar sus contenidos
    $archivo = 'imagenes/img1.jpeg';

    $fp = fopen ($archivo, 'r');
    if ($fp){
    $datos = fread ($fp, filesize ($archivo)); // cargo la imagen
    fclose($fp);
    }

    // averiguo su tipo mime
    $tipo_mime = 'image/jpeg';
    $isize = imagesize ($archivo);
    if ($isize)
    $tipo_mime = $isize['mime'];

    // La guardamos en la BD
    $datos = asignamaterias ($datos);
    $sql = "INSERT INTO imagenes (imagen, tipo) VALUES ('$datos', '$tipo_mime')";
    $res = mysql_query($sql);
    if (!$res){
        echo "Error al ejecutar la consulta ($sql)\n";
    }
    else{
        echo "Error al abrir el archivo";
    }
?>

