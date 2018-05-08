<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
include '../../model.DAO/programasDAO.php';
?>
<html lang="es">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Programas</title> 
        <link href="../../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.js"></script>
        <link href="../../css/bootstrap-table.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/bootstrap-table.js"></script>
        <script src="../../js/bootstrap-table-ca-ES.js"></script>
        <script>
            function setdocumento(idusu) {
                document.getElementById("idusu").value = idusu;
                $("#usu").submit();
            }
            function eliminar(idpro) {
                    $('#eliminarm').modal('show');
                    document.getElementById("eliminar").value = idpro;
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
        <form id="usu" method="post" action="programas.php">
            <input type="text" style="display: none;" id="idusu" name="idusu" />
        </form>

        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="../PaginaInicio.php">Inicio</a></li>
                <?php
                $usuDao = new UsuariosDAO();
                session_start();
                if (isset($_SESSION['user'])) {
                    $id_usu = $_SESSION['user'];
                }
                $lstappu = $usuDao->list_appbyusu($id_usu);

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
            <div class="col-md-10">
                <?php
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
                <a class="btn btn-primary" href="agregarPrograma.php?opr=ins"> <i class="fa fa-plus"></i> Agregar Programa</a>
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
                    <caption></caption>
                    <!--<div>
                        <tr>
                            <div>
                                <?php
                                    //$lisprogra = $usuDao->listarProgramas();
                                ?>
                                <th><input type="text" data-field="Codigo" placeholder="Codigo programa"></th>
                                <th><input type="text" data-field="Nombre" placeholder="Nombre programa"></th>
                                <th><center><button type="button" data-field="insertar" onclick="setcodigo(<?php //echo $usuario['codigo']; ?>), setNombre(<?php //echo $usuario['Nombre']; ?>)" title="Agregar Programa" class="btn btn-default"><i>Agregar Programa</i></button></center></th>
                            </div>
                        </tr>
                        <div>
                            <tr>
                                <th></th>
                            </tr>
                        </div>
                        </tr>
                    </div>-->
                    <thead>
                        <tr>
                            <th data-field="codigo" data-sortable="true">Codigo</th>
                            <th data-field="nombre" data-sortable="true">Nombre</th>
                            <th data-field="actualizar">Actualizar</th>
                            <th data-field="eliminar">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $proDao = new ProgramasDAO();
                        $lisprogra = $proDao->listarProgramas();
                        foreach ($lisprogra as $programa) {
                        ?>
                            <tr>
                                <td><?php echo $programa['codigo']; ?></td>
                                <td><?php echo $programa['Nombre']; ?></td>
                                <!--Validar nuevamente-->
                                <td><center><button type="button" onclick="setcodigo(<?php echo $programa['codigo']; ?>)" title="Actualizar" class="btn btn-default"><i class="fa fa-pencil fa-lg"></i></button></center></td>
                                <td><center><button type="button" onclick="eliminar(<?php echo $programa['codigo']; ?>)" title="Eliminar" class="btn btn-default"><i class="fa fa-trash fa-lg"></i></button></center></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    <!--Comprobar si funciona-->
                    <div class="modal fade" id="eliminarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                </div>
                                <form id="formelim" action="../../controladores/controladorProgramas.php" method="post">
                                    <div class="modal-body">
                                        ¿Desea eliminar este programa?
                                        <input hidden="true" id="eliminar" name="eliminar">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="sumbit" class="btn btn-danger" id="eliminarPrograma" name="eliminarPrograma"><i class="fa fa-trash"></i>&nbsp;Eliminar</button>
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

