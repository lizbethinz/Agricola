<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["busqueda"])) {
    exit("No hay id de usuario");
}
$busqueda =$_GET["busqueda"];
$bd = include_once "conexionagricola.php";
//$value = "valueHere";
$passThis = "%" . $busqueda . "%";
$sql =$bd->query("SELECT usuarios.id,usuarios.correo,roles.nombre,usuarios.contra FROM usuarios INNER JOIN roles ON usuarios.rol= roles.id WHERE usuarios.correo LIKE '%$busqueda%' or roles.nombre LIKE '%$busqueda%'; ");
// other pdo codes...
//$stmt = $bd ->prepare("SELECT usuarios.id,usuarios.correo,roles.nombre,usuarios.contra FROM usuarios INNER JOIN roles
	//ON usuarios.rol  roles.id WHERE usuarios.correo LIKE ? ");
//$stmt->execute([$passThis]);
//$sentencia = $bd->query("SELECT usuarios.id,usuarios.correo,roles.nombre,usuarios.contra FROM usuarios INNER JOIN roles
//	ON usuarios.rol  roles.id where usuarios.correo  LIKE '%$busqueda%';");
$resultado = $sql ->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);