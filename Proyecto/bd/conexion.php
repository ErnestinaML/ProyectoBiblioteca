<?php
$host ="localhost";
$usuario="root";
$password="5775";
$bd="biblioteca";
$por="3306";

$connect=new mysqli($host, $usuario,$password,$bd,$por);

if ($connect -> connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$connect -> set_charset("utf8mb4")
?>