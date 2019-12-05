<?php
    require 'php/connect.php';
    session_start();
    $estado = $_SESSION['estado'];

    if($estado == true){
        $id = $_POST["id"];
        $correo = $_POST["correo"];
        $nombre = $_POST["nombre"];
        $contrasenna = $_POST["contrasenna"];

        $sql = "UPDATE usuarios SET correo = '$correo', nombre = '$nombre' , contrasenna = '$contrasenna' WHERE id = $id";

        $query = mysqli_query($conexion, $sql);
        
        if($query){
            ?>
        <script>
            location.href="panel_usuario.php";
        </script>
            <?php
        }else{
            echo "mal";
        }
    }

?>