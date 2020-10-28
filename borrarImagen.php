<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$link = $_GET["id"];
unlink($link); 