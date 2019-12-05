<?php
	include("connect.php");
	$user = $_POST['usr'];
	$password = $_POST['pass'];
	
	if ($query = $conexion->prepare("SELECT COUNT(*) as existe, contrasenna FROM usuarios WHERE nombre = ?")) {
        $query->bind_param("s", $user);
        $query->execute();
        $query->bind_result($existe, $contraseña);
        $query->fetch();
        $query->close();

		if ($existe) {
            if ($password == $contraseña){
            //, password_hash($contraseña, PASSWORD_BCRYPT))) {
                session_start();
                $_SESSION['nombre'] = $user;
                $_SESSION['estado'] = true;
                ?>
                    <script>
                        location.href = "../index.php"
                    </script>
                <?php
            } 
            else {
                echo "usuario o contraseña incorrecta";
            }        
        } 
        else {
            echo "No se encontro el usuario";
        }
    }
?>