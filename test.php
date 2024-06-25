<?php
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