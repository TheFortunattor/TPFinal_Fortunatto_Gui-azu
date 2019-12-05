<?php
require 'php/connect.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    session_start();
    $estado = $_SESSION['estado'];

    if($estado == true){
        $id = $_GET['id'];
        $existe = mysqli_query($conexion,"SELECT * FROM `motos` WHERE id=$id");
        
        if(mysqli_num_rows($existe) === 1){

            foreach($existe as $dato)
            {
                
        ?>

        <!DOCTYPE html>
        <html lang="">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editando moto</title>
        </head>

        <body>
            <div class="container">
            
            <!-- UPDATE DATA -->
                <div class="form">
                    <h2>Update Data</h2>
                    <form action="cargar_update.php" method="post">
                        <input type="text" hidden name="id" value="<?php echo $dato['id']; ?>">
                        <strong>Titulo</strong><br>
                        <input type="text" name="titulo" placeholder="Escribi el titulo" required value="<?php echo $dato['titulo']; ?>"><br>
                        <strong>Marca</strong><br>
                        <input type="text" name="marca" placeholder="Escribi el mail" required value="<?php echo $dato['marca']; ?>"><br>
                        <strong>Año</strong><br>
                        <input type="text" name="anno" placeholder="Pone el año" required value="<?php echo $dato['anno']; ?>"><br>
                        <strong>Precio</strong><br>
                        <input type="text" name="precio" placeholder="El precio de la historia" required value="<?php echo $dato['precio']; ?>"><br>
                        <strong>Imagen</strong><br>
                        <input type="file" name="imagen" placeholder="Elegi la imagen" value="<?php echo $dato['imagen']; ?>"><br>
                        <input type="submit" value="Update">
                    </form>
                </div>
                <!-- END OF UPDATE DATA SECTION -->
        </body>    
    </html>
        <?php
            }
        }
    }
}
?>
