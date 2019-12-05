<?php
require 'php/connect.php';
//Me fijo si tiene insertado valores
if(isset($_POST['titulo']) && isset($_POST['marca']) && isset($_POST['anno']) && isset($_POST['precio']) && isset($_POST['imagen'])){
    
    
    if(!empty($_POST['titulo']) && !empty($_POST['marca']) && !empty($_POST['anno']) && !empty($_POST['precio'])){
        
        // Escape special characters.
        $titulo = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['titulo']));
        $marca = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['marca']));
        $anno = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['anno']));
        $precio = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['precio']));
        $imagen = mysqli_real_escape_string($conexion, htmlspecialchars($_POST['imagen']));
        
         // INSERT USERS DATA INTO THE DATABASE
         $insert_query = mysqli_query($conexion,"INSERT INTO motos VALUES('','$titulo','$marca',$anno,'$precio','NULL')");

         //CHECK DATA INSERTED OR NOT
         if($insert_query){
             echo "<script>
             alert('Datos insertados');
             window.location.href = 'panel.php';
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