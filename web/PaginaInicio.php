<!DOCTYPE html>
<?php
include '../model.conexion/Conexion.php';
include '../model.DAO/usuariosDAO.php';
session_start();
if (isset($_SESSION['user'])) {
    ?>
    <html>
        <head>
            <title>Pagina Inicio</title>          
            <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
            <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
            <script src="../js/bootstrap.js"></script>
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
        <body>

            <!--       <div class="col-md-6 pull-left" style="padding: 40px;">
                       <a align="right" href="model.conexion/Cerrar.php" class="btn btn-success"><i class="fa fa-sign-in"></i> Cerrar Sesion </a>
                   </div>
           
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <table width="100%" heigth="100%" border="0">
                                   <tbody>
                                       <tr heigth="10%">
                                           <td width="20%" align="center" style="background-color: #FAD7A0">MIS BOTONES</td>
                                           <td><div style="padding: 15px; background-color: #82E0AA">BIENVENIDO <?php //echo $_SESSION["nombre"];              ?></div></td>
                                       </tr>
                                       <tr height="90%">
                                           <td valign="top" align="center">
            <?php
//        $usuDao = new UsuariosDAO();
//        session_start();
//        if (isset($_SESSION['user'])) {
//            $id_usu = $_SESSION['user'];
//        }
//        $listapp = $usuDao->list_appbyusu($id_usu);
//        if (!empty($listapp)) {
//            echo "<table border=0>";
//            foreach ($listapp as $aplicacion) {
////                                    $row = $result->fetch_assoc();
//                $nombre_c = $aplicacion["nombre"];
//                $url_c = $aplicacion["url"];
//
//                echo "
//                                      <tr>
////                                     <td align=center><button type='button' onclick='cargar(/ProyectoPoo/web/usuarios/$url_c)'>$nombre_c</button></td>
//                                      </tr>
//                                     ";
//            }
//            echo "</table>";
//        }

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
                                                           <td>
                                                               <input type="button" class='btn btn-default' value="Asignacion de permisos" onclick="cargar('permisos.php')">
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>
                                                               <input type="button" class='btn btn-default' value="Docentes" onclick="cargar('docentes.php')">   
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td> 
                                                               <input type="button" class='btn btn-default' value="Programas" onclick="cargar('programas.php')"> 
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>
                                                               <input type="button" class='btn btn-default' value="Salones" onclick="cargar('salones.php')"> 
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>
                                                               <input type="button" class='btn btn-default' value="Edificios" onclick="cargar('Edificios.php')"> 
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
                   </div>-->


            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h2>Proyecto POO</h2>   
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <br />
                            <a href="cerrar.php" class="btn btn-success"><i class="fa fa-sign-in"></i> Cerrar Sesion </a>
                        </ul>
                    </div>
                </div>
            </nav> 
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="home.php">Inicio</a></li>
                    <?php
                    $usuDao = new UsuariosDAO();
                    
                $cos_usu = $_SESSION['user'];
                    $lstappu = $usuDao->list_appbyusu($cos_usu);
                    foreach ($lstappu as $aplicacion) {
                        ?>
                        <li role="presentation"><a href="/ProyectoPoo/<?php echo $aplicacion['url']; ?>"><?php echo $aplicacion['nombre']; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>   
            </div>
            <div class="container">
                <div class="col-md-10" style="background-color: #82E0AA">
                    <br />
                    <h3>BIENVENIDO <?php echo $_SESSION["nombre"]; ?></h3>
                    <br />
                </div>
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: ../index.php");
}?>