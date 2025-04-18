<?php
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Armado de condiciones
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

// Paginación
$porPagina = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina - 1) * $porPagina;

// Total de resultados
$sqlTotal = "SELECT COUNT(*) AS total FROM contenidos $condicion";
$total = $conn->query($sqlTotal)->fetch_assoc()['total'];
$totalPaginas = ceil($total / $porPagina);

// Consulta principal
$sql = "SELECT * FROM contenidos $condicion ORDER BY id DESC LIMIT $offset, $porPagina";
$resultado = $conn->query($sql);

// Mostrar resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['id']}</td>";
        echo "<td>" . htmlspecialchars($fila['titulo']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
        echo "<td>{$fila['tipo']}</td>";
        echo "<td>{$fila['genero']}</td>";
        echo "<td>{$fila['plataforma']}</td>";
        echo "<td>{$fila['imdb']}</td>";
        echo "<td>{$fila['estado']}</td>";
        echo "<td>{$fila['opinion']}</td>";
        echo "<td class='text-center'>
        <div class='d-flex justify-content-center gap-2'>
          <a href='edit.php?id={$fila['id']}' class='btn btn-sm btn-warning' title='Editar'>✏️</a>
          <a href='delete.php?id={$fila['id']}' class='btn btn-sm btn-danger' title='Eliminar' onclick=\"return confirm('¿Estás seguro de eliminar?')\">🗑️</a>
        </div>
      </td>";

    }

    // Navegación
    echo "<tr><td colspan='10' class='text-center'>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        $clase = ($i == $pagina) ? "btn-dark" : "btn-outline-secondary";
        echo "<button onclick='irPagina($i)' class='btn $clase btn-sm mx-1'>$i</button>";
    }
    echo "</td></tr>";
} else {
    echo "<tr><td colspan='10' class='text-center'>❌ No se encontraron resultados.</td></tr>";
}
?>