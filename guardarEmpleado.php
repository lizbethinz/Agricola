<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonEmp = json_decode(file_get_contents("php://input"));
if (!$jsonEmp) {
    exit("No hay datos");
}
$bd = include_once "conexionagricola.php";
$sentencia = $bd->prepare("insert into empleados(nombre,imagen) values (?,?)");
$resultado = $sentencia->execute([$jsonEmp ->nombre, $jsonEmp ->img]);

if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}