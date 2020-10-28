<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["id"])) {
    exit("No hay id de empleado");
}
$idEmp = $_GET["id"];
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("select id,nombre,imagen from empleados where id = ?");
$sentencia->execute([$idEmp]);
$Res = $sentencia->fetchObject();
echo json_encode($Res);