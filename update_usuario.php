<?php
require 'php/connect.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    session_start();
    $estado = $_SESSION['estado'];

    if($estado == true){
        $id = $_GET['id'];
        $existe = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE id=$id");
        
        if(mysqli_num_rows($existe) === 1){

            foreach($existe as $dato)
            {
                
        ?>

        <!DOCTYPE html>
        <html lang="">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin user Dashboard</title>
        </head>

        <body>
            <div class="container">
            
            <!-- UPDATE DATA -->
                <div class="form">
                    <h2>Update Data</h2>
                    <form action="cargar_update_usuario.php" method="post">
                        <input type="text" hidden name="id" value="<?php echo $dato['id']; ?>">
                        <strong>Correo</strong><br>
                        <input type="text" name="correo" placeholder="Escribi el correo" required value="<?php echo $dato['correo']; ?>"><br>
                        <strong>Nombre</strong><br>
                        <input type="text" name="nombre" placeholder="Escribi el nombre" required value="<?php echo $dato['nombre']; ?>"><br>
                        <strong>Contraseña</strong><br>
                        <input type="password" name="contrasenna" placeholder="Escribi la contraseña" required value="<?php echo $dato['contrasenna']; ?>"><br>
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
