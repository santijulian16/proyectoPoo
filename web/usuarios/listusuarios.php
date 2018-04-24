<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
?>
<html lang="es">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Usuarios | Proyecto POO</title>
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
            function setdocumento(idusu) {
                document.getElementById("idusu").value = idusu;
                $("#usu").submit();
            }
        </script>
    </head>    
    <!--<body style="background-color: #E0E0E0;">-->
    <body>
        <form id="usu" method="post" action="permisos.php">
            <input type="text" style="display: none;" id="idusu" name="idusu" />
        </form>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <br />
                    <div class="col-md-12"> 
                        <h1>Lista de Usuario</h1>
                        <hr />
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
                            <thead>
                                <tr>
                                    <th data-field="documetno" data-sortable="true">Documento</th>
                                    <th data-field="nombre" data-sortable="true">Nombre</th>
                                    <th data-field="apellido" data-sortable="true">Apellido</th>
                                    <th data-field="permisos">Permisos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $usuDao = new UsuariosDAO();
                                $lisUsu = $usuDao->listarUsu();

                                foreach ($lisUsu as $usuario) {
                                    ?>
                                    <tr>
                                        <td><?php echo $usuario['documento']; ?></td>
                                        <td><?php echo $usuario['nombre']; ?></td>
                                        <td><?php echo $usuario['apellido']; ?></td>
                                        <td><center><button type="button" onclick="setdocumento(<?php echo $usuario['codigo']; ?>)" title="Asignar Permisos" class="btn btn-default"><i class="fa fa-unlock-alt"></i></button></center></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




