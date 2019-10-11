<?php
/* Retorna la lista de personas */

require 'db.php';

$persona = [];
$sql = "SELECT * FROM persona";

if ($result = mysqli_query($con, $sql)) {
    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $persona[$i]['id'] = $row['id'];
        $persona[$i]['nombre'] = $row['nombre'];
        $persona[$i]['genero'] = $row['genero'];
        $persona[$i]['edad'] = $row['edad'];
        $persona[$i]['sueldo'] = $row['sueldo'];
        $persona[$i]['contrato'] = $row['contrato'];
        $i ++;
    }

    echo json_encode($persona);
}else {
    http_response_code(404);
}
?>