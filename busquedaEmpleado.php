<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["busqueda"])) {
    exit("No hay id de usuario");
}
$busqueda =$_GET["busqueda"];
$bd = include_once "conexionagricola.php";
//$value = "valueHere";
$passThis = "%" . $busqueda . "%";
$sql =$bd->query("SELECT id,nombre,imagen FROM empleados where nombre like '%$busqueda%'; ");

$resultado = $sql ->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);