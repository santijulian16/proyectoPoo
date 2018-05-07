<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
include '../../model.DAO/programasDAO.php';


if (isset($_POST['modificarPrograma'])) {
    ?>

    <html lang="es">    
        <head>
            <meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no">
            <title>Modificacion del programa</title>
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
                    <li role="presentation"><a href="PaginaInicio.php">Inicio</a></li>
                    <?php
                    $proDao = new ProgramasDAO();
                    $lisprogra = $proDao->listarProgramas();

                    foreach ($lisprogra as $cod_p) {
                        if ($cod_p['codigo'] == 1) {
                            ?>
                            <li role="presentation" class="active"><a href="/ProyectoPoo/<?php echo $aplicacion['url']; ?>"><?php echo $cod_p['codigo']; ?></a></li>
                        <?php } else { ?>
                            <li role="presentation"><a href="/ProyectoPoo/<?php echo $cod_p['url']; ?>"><?php echo $cod_p['codigo']; ?></a></li>
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
                    <form id="modificarPrograma" method="post" action="../../controladores/controladorProgramas.php">
                        <?php
                            $proDao = new ProgramasDAO();
                            $cod_p = $_POST['modificarPrograma'];
                        ?>                        
                            <input type="hidden" id="codigo" name="codigo" value="<?php echo $cod_p; ?>" />
                        <?php
                            $lisprogra = $proDao->listarProgramas();
                            foreach ($listapp as $modificarPrograma) {
                                $cod_p = $modificarPrograma['codigo'];
                                $extapp = $proDao->modificarPrograma($cod_p, $nom_p);
                        ?>
                                <div class="form-group">
                                    <input type="text" <?php echo 'codigo="' . $modificarPrograma['codigo'] . '" '; ?> >
                                    <input type="text" <?php echo 'Nombre="' . $modificarPrograma['Nombre'] . '" '; ?> >
                                    <label for="<?php echo $modificarPrograma['codigo']; ?>"> <?php echo $modificarPrograma['Nombre']; ?> </label>

                                </div>
                        <?php } ?>
                        <input type="text" style="display: none;" id="docusu" name="docusu" />
                        <div class="col-md-6 pull-right">
                            <button type="submit" id="modificarPrograma" name="modificarPrograma" class="btn btn-success">Guardar Cambios <i class="fa fa-save"></i></button>
                        </div>
                    </form>                    
                    <div class="col-md-6 pull-left">
                        <a href="programas.php" class="btn btn-link"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </body>
    </html>    
    <?php
        } else {
            header("Location: programas.php");
        }
    ?>
