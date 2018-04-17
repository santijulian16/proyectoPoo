<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Proyecto POO | Registrar Usuario</title>
        <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/formValidation.css" rel="stylesheet" type="text/css"/>
        <script src="js/formValidation.min.js"></script>
        <script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrapValidator.js" type="text/javascript"></script>
        <script src="js/es_ES.js" type="text/javascript"></script>
        <script>
            $().ready(function () {
                $('#regitrarusu').formValidation({
                    err: {container: 'tooltip'},
                    icon: {valid: 'fa fa-check-circle', invalid: 'fa fa-times-circle', validating: 'fa fa-refresh'},
                    locale: 'es_ES',
                    fields: {
                        nombre: {
                            row: '.form-group',
                            validators: {
                                notEmpty: {},
                                regexp: {
                                    regexp: '^[A-Za-z ñÑáéíúó]+$',
                                    message: 'Solo letra, sin números o caracteres especiales'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 25
                                }
                            }
                        },
                        apellido: {
                            row: '.form-group',
                            validators: {
                                notEmpty: {},
                                regexp: {
                                    regexp: '^[A-Za-z ñÑáéíúó]+$',
                                    message: 'Solo letra, sin números o caracteres especiales'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 25
                                }
                            }
                        },
                        documento: {
                            row: '.form-group',
                            validators: {
                                notEmpty: {},
                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message: 'Solo números, sin caractéres especiales'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 11
                                }
                            }
                        },
                        password: {
                            row: '.form-group',
                            validators: {
                                notEmpty: {},
                                stringLength: {
                                    min: 6,
                                    max: 25
                                }
                            }
                        },
                        password_rep: {
                            row: '.form-group',
                            validators: {
                                notEmpty: {},
                                identical: {
                                    field: 'password',
                                    message: 'Las contraseñan no coinciden'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </head>
    <body style="background-color: #E0E0E0;">        
        <?php
        if (isset($_GET['msj'])) {
            if (substr($_GET['msj'], 1, 1) == "S") {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $_GET['msj'] . '</div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $_GET['msj'] . '</div>';
            }
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <h1><i class="fa fa-user-plus"></i> Registrar Usuario</h1>
                    <br />
                    <form id="regitrarusu" action="controladores/controlador.php" method="post">
                        <div class="form-group">
                            <label for="documento">Nombre</label>
                            <input type="text" placeholder="Juan" id="nombre" name="nombre" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="documento">Apellido</label>
                            <input type="text" placeholder="Perez" id="apellido" name="apellido" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="documento">Documento de Identidad</label>
                            <input type="text" placeholder="123456" id="documento" name="documento" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" placeholder="********" id="password" name="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Repita la Contraseña</label>
                            <input type="password" placeholder="********" id="password_rep" name="password_rep" class="form-control" />
                        </div>
                        <br />
                        <div class="col-md-6 pull-right">
                            <button type="submit" id="regusu" name="regusu" class="btn btn-success">Registrar <i class="fa fa-sign-in"></i></button>
                        </div>
                    </form>
                    <div class="col-md-6 pull-left">
                        <a href="index.php" class="btn btn-link"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

