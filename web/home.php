<!DOCTYPE html>
<?php
include '../model.conexion/Conexion.php';
include '../model.DAO/usuariosDAO.php';
include '../model.DAO/aplicacionesDao.php';
?>
<html lang="es">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Pagina Principal | Proyecto POO</title>
        <!--        <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">-->
        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js"></script>
    </head>
    <body>
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
        </div>
    </body>
</html> 

