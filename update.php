<?php
// Mostrar errores en pantalla (modo desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que todos los campos POST estén presentes
$campos_requeridos = ['id', 'titulo', 'descripcion', 'tipo', 'genero', 'plataforma', 'imdb', 'estado', 'opinion'];
foreach ($campos_requeridos as $campo) {
    if (!isset($_POST[$campo])) {
        die("Falta el campo: $campo");
    }
}

// Obtener datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$genero = $_POST['genero'];
$plataforma = $_POST['plataforma'];
$imdb = $_POST['imdb'];
$estado = $_POST['estado'];
$opinion = $_POST['opinion'];

// Preparar consulta
$sql = "UPDATE contenidos SET titulo=?, descripcion=?, tipo=?, genero=?, plataforma=?, imdb=?, estado=?, opinion=? WHERE id=?";
$stmt = $conn->prepare($sql);

// Verificar si el prepare falló
if (!$stmt) {
    die("Error en prepare: " . $conn->error);
}

// Bind de parámetros
if (!$stmt->bind_param("ssssssssi", $titulo, $descripcion, $tipo, $genero, $plataforma, $imdb, $estado, $opinion, $id)) {
    die("Error en bind_param: " . $stmt->error);
}

// Ejecutar y redirigir según resultado
if ($stmt->execute()) {
    header("Location: index.php?msg=editado");
    exit;
} else {
    die("Error al ejecutar: " . $stmt->error);
}
?>
