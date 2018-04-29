<!DOCTYPE html>
<?php
include './model.conexion/Conexion.php';
//$id = $_SESSION["idusuario"];
include './model.DAO/usuariosDAO.php';
?>
<script>
    function Salir(){
        document.form.action='index.php';
	document.form.submit();
    }
</script>
<html>
    <head><title>Pagina Inicio</title></head>
        <body style="background-color: #E0E0E0;">
            <h1><div style = "border: 25px solid #82E0AA;">Bienvenido: <?php //echo $_SESSION["nombre"];?></div> </h1>
            <?php
            /*
               $sql = "SELECT a.nombre nombre,a.url url FROM usuarios u, usu_apli up where a.id=up.id_apli and up.id_usuario=u.id and u.id=$id";
                $result = $conn->query($sql);
                $total=$result->num_rows;
                if($total>0)
                {
                        echo "
                        <table border=0>
                        <tr>
                        <td>mis botones</td>
                        </tr>
                        ";

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
                }	*/
            ?>
                    <div class="col-md-6 pull-left">
                        <a style="position: relative; align-content: center; " href="index.php" class="btn btn-link"><i class="fa fa-arrow-left"></i> Salir</a>
                    </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">

                        <form id="mostrarnombre" method="post" action="../../controladores/controlador.php">
                            <div>
                                <table style="border:500px; width: 100%; height: auto; border-collapse: collapse; margin: 10px; font-family:Lucida Sans Unicode, Lucida Grande, Sans-Serif;
                                font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; "  >
                                    <tr style = "background: #d0dafd; color: #339;">
                                        <td rowspan = "50" style = "background: #F8C471;"> campo de muestra</td>
                                        <td><label for="permisos">Permisos de usuarios</label></td>    
                                        <tr style = "background: #d0dafd; color: #339;"><td><label for="docentes">Docentes</label></td></tr>
                                        <tr style = "background: #d0dafd; color: #339;"><td><label for="salones">Salones</label></td></tr>  
                                        <tr style = "background: #d0dafd; color: #339;"><td><label for="asignacion_salones">Asignacion de salones</label></td></tr>
                                        <tr></tr>
                                            
                                </table>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>

        </body>
</html>