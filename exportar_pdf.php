<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;

include 'db.php';

// Verificamos conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM contenidos ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

if ($result->num_rows === 0) {
    die("No hay registros para exportar.");
}

// Construir contenido HTML
$html = "<h2 style='text-align:center;'>Listado de Películas y Series</h2>";
$html .= "<table border='1' cellspacing='0' cellpadding='5' style='width:100%; font-family:Arial; font-size:12px;'>
            <thead>
              <tr style='background-color:#f2f2f2;'>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Género</th>
                <th>Plataforma</th>
                <th>IMDB</th>
                <th>Estado</th>
                <th>Opinión</th>
              </tr>
            </thead>
            <tbody>";

while ($row = $result->fetch_assoc()) {
    $html .= "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['titulo']) . "</td>
                <td>" . htmlspecialchars($row['descripcion']) . "</td>
                <td>" . htmlspecialchars($row['tipo']) . "</td>
                <td>" . htmlspecialchars($row['genero']) . "</td>
                <td>" . htmlspecialchars($row['plataforma']) . "</td>
                <td>" . htmlspecialchars($row['imdb']) . "</td>
                <td>" . htmlspecialchars($row['estado']) . "</td>
                <td>" . htmlspecialchars($row['opinion']) . "</td>
              </tr>";
}

$html .= "</tbody></table>";

// Generar PDF
$dompdf = new Dompdf();

try {
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("contenidos.pdf", ["Attachment" => false]);
} catch (Exception $e) {
    echo "Error generando el PDF: " . $e->getMessage();
}
exit;