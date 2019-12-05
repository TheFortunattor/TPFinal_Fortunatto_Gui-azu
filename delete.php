<?php
require 'php/connect.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $delete_user = mysqli_query($conexion,"DELETE FROM motos WHERE id='$userid'");
    
    if($delete_user){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'panel.php';
        </script>";
        exit;
    }else{
       echo "Opps something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>