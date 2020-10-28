<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "conexionagricola.php";
$sentencia = $bd->query("SELECT usuarios.id,usuarios.correo,roles.nombre,usuarios.contra FROM usuarios INNER JOIN roles
	ON usuarios.rol= roles.id;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);