<?php
include_once 'header.php';
// Inicia la sesión
session_start();

// Conexión a la base de datos
include 'conexion.php';

$conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conexion) {
    die("No se pudo establecer la conexión: " . mysqli_connect_error());
}

// Procesar el formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // Validar las entradas
    if (!empty($gmail) && !empty($password)) {
        // Preparar una consulta para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE Gmail = ?";
        if ($stmt = mysqli_prepare($conexion, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $gmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Verificar si el usuario existe
            if ($row = mysqli_fetch_assoc($result)) {
                // Depuración: Verificar los datos recuperados
                echo "<pre>";
                print_r($row);
                echo "</pre>";

                // Verificar la contraseña
                if (password_verify($password, $row['Password'])) {
                    // Iniciar sesión y redirigir a index.php
                    $_SESSION['gmail'] = $gmail;
                    header("Location: index.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    echo "<script>alert('Contraseña incorrecta');</script>";
                }
            } else {
                // Usuario no encontrado
                echo "<script>alert('Gmail no encontrado');</script>";
            }
        } else {
            echo "Error: No se pudo preparar la consulta";
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="rutas.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <title>Login</title>
</head>

<body>
    <center>
        <!-- muertito seccion -->
        <!-- Contenido de la pagina -->
        <div class="contenido">
            <!-- Fin del contenido -->
            <div id="formulario">
                <form action="login.php" method="POST">
                    <thead>
                        <h2>Iniciar sesion</h2>
                    </thead>
                    <label for="gmail" id="Correo">Gmail:</label>
                    <input type="email" id="gmail" name="gmail" required placeholder="example@gmail.com">
                    <br><br>
                    <label for="password" id="Contraseña">Contraseña:</label>
                    <input type="password" id="password" name="password" required placeholder="*********">
                    <br><br>    
                    <label for="register">No tienes cuenta?</label>
                    <a href="login.php">Registrate!</a>
                    <br><br>
                    <input type="submit" value="Validar" id="Registrar">
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