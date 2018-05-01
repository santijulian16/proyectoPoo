<?php

session_start();

include './model.conexion/Conexion.php';

if(isset($_SESSION['user'])){
 
echo '<script> windows.location="panel.php";</script>';

}


?>

<!DOCTYPE html>

<html>
    
<head>
       
 <title>login Admin </title> 
       
 <meta charset="utf-8">
    
 </head>
    
 <body>
         
<h1 class="h1" style="color:white">LOGIN</h1>
        
 <form method="post" action="validar.php"
       
        <imput type="text" class="form-control" name="user" autocomplete="off" required><br><br>
 
        <imput type="password" class="form-control" name="pw" autocomplete="off" required><br><br>
              
        <imput type="submit" class="btn btn-success" name="login" value="ENTRAR"> 
        
    </form>
  </body>
    

</html>




