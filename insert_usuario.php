<?php
require 'php/connect.php';
//Me fijo si tiene insertado valores
if(isset($_POST['correo']) && isset($_POST['nombre']) && isset($_POST['contrasenna'])){
    
    
    if (!empty($_POST['correo']) && !empty($_POST['nombre']) && !empty($_POST['contrasenna'])){
        
        // Escape special characters.
        $correo = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['correo']));
        $nombre= mysqli_real_escape_string($conexion, htmlspecialchars($_POST['nombre']));
        $contrasenna = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['contrasenna']));
        
         // INSERT USERS DATA INTO THE DATABASE
         $insert_query = mysqli_query($conexion,"INSERT INTO usuarios VALUES('','$correo','$nombre','$contrasenna')");

         //CHECK DATA INSERTED OR NOT
         if($insert_query){
             echo "<script>
             alert('Datos insertados');
             window.location.href = 'panel_usuario.php';
             </script>";
             exit;
         }else{
             echo "<h3>Oh oh, algo salio mal!</h3>";
         }
        
    }else{
        echo "<h4>Por favor llene todos los campos</h4>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>