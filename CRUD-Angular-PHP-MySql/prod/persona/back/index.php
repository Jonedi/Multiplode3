<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: origin, X-Requested-With, Content-Type, Accept");

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "crudNGPHP";

/* php method */
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'),true);


/* Conexion mysql */
$conn = new mysqli($localhost, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

if ($conn -> connect_error) {
    die("Error : " . $conn -> connect_error);
}

switch ($method) {
    case 'GET':
        $id = $_GET['id'];
        $sql = "select * from persona" . ($id? "where id=$id": '');
        break;
    case 'PUT':
        $sql = "update personas (id, nombre, genero, edad, sueldo, contrato) ('$id', '$nombre', '$genero', '$edad', '$sueldo', '$contrato')";
        break;
    case 'POST':
        $sql = "insert into persona (id, nombre, genero, edad, sueldo, contrato) ('$id', '$nombre', '$genero', '$edad', '$sueldo', '$contrato')";
        break;
    case 'DELETE':
        $sql = $_GET ['id'];
        $sql = "delete persona where id = $id";
        break;
}

/* sql statement */
$result = mysqli_query($conn,$query);

/* matar proceso si sql statemente falla */
if (!$result) {
    http_response_code(404);
    die(mysqli_connect_error());
  }

  /* imprimir resultados, insertar fila id y afectar contador fila */
  if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0;$i<mysqli_num_rows($result);$i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } elseif ($method == 'POST') {
    echo mysqli_insert_id($conn);
  } else {
    echo mysqli_affected_rows($conn);
  }
  
  $conn->close();