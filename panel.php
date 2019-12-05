<?php
require 'php/connect.php';
// function for getting data from database
function get_all_data($conexion){
    $get_data = mysqli_query($conexion,"SELECT * FROM `motos`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Titulo</th>
                <th>Marca</th> 
                <th>Año</th>
                <th>Precio</th>
                <th>Imagen</th>
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['titulo'].'</td>
            <td>'.$row['marca'].'</td>
            <td>'.$row['anno'].'</td>
            <td>'.$row['precio'].'</td>
            <td>'.$row['imagen'].'</td>
            <td>
            <a href="update.php?id='.$row['id'].'">Edit</a> |
            <a href="delete.php?id='.$row['id'].'">Delete</a>
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
    <title>Admin motos Dashboard</title>
</head>

<body>
    <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post">
                <strong>Titulo</strong><br>
                <input type="text" name="titulo" placeholder="Escribi el titulo" required><br>
                <strong>Marca</strong><br>
                <input type="text" name="marca" placeholder="Escribi el mail" required><br>
                <strong>Año</strong><br>
                <input type="text" name="anno" placeholder="Pone el año" required><br>
                <strong>Precio</strong><br>
                <input type="text" name="precio" placeholder="El precio de la historia" required><br>
                <strong>Imagen</strong><br>
                <input type="file" name="imagen" placeholder="Elegi la imagen" required><br>
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