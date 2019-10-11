<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: origin, X-Requested-With, Content-Type, Accept");

/* Credenciales DB */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crudNGPHP');

/* Conexion mysql */
function connect() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno($conn)) {
        die("Falla en la conexión: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf-8");

    return $conn;
}

$con = connect();
?>