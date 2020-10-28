<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["idUsuario"])) {
    exit("No hay id de usuario");
}
$idUsuario = $_GET["idUsuario"];
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("select id,correo,rol,contra from usuarios where id = ?");
$sentencia->execute([$idUsuario]);
$Usuario = $sentencia->fetchObject();
echo json_encode($Usuario);