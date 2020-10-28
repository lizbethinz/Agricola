<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jsonUsuario = json_decode(file_get_contents("php://input"));
if (!$jsonUsuario) {
    exit("No hay datos");
}
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("UPDATE empleados SET nombre= ?, imagen= ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonUsuario->nombre, $jsonUsuario->imagen, $jsonUsuario->id]);
echo json_encode($resultado);