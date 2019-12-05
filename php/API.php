<?php
    include("connect.php");
   if (!$conexion) {
       die("Connection failed: " . mysqli_connect_error());
   }
   
   $sql = "SELECT * FROM motos";
   $result = mysqli_query($conexion, $sql);
   
   if (mysqli_num_rows($result) > 0) {
       $rows = array();
       foreach($result as $row) 
       {
           $rows[] = $row;
       }
   
       echo json_encode($rows);
   } else {
       echo "no results found";
   }
   
   mysqli_close($conexion);
   
?>