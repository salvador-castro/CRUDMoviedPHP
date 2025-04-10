<?php
$host = 'localhost';
$usuario = 'root';
$password = 'Bartolo';
$base_de_datos = 'movie_crud';

$conn = new mysqli($host, $usuario, $password, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>