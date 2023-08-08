<?php
try {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "intelprogramas";

    $conexion = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
}
