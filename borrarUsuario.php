<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: DELETE");
$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    exit("Solo se permite método DELETE");
}

if (empty($_GET["id"])) {
    exit("No hay id de usuario para eliminar");
}
$idUsuario = $_GET["id"];
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?");
$resultado = $sentencia->execute([$idUsuario]);
echo json_encode($resultado);