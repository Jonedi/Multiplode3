<?php
require 'db.php';

/* Obtener datos publicados */
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {

    /* Extraer los datos */
    $request = json_decode($postdata);

    /* Validar */
    if (trim($request -> nombre) === '') {
        return http_response_code(400);
    }

    /* sanear */
    $nombre = mysqli_real_escape_string($con, ($request -> nombre));
    $genero = mysqli_real_escape_string($con, trim($request -> genero));
    $edad = mysqli_real_escape_string($con, trim($request -> edad));
    $sueldo = mysqli_real_escape_string($con, trim($request -> sueldo));
    $contrato = mysqli_real_escape_string($con, trim($request -> contrato));

    /* Crear */
    $sql = "INSERT INTO `persona`(`id`, `nombre`, `genero`, `edad`, `sueldo`, `contrato`) VALUES (null, '{$nombre}', '{$genero}', '{$edad}', '{$sueldo}', '{$contrato}')";

    if (mysqli_query($con, $sql)) {
        http_response_code(201);

        $persona = [
            'nombre' => $nombre,
            'genero' => $genero,
            'edad' => $edad,
            'sueldo' => $sueldo,
            'contrato' => $contrato,
            'id'    => mysqli_insert_id($con),
        ];
        echo json_encode($persona);
    }else {
        http_response_code(422);
    }
}
?>