<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no">
        <title>Programas</title>
        <link href="../../css/font-awesome.css" rel="stylesheet" type="text/css"/>
            <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <script src="../../js/jquery-1.12.0.min.js" type="text/javascript"></script>
            <script src="../../js/bootstrap.js"></script>
        <link href="css/formValidation.css" rel="stylesheet" type="text/css"/>
        <script>
//            script para realizar validaciones de formularios
            $().ready(function () {
                $('#insertarPrograma').formValidation({
                    err: {container: 'tooltip'},
                    icon: {valid: 'fa fa-check-circle', invalid: 'fa fa-times-circle', validating: 'fa fa-refresh'},
                    locale: 'es_ES',
                    fields: {
                        codigo: {
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
                        }
                    }
                });
            });
        </script>
    </head>
    <body style="background-color: #E0E0E0;">        
        <?php
//        valido el tipo de mensaje si satifactorio (S) o con error (E) para mostrar alerta roja o verde con el mensaje que viene por GET
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
                </ul>   
            </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <h1><i class="fa fa-user-plus"></i> Agregar programa</h1>
                    <br />
                    <form id="insertarPrograma" action="/controladores/controladorProgramas.php" method="post">
                        
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" placeholder="123" id="codigo" name="codigo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" placeholder="Programa..." id="Nombre" name="Nombre" class="form-control" />
                        </div>
                       
                        
                       
                        <br />
                        <div class="col-md-6 pull-right">
                            <button type="submit" id="insertarPrograma" name="insertarPrograma" class="btn btn-success">Guardar   <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                    <div class="col-md-6 pull-left">
                        <a href="programas.php" class="btn btn-link"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

