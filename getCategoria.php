<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["id"])) {
    exit("No hay id de categoria");
}
$idCat = $_GET["id"];
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("select id,nombre,imagen from categorias where id = ?");
$sentencia->execute([$idCat]);
$Res = $sentencia->fetchObject();
echo json_encode($Res);