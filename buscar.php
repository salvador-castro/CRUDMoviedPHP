<?php
include 'db.php';

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
        <td>" . htmlspecialchars($row['id']) . "</td>
        <td>" . htmlspecialchars($row['titulo']) . "</td>
        <td>" . htmlspecialchars($row['descripcion']) . "</td>
        <td>" . htmlspecialchars($row['tipo']) . "</td>
        <td>" . htmlspecialchars($row['genero']) . "</td>
        <td>" . htmlspecialchars($row['plataforma']) . "</td>
        <td>" . htmlspecialchars($row['imdb']) . "</td>
        <td>" . htmlspecialchars($row['estado']) . "</td>
        <td>" . htmlspecialchars($row['opinion']) . "</td>
        <td class='text-center'>
          <div class='d-inline-flex gap-2'>
            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning' title='Editar' data-bs-toggle='tooltip'>✏️</a>
            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' title='Eliminar' data-bs-toggle='tooltip' onclick='return confirm(\\'¿Estás seguro de que querés eliminar este contenido?\\')'>🗑️</a>
          </div>
        </td>
      </tr>";
}
?>