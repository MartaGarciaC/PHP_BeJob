<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8" />
    <title>Formulario de registro</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            <h2 class="formTitle"><em>Formulario de registro</em></h2>

            <label for="nombre" class="formLabel">Nombre <span><em>(requerido):</em></spam></label>
            <input type="text" name="nombre" maxlength="20" class="formInput" required/>

            <label for="apellido" class="formLabel">Apellido <span><em>(requerido):</em></spam></label>
            <input type="text" name="apellido" maxlength="20" class="formInput" required/>

            <label for="email" class="formLabel">Email <span><em>(requerido):</em></spam></label>
            <input type="email" name="email" maxlength="20" class="formInput" required/>

            <input type="submit" name="submit" class="formSubmit" value="ENVIAR">

            <?php

            if($_POST) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];

            // Conexion con PDO
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')"; 

            if($conn->query($sql) === TRUE) {
                echo "New record created succesfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            }
            ?>
        </form>
    </div>
</body>
</html>