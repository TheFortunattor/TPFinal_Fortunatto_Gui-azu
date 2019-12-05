<?php
    require 'php/connect.php';
    session_start();
    $estado = $_SESSION['estado'];

    if($estado == true){
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $marca = $_POST["marca"];
        $anno = $_POST["anno"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];

        $sql = "UPDATE motos SET titulo = '$titulo', marca = '$marca' , anno = $anno, precio = $precio , imagen = 'img/$imagen' WHERE id = $id";

        $query = mysqli_query($conexion, $sql);
        
        if($query){
            ?>
        <script>
            location.href="index.php";
        </script>
            <?php
        }else{
            echo "mal";
        }
    }

?>