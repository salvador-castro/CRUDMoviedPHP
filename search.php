<?php
include 'db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Función para evitar errores con valores nulos en htmlspecialchars
function safe($value) {
    return htmlspecialchars((string) ($value ?? ''));
}

$where = [];

if (!empty($_GET['buscar_titulo'])) {
    $titulo = $conn->real_escape_string($_GET['buscar_titulo']);
    $where[] = "titulo LIKE '%$titulo%'";
}

if (!empty($_GET['buscar_genero'])) {
    $genero = $conn->real_escape_string($_GET['buscar_genero']);
    $where[] = "genero LIKE '%$genero%'";
}

if (!empty($_GET['tipo'])) {
    $tipo = $conn->real_escape_string($_GET['tipo']);
    $where[] = "tipo = '$tipo'";
}

if (!empty($_GET['estado'])) {
    $estado = $conn->real_escape_string($_GET['estado']);
    $where[] = "estado = '$estado'";
}

$condicion = count($where) > 0 ? "WHERE " . implode(" AND ", $where) : "";
$sql = "SELECT * FROM contenidos $condicion ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>" . safe($row['id']) . "</td>
        <td>" . safe($row['titulo']) . "</td>
        <td>" . safe($row['descripcion']) . "</td>
        <td>" . safe($row['tipo']) . "</td>
        <td>" . safe($row['genero']) . "</td>
        <td>" . safe($row['plataforma']) . "</td>
        <td>" . safe($row['imdb']) . "</td>
        <td>" . safe($row['estado']) . "</td>
        <td>" . safe($row['opinion']) . "</td>
        <td class='text-center'>
          <div class='d-inline-flex gap-2'>
            <a href='edit.php?id=" . urlencode($row['id']) . "' class='btn btn-sm btn-warning' title='Editar' data-bs-toggle='tooltip'>✏️</a>
            <a href='delete.php?id=" . urlencode($row['id']) . "' class='btn btn-sm btn-danger' title='Eliminar' data-bs-toggle='tooltip' onclick='return confirm(\"¿Estás seguro de que querés eliminar este contenido?\")'>🗑️</a>
          </div>
        </td>
      </tr>";
}
?>