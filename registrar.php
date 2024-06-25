<!DOCTYPE html>
<?php
include_once 'header.php';
include 'conexion.php';

// Función para generar un ID aleatorio
function generarID()
{
    return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
}

// Validar y procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // Validaciones del backend
    $errors = [];

    if (!preg_match("/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+$/", $name)) {
        $errors[] = "El campo Name debe comenzar con una letra mayúscula y no contener caracteres especiales.";
    }

    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El campo Gmail debe ser un correo electrónico válido.";
    }

    if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}/", $password)) {
        $errors[] = "El campo Password debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una minúscula, un número y un carácter especial.";
    }

    if (empty($errors)) {
        $id = generarID();
        $nombre = mysqli_real_escape_string($conexion, $name);
        $correo = mysqli_real_escape_string($conexion, $gmail);
        $contrasena = password_hash($password, PASSWORD_BCRYPT); // Encriptar la contraseña

        $sql = "INSERT INTO usuarios (ID, Name, Password, Gmail) VALUES ('$id', '$nombre', '$contrasena', '$correo')";

        if (mysqli_query($conexion, $sql)) {
            header("Location: index.php"); // Redirigir a index.php
            exit(); // Asegurar que el script se detiene después de la redirección
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="rutas.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>

<body>
    <center>
        <!-- muertito seccion -->
        <!-- Contenido de la pagina -->
        <div class="contenido">
            <!-- Fin del contenido -->
            <div id="formulario">
                <form action="registrar.php" method="POST">
                    <thead>
                        <h2>Registrar usuario</h2>
                    </thead>
                    <label for="name" id="Nombre">Nombre:</label>
                    <input type="text" id="name" name="name" required pattern="[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+" placeholder="Min 8 carácteres">
                    <br><br>
                    <label for="gmail" id="Correo">Gmail:</label>
                    <input type="email" id="gmail" name="gmail" required placeholder="example@gmail.com">
                    <br><br>
                    <label for="password" id="Contraseña">Contraseña:</label>
                    <input type="password" id="password" name="password" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" placeholder="*********">
                    <br><br>
                    <label for="register">Ya tienes cuenta?</label>
                    <a href="login.php">Login</a>
                    <br><br>
                    <input type="submit" value="Registrar" id="Registrar">
                </form>
            </div>
        </div>
    </center>
    <!-- aqui termina el div de contenido por lo que si se agrega algo afuera del div no va a estar bien optimizado  -->
    <!-- Inicio del pie de pagina junto con el script -->
    <script src="script.js"></script>
    <?php
    include_once 'pie_de_pagina.php';
    ?>
</body>

</html>