<!DOCTYPE html>
<?php
include './model.conexion/Conexion.php';
//$id = $_SESSION["idusuario"];
include './model.DAO/usuariosDAO.php';
?>
<html>
    <head>
        <title>Pagina Inicio</title>          
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
        <script>
            function Cerrar Sesion() {
                document.form.action = 'index.php';
                document.form.submit();
            }
            function cargar(b) {
                ifr.location.href = b;
            }
        </script>
    </head>
    <body style="background-color: #E0E0E0;">

        <div class="col-md-6 pull-left" style="padding: 40px;">
            <a align="right" href="index.php" class="btn btn-success"><i class="fa fa-sign-in"></i> Cerrar Sesion </a>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <table width="100%" heigth="100%" border="0">
                        <tbody>
                            <tr heigth="10%">
                                <td width="20%" align="center" style="background-color: #FAD7A0">MIS BOTONES</td>
                                <td><div style="padding: 15px; background-color: #82E0AA">BIENVENIDO <?php //echo $_SESSION["nombre"]; ?></div></td>
                            </tr>
                            <tr height="90%">
                                <td valign="top" align="center">
                                    <?php
                                    /*
                                      $sql = "SELECT a.nombre nombre,a.url url FROM usuarios u,aplicaciones a, usu_apli up where a.id=up.id_apli and up.id_usuario=u.id and u.id=$id";
                                      $result = $con;
                                      $total=$result->num_rows;
                                      if($total>0)
                                      {
                                      echo "
                                      <table border=0>";

                                      for($i=1;$i<=$total;$i++)
                                      {
                                      $row = $result->fetch_assoc();
                                      $nombre_c=$row["nombre"];
                                      $url_c=$row["url"];

                                      echo "
                                      <tr>
                                      <td align=center><input type=button value='$nombre_c' onclick=cargar('$url_c');></td>
                                      </tr>
                                      ";
                                      }
                                      echo "
                                      </table>
                                      ";
                                      } */
                                    ?>
                                    <table border="0">
                                        <tbody>
                                            <tr>
                                                <td align="right">
                                                    <input type="button" value="Asignacion de permisos" onclick="cargar('permisos.php')">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                    <input type="button" value="Docentes" onclick="cargar('docentes.php')">   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right"> 
                                                    <input type="button" value="Programas" onclick="cargar('programas.php')"> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                    <input type="button" value="Salones" onclick="cargar('salones.php')"> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                    <input type="button" value="Edificios" onclick="cargar('Edificios.php')"> 
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <iframe name="ifr" id="ifr" width="100%" height="100%">

                                    </iframe>
                                </td>
                            </tr>
                        </tbody>
                    </table>   

                </div>
            </div>
        </div>

    </body>
</html>