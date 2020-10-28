<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonCat = json_decode(file_get_contents("php://input"));
if (!$jsonCat) {
    exit("No hay datos");
}
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("insert into categorias(nombre,imagen) values (?,?)");
$resultado = $sentencia->execute([$jsonCat ->nombre, $jsonCat ->img]);

if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}
