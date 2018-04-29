<!DOCTYPE html>
<html>
    <head><title>Pagina Inicio</title></head>
        <body>
            <h1><i class="fa fa-user-plus"></i> Bienvenido: <?php echo $_SESSION["nom"];?> </h1>
                <tr height=10%>
                    <td width=20% align=center><input type=button value='Salida segura' onclick='finalizar();'> </td>
                        <br />
                            <form id="regitrarusu" action="controladores/controlador.php" method="post"></form>       
                    <td></td>
                </tr>

            <?php

            ?>

        </body>
</html>