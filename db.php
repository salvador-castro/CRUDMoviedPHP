<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_de_datos = 'multimedia';

$conn = new mysqli($host, $usuario, $password, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>