<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonMascota = json_decode(file_get_contents("php://input"));
if (!$jsonMascota) {
    exit("No hay datos");
}
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("insert into usuarios(correo, contra, rol) values (?,?,?)");
$resultado = $sentencia->execute([$jsonMascota->correo, $jsonMascota->contrasena, $jsonMascota->rol]);

if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}

