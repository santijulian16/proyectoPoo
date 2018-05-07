<?php

class ProgramasDAO {
    //Contructor
    function __construct() {
        
    }
    //Mostrar programas
    public function listarProgramas() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from programas");
            $query->execute();
            return $query->fetchAll(); 
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
    }
    //Validar si existe el programa
    public function valExisPro($codigo) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select c.codigo from programas as c where c.codigoo=?"); 
            $query->bindParam(1, $codigo);
            $query->execute();
            return empty($query->fetchAll());
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    //Insertar nuevo programa
    public function insertarPrograma(ProgramaDTO $insertarPrograma) {
        $con = Conexion::getConexion();
        try{
            $opcion=$_REQUEST['op'];
            $cod_p=$_REQUEST['codigo'];
            $nom_p=$_REQUEST['Nombre'];
            echo "opcion:".$opcion;
            echo "<br>codigo:".$cod_p;
            echo "<br>Nombre:".$nom_p;
            if($opcion=='Insertar'){
                $sql = "INSERT INTO programas (codigo,Nombre) VALUES ('$cod_p', '$nom_p')";
                if ($con->$query($sql) === TRUE){
                    echo "Insertar";
                } 
                else{
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
                echo "<script>"
                    ."alert('Se inserto exitosamente');"
                    . "</script> ";
            }
            echo " <script>location.href='programas.php';</script> ";
        }
        catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
    }
    //Modificar programa
    public function modificarPrograma(ProgramaDTO $modificarPrograma){
        $con = Conexion::getConexion();
        try{
            $opcion=$_REQUEST['op'];
            $cod_p=$_REQUEST['codigo'];
            $nom_p=$_REQUEST['Nombre'];   
            echo "opcion:".$opcion;
            echo "<br>codigo:".$cod_p;
            echo "<br>Nombre:".$nom_p;
            if($opcion=='Modificar'){	
                $sql = "UPDATE  programas SET Nombre='$nom_p' WHERE codigo='$cod_p'";
                if ($con->$query($sql) === TRUE){
                    echo "Modificar";
                } 
                else{
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
                echo "<script>"
                    . "alert('Se modifico exitosamente');"
                    . "</script>";
            }
            echo " <script>location.href='programas.php';</script> ";
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
        
    }
    //Eliminar programa
    public function eliminarPrograma(ProgramaDTO $eliminarPrograma){
        $con = Conexion::getConexion();
        try{
            $opcion=$_REQUEST['op'];
            $cod_p=$_REQUEST['codigo'];
            $nom_p=$_REQUEST['Nombre'];
            echo "opcion:".$opcion;
            echo "<br>codigo:".$cod_p;
            echo "<br>Nombre:".$nom_p;
            if($opcion=='Eliminar'){
                $sql = "DELETE from programas WHERE codigo='$cod_p'";
                if ($conn->$query($sql) === TRUE) {
                    echo "Eliminar";
                }
                else{
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
                echo "<script>
                    alert('Se elimino exitosamente');
                    </script>";
            }
            echo " <script>location.href='programas.php';</script> ";
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage();
        }
    }
}

