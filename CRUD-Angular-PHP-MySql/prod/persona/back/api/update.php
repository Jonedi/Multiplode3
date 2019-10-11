<?php
require "db.php";

/* Obtener datos publicados */
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {

    /* Extraer datos */
    $request = json_decode($postdata);

    /* validar */
    if ((int)$request -> id < 1 || trim($request -> nombre) == '') {
        return http_response_code(400);
    }

    /* Sanear */
    $id = mysqli_real_escape_string($con, (int)$request -> id);
    $nombre = mysqli_real_escape_string($con, ($request -> nombre));
    $genero = mysqli_real_escape_string($con, trim($request -> genero));
    $edad = mysqli_real_escape_string($con, trim($request -> edad));
    $sueldo = mysqli_real_escape_string($con, trim($request -> sueldo));
    $contrato = mysqli_real_escape_string($con, trim($request -> contrato));

    /* Actualizar */
    $sql = "UPDATE `persona` SET `nombre`='$nombre',`genero`='$genero',`edad`='$edad',`sueldo`='$sueldo',`contrato`='$contrato' WHERE `id`='$id' LIMIT 1";

    if (mysqli_query($con, $sql)) {
        http_response_code(204);
    }else {
        return http_response_code(422);
    }
}
?>