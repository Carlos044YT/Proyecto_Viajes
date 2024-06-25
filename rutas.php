<?php
include_once 'header.php';
include 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Consulta SQL para obtener todos los datos de la tabla 'viajes'
$query = "SELECT Costo, Viaje, Capacidad, Modelo FROM viajes";
$result = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if ($result) {
    $tableRows = ''; // Variable para almacenar el código HTML de las filas de la tabla

    // Iterar sobre los resultados y generar las filas de la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        $tableRows .= "<tr>";
        $tableRows .= "<td>{$row['Costo']}</td>";
        $tableRows .= "<td>{$row['Viaje']}</td>";
        $tableRows .= "<td>{$row['Capacidad']}</td>";
        $tableRows .= "<td>{$row['Modelo']}</td>";
        $tableRows .= "</tr>";
    }

    // Liberar el resultado
    mysqli_free_result($result);
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes disponibles!</title>
    <link rel="stylesheet" href="rutas.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
</head>

<body>
    <center>
        <!-- Muertito seccion -->
        <!-- Contenido de la pagina -->
        <div class="contenido">
            <h2>Información de viajes</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Costo</th>
                        <th>Viaje</th>
                        <th>Capacidad</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $tableRows; ?>
                </tbody>
            </table>
            <h3>Recuerda que si quieres pedir informes acerca de los viajes debes mandarnos un mensaje de Whatsapp!</h3>
            <!-- Fin del contenido -->
    </center>
    <!-- Mad Sección -->
    <!-- Inicio de los botones de la izquierda -->
    <div class="main">
        <div class="up">
            <button class="card1" onclick="OpenInstagram()">
                <svg class="instagram" fill-rule="nonzero" height="30px" width="30px" viewBox="0,0,256,256"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none"
                        font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10"
                        stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none"
                        fill-rule="nonzero">
                        <g transform="scale(8,8)">
                            <path
                                d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z">
                            </path>
                        </g>
                    </g>
                </svg>
            </button>
            <button class="card2" onclick="OpenFacebook()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="facebook"
                    width="24">
                    <path
                        d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="down">
            <button class="card3" onclick="OpenWhatsapp()">
                <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="whatsapp">
                    <path
                        d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z">
                    </path>
                </svg>
            </button>
            <button class="card4" onclick="OpenGmail()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="gmail"
                    width="24">
                    <path
                        d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z"
                        </path>
                </svg>
            </button>
        </div>
    </div>
    </div>
    <!-- aqui termina el div de contenido por lo que si se agrega algo afuera del div no va a estar bien optimizado  -->
    </div>
    <script src="script.js"></script>
    <!-- Inicio del pie de pagina -->
    <?php
    include_once 'pie_de_pagina.php';
    ?>
</body>

</html>