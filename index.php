<!DOCTYPE html>
<?php
include './model.conexion/Conexion.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio | Proyecto POO</title>
        <!--        <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/formValidation.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: #E0E0E0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <br />
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="controladores/controlador.php" method="post">
                        <div class="form-group">
                            <label for="documento">Documento de Identidad</label>
                            <input type="text" placeholder="123456" id="documento" name="documento" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" placeholder="********" id="password" name="password" class="form-control" />
                        </div>
                        <br />
                        <div class="col-md-6 pull-right">
                            <button type="submit" id="login" name="login" class="btn btn-success">Iniciar Sesión <i class="fa fa-sign-in"></i></button>
                        </div>
                    </form>
                    <div class="col-md-6 pull-left">
                        <a href="registrarUsuario.php" class="btn btn-warning">Registrar Usuario</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

