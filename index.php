<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="css/catalogo.css">
    <title>Motor G</title>
</head>

<body>
    <header>
        <a href="#">INICIO</a>

        <?php
            session_start();

            if(isset($_SESSION['estado'])){
                if($_SESSION['estado'] == true){
                ?>
                <div style="display:flex;">
                    <button class="button" style="margin-right:18px;" onclick="location.href='panel_usuario.php'">Gestion de Usuarios</button>
                    <button class="button" style="margin-right:14px;" onclick="location.href='panel.php';">Panel de Control</button>
                    <button class="button" onclick="logout();">Cerrar Session</button>
                </div>
                <?php
                }
                else{
                ?>
                <button class="button" onclick="login();">Iniciar Session</button>
                <?php
                }
            }else{
            ?>
                <button class="button" onclick="login();">Iniciar Session</button>
            <?php
            }
        ?>
    
    </header> 

    <aside id="login">
        <div  onclick="login();"></div>
        <section>
            <form action="php/checkLogin.php" method="POST">
                <input type="text" placeholder="Usuario..." name="usr">
                <input type="password" placeholder="Contraseña...." name="pass">
                <input type="submit" value="Iniciar Sesion">
            </form>
        </section>
    </aside>


    <?php
        require_once 'php/connect.php';

        // Create connection
        $conn =  $conexion;
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * from  motos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<section class='section has-background-light'>
                <div class='container'>
                    <div class='columns is-centered'>
                        <div class='column is-half'>
                            <div class='card large'>
                                <div class='card-image'>
                                    <figure class='image'>
                                        <img src=" . $row['imagen'] . " alt='Image' style='max-width: 150px;'>
                                    </figure>
                                </div>
                                <div class='card-content'>
                                    <div class='media'>
                                        <div class='media-content'>
                                            <p class='title is-4 no-padding'>" . $row['titulo'] . "</p>
                                        <div style='margin-bottom: 7px;'> <span class='tag is-rounded'>Cilindrada:  " . $row['marca'] . "</span> </div>
                                        <div style='margin-bottom: 7px;'> <span class='tag is-rounded'>Año:  " . $row['anno'] . "</span> </div>
                                        <div style='margin-bottom: 7px;'> <span class='tag is-rounded'>Precio: $" . $row['precio'] . "</span> </div>
                                        </div>
                                    </div>
                                    <div class='content'>
                                    I'd just like to interject for a moment. What you're referring to as Linux, is in fact, GNU/Linux, or as I've recently taken to calling it, GNU plus Linux. Linux is not an operating system unto itself, but rather another free component of a fully functioning GNU system made useful by the GNU corelibs, shell utilities and vital system components comprising a full OS as defined by POSIX.
                                        <div class='background-icon'><span class='icon-twitter'></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>

    <script src="js/jquery.js"></script>
    <script>
        var EstadoLogin = false;

        function logout(){
            location.href = "php/logout.php";
        }

        function login(){
            if(EstadoLogin == false)
            {
                $("#login").css("display", "flex");
                EstadoLogin = true;
            }else{
                $("#login").css("display", "none");
                EstadoLogin = false;
            }
        }
    </script>
</body>
</html>