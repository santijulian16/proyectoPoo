<!DOCTYPE html>
<?php
include '../../model.conexion/Conexion.php';
include '../../model.DAO/usuariosDAO.php';
?>
<html>
<head>
    <title>TABLA DE DATOS</title>
</head>    
    <body>
        <center>
           <table border="3">
               <thead>
                   <tr>
                       <th colspan="1"><a href="formulario.php">NUEVO</a></th>
                       <th colspan="5">LISTA DE EDIFICIOS</th>
                   </tr>
             </thead>
              <tbody>
                  <tr>
                      <td>ID</td>
                      <td>NOMBRE</td>
                      <td>DISPONIBLE</td>
                      <td colspan="2">OPERACIONES</td>
                      
                      
                      
                  </tr>
                  <?php

                  
                  $query="SELECT * FROM sedes";
                  $resultado= $conexion->query($query);
                  while($row=$resultado->fetch_assoc()){
                      ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['nombre']; ?></td>
                          <td><?php echo $row['estado']; ?></td>
                          <td><a href="modificar.php?id=<?php echo $row['id']; ?>">MODIFICAR</a></td>
                          <td><a href="eliminar.php?id=<?php  echo $row['id']; ?>">ELIMINAR</a></td>
                          
                      </tr>
                      
                      <?php
                  }
                       ?>
              </tbody>
               
               
           </table>
                
                
            
            
        </center>
    </body>
    
</html>