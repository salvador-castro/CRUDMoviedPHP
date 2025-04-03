<?php
include 'db.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$genero = $_POST['genero'];
$plataforma = $_POST['plataforma'];
$imdb = $_POST['imdb'];
$estado = $_POST['estado'];
$opinion = $_POST['opinion'];

$sql = "UPDATE contenidos SET titulo=?, descripcion=?, tipo=?, genero=?, plataforma=?, imdb=?, estado=?, opinion=? WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssi", $titulo, $descripcion, $tipo, $genero, $plataforma, $imdb, $estado, $opinion, $id);

if ($stmt->execute()) {
    header("Location: index.php?msg=editado");
} else {
    header("Location: index.php?msg=error");
}
?>
