<?php
include 'db.php';
if (!isset($_GET['id'])) die('ID no especificado');
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM contenidos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header('Location: index.php');
?>