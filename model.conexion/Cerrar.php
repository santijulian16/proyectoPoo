<?php
    session_start();
    session_destroy(); 
    session_unset();

    echo "<script>
            alert('Gracias por visitarnos');
            location.href='../index.php';
         </script>";
    exit;

?>