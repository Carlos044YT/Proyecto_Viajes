<?php
// Definir variables para la conexión a la base de datos
$db_username = 'localhost';
$db_server = 'id22359282_atbd';
$db_password = 'Admin123.Muertito.Mad';
$db_name = 'viajes';

// Establecer la conexión a la base de datos
$conexion2 = mysqli_connect($db_server, $db_username, $db_password, $db_name);

// Verificar la conexión
if(!$conexion){
    die("No se pudo establecer la conexión<br> " . mysqli_connect_error());
}

// Consulta para obtener todos los datos de la tabla "viajes"
$sql = "SELECT * FROM viajes";
$result = mysqli_query($conexion, $sql);

// Inicializar la variable para almacenar las filas de la tabla
$tableRows = '';

if (mysqli_num_rows($result) > 0) {
    // Recorrer los resultados y crear filas de la tabla
    while($row = mysqli_fetch_assoc($result)) {
        $costo = $row['costo'];
        $viaje = $row['viaje'];
        $capacidad = $row['capacidad'];
        $modelo = $row['modelo'];

        // Añadir cada fila a la variable $tableRows
        $tableRows .= "<tr>
            <td>$costo</td>
            <td>$viaje</td>
            <td>$capacidad</td>
            <td>$modelo</td>
        </tr>";
    }
} else {
    $tableRows = "<tr><td colspan='4'>No se encontraron resultados.</td></tr>";
}

?>