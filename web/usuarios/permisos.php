<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
include '../../model.DAO/aplicacionesDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['idusu'])) {
    ?>

    <html lang="es">    
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no">
            <title>Asiganación de Permisos | Proyecto POO</title>
            <!--        <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">-->
            <link href="../../css/font-awesome.css" rel="stylesheet" type="text/css"/>
            <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <script src="../../js/jquery-1.12.0.min.js" type="text/javascript"></script>
            <script src="../../js/bootstrap.js"></script>
        </head>
        <body>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h2>Proyecto POO</h2>
                    </div>
                </div>
            </nav> 
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="../PaginaInicio.php">Inicio</a></li>
                    <?php
                    $usuDao = new UsuariosDAO();
                    $lstappu = $usuDao->list_appbyusu(3);

                    foreach ($lstappu as $aplicacion) {
                        if ($aplicacion['codigo'] == 1) {
                            ?>
                            <li role="presentation" class="active"><a href="/ProyectoPoo/<?php echo $aplicacion['url']; ?>"><?php echo $aplicacion['nombre']; ?></a></li>
                        <?php } else { ?>
                            <li role="presentation"><a href="/ProyectoPoo/<?php echo $aplicacion['url']; ?>"><?php echo $aplicacion['nombre']; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>   
            </div>
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Lista de Permisos</h4>
                    <hr />
                    <form id="permisos" method="post" action="../../controladores/controlador.php">
                        <?php
                        $usudao = new UsuariosDAO();
                        $appdao = new AplicacionesDao();
                        $idusu = $_POST['idusu'];
                        ?>                        
                        <input type="hidden" id="idusu" name="idusu" value="<?php echo $idusu; ?>" />
                        <?php
                        $listapp = $appdao->listaraplicaciones();
                        foreach ($listapp as $aplicacion) {
                            $idapp = $aplicacion['codigo'];
                            $extapp = $usudao->validarappusu($idusu, $idapp);
                            ?>
                            <div class="form-group">
                                <input type="checkbox" <?php
                                echo 'id="' . $aplicacion['codigo'] . '" ';
                                echo 'name="' . $aplicacion['codigo'] . '" ';
                                if ($extapp) {
                                    echo 'checked="checked"';
                                }
                                ?> > 
                                <label for="<?php echo $aplicacion['codigo']; ?>"> <?php echo $aplicacion['nombre']; ?> </label>

                            </div>
                        <?php } ?>
                        <input type="text" style="display: none;" id="docusu" name="docusu" />
                        <div class="col-md-6 pull-right">
                            <button type="submit" id="guadarperm" name="guadarperm" class="btn btn-success">Guardar Cambios <i class="fa fa-save"></i></button>
                        </div>
                    </form>                    
                    <div class="col-md-6 pull-left">
                        <a href="listusuarios.php" class="btn btn-link"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </body>
    </html>    
    <?php
} else {
    header("Location: listusuarios.php");
}
?>
