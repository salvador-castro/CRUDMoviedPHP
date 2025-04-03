<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$tipo = strtolower($_POST['tipo']); // convierte a 'pelicula' o 'serie'
$genero = $_POST['genero'];
$plataforma = $_POST['plataforma'];
$imdb = floatval($_POST['imdb'] ?? 0);
$estado = $_POST['estado'];
$opinion = $_POST['opinion'];

// Validación de estado
$estadosValidos = ['Para ver', 'Vista', 'Viendo'];
if (!in_array($estado, $estadosValidos)) {
  die("Estado inválido.");
}

// Validación de IMDb entre 0.0 y 10.0
if ($imdb < 0.0 || $imdb > 10.0) {
  die("La puntuación IMDB debe estar entre 0.0 y 10.0");
}

$sql = "INSERT INTO contenidos (titulo, descripcion, tipo, genero, plataforma, imdb, estado, opinion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en prepare: " . $conn->error);
}

$stmt->bind_param("sssssdss", $titulo, $descripcion, $tipo, $genero, $plataforma, $imdb, $estado, $opinion);

if ($stmt->execute()) {
    header("Location: index.php?msg=agregado");
    exit;
} else {
    echo "Error al insertar: " . $stmt->error;
}
?>