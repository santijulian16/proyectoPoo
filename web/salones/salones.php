<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
include '../../model.DAO/salonesDao.php';
session_start();
if (isset($_SESSION['user'])) {
    ?>
    <html lang="es">    
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no">
            <title>Salones | Proyecto POO</title>
            <!--        <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">-->
            <!--<link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>-->
            <link href="../../css/font-awesome.css" rel="stylesheet" type="text/css"/>
            <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <script src="../../js/jquery-1.12.0.min.js" type="text/javascript"></script>
            <script src="../../js/bootstrap.js"></script>
            <link href="../../css/bootstrap-table.css" rel="stylesheet" type="text/css"/>
            <script src="../../js/bootstrap-table.js"></script>
            <script src="../../js/bootstrap-table-ca-ES.js"></script>
            <script>
                function eliminar(idsal) {
                    $('#eliminarm').modal('show');
                    document.getElementById("eliminar").value = idsal;
                }
            </script>
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
                            <a href="../cerrar.php" class="btn btn-success"><i class="fa fa-sign-in"></i> Cerrar Sesion </a>
                        </ul>
                    </div>
                </div>
            </nav> 
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="../PaginaInicio.php">Inicio</a></li>
                    <?php
                    $usuDao = new UsuariosDAO();
                    $cos_usu = $_SESSION['user'];
                    $lstappu = $usuDao->list_appbyusu($cos_usu);

                    foreach ($lstappu as $aplicacion) {

                        if ($aplicacion['codigo'] == 2) {
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
                <div class="col-md-10">
                    <?php
//        valido el tipo de mensaje si satifactorio (S) o con error (E) para mostrar alerta roja o verde con el mensaje que viene por GET
                    if (isset($_GET['msj'])) {
                        if (substr($_GET['msj'], 1, 1) == "S") {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $_GET['msj'] . '</div>';
                        } else if (substr($_GET['msj'], 1, 1) == "E") {
                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $_GET['msj'] . '</div>';
                        }
                    }
                    ?>

                    <a class="btn btn-primary" href="salonfrm.php?opr=ins"> <i class="fa fa-plus"></i> Agregar Salon</a>
                    <br />
                    <table data-toggle="table"
                           data-show-columns="true"
                           data-minimum-count-columns="2"
                           data-id-field="id"
                           data-search="true"
                           data-show-refresh="true" 
                           data-show-toggle="true"
                           data-sort-name="nombre"
                           data-sort-order="asc"
                           data-pagination="true"
                           data-page-size="10"
                           data-page-list="[10,25,40,50,100,1000]"
                           >
                        <caption>Lista de Salones</caption>
                        <thead>
                            <tr>
                                <th data-field="codigo" data-sortable="true">Codigo</th>
                                <th data-field="nombre" data-sortable="true">Nombre</th>
                                <th data-field="estado" data-sortable="true">Estado</th>
                                <th data-field="edificio" data-sortable="true">Edificio</th>
                                <th data-field="modificar">Modificar</th>
                                <th data-field="eliminar">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $saldao = new SalonesDao();
                            $lissal = $saldao->listarSal();

                            foreach ($lissal as $salon) {
                                ?>
                                <tr>
                                    <td><?php echo $salon['codigp']; ?></td>
                                    <td><?php echo $salon['nombre']; ?></td>
                                    <td><?php echo $salon['estado']; ?></td>
                                    <td><?php echo $salon['edi_codigo']; ?></td>
                                    <td><a href="salonfrm.php?id=<?php echo $salon['codigp'] + '?nom=' + $salon['nombre'] + "?estado" + $salon['estado'] + "?ed_cod" + $salon['estado']; ?>?opr=mod"><i class="fa fa-pencil fa-lg"></i></a></td>
                                    <td><a onclick="eliminar('<?php echo $salon['codigp']; ?>')" href="#"><i class="fa fa-trash fa-lg"></i></a></td> 
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="modal fade" id="eliminarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                </div>
                                <form id="formelim" action="../../controladores/saloncontrolador.php" method="post">
                                    <div class="modal-body">
                                        ¿Desea eliminar este salon?
                                        <input hidden="true" id="eliminar" name="eliminar">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="sumbit" class="btn btn-danger" id="elim" name="elim"><i class="fa fa-trash"></i>&nbsp;Eliminar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html> 
<?php } ?>

