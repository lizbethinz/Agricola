<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "conexionagricola.php";
$sentencia = $bd->query("SELECT id,nombre,imagen from empleados;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);