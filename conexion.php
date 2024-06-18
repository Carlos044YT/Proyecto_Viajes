<?php
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','cbtis118');

    $conexion = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if(!$conexion){
        die("No se pudo establecer la conexión ".mysqli_connect_error());
    }else{
        echo("Conexión exitosa");
    }
?>