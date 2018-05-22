<?php 
include '../model.conexion/Conexion.php';

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
    
    //segunda parte
    
    $id = intval ($_GET['id']); // imaginamos que el parámetro "id" nos llega en la URL (p. ej. imagen.php?id=5).
    $sql = "SELECT imagen, tipo FROM imagenes WHERE id='$id'";
    $res = mysql_query ($sql);
    if ( $res AND mysql_num_rows($res)>0 ){ // se ha encontrado la imagen
    $datos = mysql_fetch_array ($res);

    // Indicamos al navegador el tipo de imagen que le vamos a enviar
    header ('Content-type: ' . $datos['tipo']);

    // Enviamos los datos binarios (la imagen)
    echo asignamaterias ($datos['imagen']);
    }
    else
    echo "Error al ejecutar la consulta ($sql)\n";
    
    
    //http://ingeniuz.blogspot.com.co/2005/05/cmo-almacenar-una-imagen-en-mysql-sql.html
?>


