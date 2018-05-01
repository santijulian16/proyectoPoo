<?php
 session_start();
 include './model.conexion/Conexion.php';
 
 if(isset($_SESSION['user'])){?>
<!DECTYPE html>
<html>
    <head>
        <title>CONTENIDO</title>
        <meta charset="utf-8">
   </head>
   ?>
   <body>
       <div>
           <article>
               
               <p>
                   el parrafo todo no es necesario aun 
               </p>
           </article>
           <a href="logout.php"><button>salir</button></a>
       </div>
   </body>
</html>
 <?php } ?>
