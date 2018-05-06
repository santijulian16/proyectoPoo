<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosDAO {

    function __construct() {
        
    }

    public function valExisUsu($documento) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select u.documento from usuarios as u where u.documento=?"); //Sentecia sql
            $query->bindParam(1, $documento); //Paso el documento al parametro de la setencia sql
            $query->execute(); //Ejecuta la senecia sql
            return empty($query->fetchAll()); //Se valida si la sencia ejecutada retorna algun valor
        } catch (Exception $ex) {
            echo $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function login($documento, $clave) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("SELECT * FROM usuarios WHERE documento=? AND clave=?"); //Sentecia sql
            $query->bindParam(1, $documento); //Paso el documento al parametro de la setencia sql
            $query->bindParam(2, $clave); //Paso el documento al parametro de la setencia sql
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetch();
        } catch (Exception $ex) {
            echo $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function registrarUsu(UsuarioDTO $usuDto) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into usuarios values('',?,?,?,?)"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $usuDto->getNombre());
            $query->bindParam(2, $usuDto->getApellido());
            $query->bindParam(3, $usuDto->getDocumento());
            $query->bindParam(4, $usuDto->getClave());
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Usuario registrado con existo."; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function listarUsu() {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select * from usuarios"); //Sentecia sql
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetchAll(); //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function validarappusu($id_usu, $id_app) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select cod_app from applicausuario where cod_usu = ? and cod_app = ?"); //Sentecia sql
            $query->bindParam(1, $id_usu);
            $query->bindParam(2, $id_app);
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

    public function agregarPermiso(Applicausuario $usuapp) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("insert into applicausuario values(?,?)"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $usuapp->getCod_app());
            $query->bindParam(2, $usuapp->getCod_usu());
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Cambios realizados con existo.";
            ; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function eliminarPermiso(Applicausuario $usuapp) {
//      llamado a la metodo estatitico para adquirir la conexion
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("DELETE FROM applicausuario WHERE cod_app =? AND cod_usu=?"); //Sentecia sql
            // Se pasan todos los parametros a la sentencia SQL
            $query->bindParam(1, $usuapp->getCod_app());
            $query->bindParam(2, $usuapp->getCod_usu());
            $query->execute(); //Ejecuta la senecia sql
            return "(S)Cambios realizados con existo.";
            ; //Se retrona mensaje de confirmacion del registro
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }

    public function list_appbyusu($id_usu) {
        $con = Conexion::getConexion();
        try {
            $query = $con->prepare("select ap.codigo, ap.nombre, ap.url from aplicaciones as ap join applicausuario as au on ( ap.codigo = au.cod_app and au.cod_usu =?)"); //Sentecia sql
            $query->bindParam(1, $id_usu);
            $query->execute(); //Ejecuta la senecia sql
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo ("(E) ") . $ex->getMessage(); // imprime el mensaje si ocurrio un error en el proceso
        }
    }
    
    public function crearPrograma(ProgramaDTO $crearPrograma) {
        $con = Conexion::getConexion();
        try{
            //Creacion, modificacion y eliminacion en la tabla de programas
            $opcion=$_REQUEST['op'];
            $t1_c=$_REQUEST['codigo'];
            $t2_c=$_REQUEST['Nombre'];

            echo "opcion:".$opcion;
            echo "<br>codigo:".$cod_c;
            echo "<br>Nombre:".$nom_c;

            if($opcion=='Insertar'){

                    $sql = "INSERT INTO programas (codigo,Nombre) VALUES ('$cod_c', '$nom_c')";

                    if ($con->query($sql) === TRUE) {
                        echo "Nuevo programa creado";
                    } 
                    else{
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }

                    echo "
                    <script>alert('Se inserto exitosamente');</script> ";
            }

            if($opcion=='Modificar')
            {	
                    $sql = "UPDATE  programas SET Nombre='$nom_c' WHERE codigo='$cod_c'";

                    if ($con->query($sql) === TRUE) {
                            echo "New record created successfully";
                    } else {
                            echo "Error: " . $sql . "<br>" . $con->error;
                    }

                    echo "
                    <script>alert('Se modifico exitosamente');</script>";


            }
            if($opcion=='Eliminar')
            {
                    $sql = "delete from  tabla1 where id='$t1_c'";

                    if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                    } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    echo "
                    <script>
                    alert('Se elimino exitosamente');
                    </script>
                    ";

            }

            echo " <script>location.href='ejemplo1.php';</script> ";
        } catch (Exception $ex) {

        }
    }

}
