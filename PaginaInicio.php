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
                        <a><input type="button" value="Salir" onclick="Salir();"></a>
                    </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <table width="100%" heigth="100%" border="0">
                            <tbody>
                                <tr heigth="10%">
                                    <td width="20%" align="center">MIS BOTONES</td>
                                    <td><div>BIENVENIDO: <?php //echo $_SESSION["nombre"];?></div></td>
                                </tr>
                                <tr height="90%">
                                    <td valign="top" align="center">
                                        <table border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <input type="button" value="Asignacion de permisos" onclick="cargar('permisos.php')">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" value="Docentes" onclick="cargar('docentes.php')">   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <input type="button" value="Programas" onclick="cargar('programas.php')"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" value="Salones" onclick="cargar('salones.php')"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
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