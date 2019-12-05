<?php
require 'php/connect.php';
// function for getting data from database
function get_all_data($conexion){
    $get_data = mysqli_query($conexion,"SELECT * FROM `usuarios`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Correo</th>
                <th>Nombre</th> 
                <th>Contraseña</th>
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['correo'].'</td>
            <td>'.$row['nombre'].'</td>
            <td>'.$row['contrasenna'].'</td>
            <td>
            <a href="update_usuario.php?id='.$row['id'].'">Edit</a> |
            <a href="delete_usuario.php?id='.$row['id'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No se encontraron datos, por favor inserte algun dato.</h3>";
    }
}
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
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert_usuario.php" method="post">
                <strong>Correo</strong><br>
                <input type="text" name="correo" placeholder="Escribi el Correo" required><br>
                <strong>Nombre</strong><br>
                <input type="text" name="nombre" placeholder="Escribi el Nombre" required><br>
                <strong>Contraseña</strong><br>
                <input type="password" name="contrasenna" placeholder="Escribi la contraseña" required><br>            
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>Show Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conexion); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
</body>

</html>