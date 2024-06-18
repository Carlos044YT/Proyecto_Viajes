<!-- insertar.php -->
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['ID'];
    $gmail = $_POST['ID'];
    $contraseña = $_POST['password'];
    $validarcontraseña = $_POST['password2'];
    
    $sql = "INSERT INTO alumnos (ID, NoControl, CURP, Nombre, Direccion, Localidad, CP, Telefono, grupo) VALUES ('$ID', '$numero_control', '$curp', '$nombre', '$direccion', '$localidad', '$cp', '$telefono', '$grupo')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //Cierras conexión con la BD
    $conexion->close();
}
?>