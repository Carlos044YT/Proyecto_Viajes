<?php
// Definición de constantes para la primera base de datos (usuarios)
define('DB_SERVER_USUARIOS', 'localhost');
define('DB_USERNAME_USUARIOS', 'id22359282_admin');
define('DB_PASSWORD_USUARIOS', 'Admin123.Muertito.Mad');
define('DB_NAME_USUARIOS', 'usuarios');

// Conexión a la primera base de datos (usuarios)
$conexion_usuarios = mysqli_connect(DB_SERVER_USUARIOS, DB_USERNAME_USUARIOS, DB_PASSWORD_USUARIOS, DB_NAME_USUARIOS);

// Verificar la conexión a la primera base de datos (usuarios)
if (!$conexion_usuarios) {
    die("No se pudo establecer la conexión a la base de datos de usuarios: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos de usuarios<br>";
}

// Definición de constantes para la segunda base de datos (viajes)
define('DB_SERVER_VIAJES', 'localhost');
define('DB_USERNAME_VIAJES', 'id22359282_admin');
define('DB_PASSWORD_VIAJES', 'Admin123.Muertito.Mad');
define('DB_NAME_VIAJES', 'viajes');

// Conexión a la segunda base de datos (viajes)
$conexion_viajes = mysqli_connect(DB_SERVER_VIAJES, DB_USERNAME_VIAJES, DB_PASSWORD_VIAJES, DB_NAME_VIAJES);

// Verificar la conexión a la segunda base de datos (viajes)
if (!$conexion_viajes) {
    die("No se pudo establecer la conexión a la base de datos de viajes: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos de viajes<br>";
}
// Cerrar las conexiones
mysqli_close($conexion_usuarios);
mysqli_close($conexion_viajes);
?>