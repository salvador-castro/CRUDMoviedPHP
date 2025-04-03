<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<?php
// Alertas con Bootstrap
if (isset($_GET['msg'])) {
    $mensajes = [
        'agregado' => '✅ Contenido agregado correctamente.',
        'editado'  => '✏️ Contenido actualizado correctamente.',
        'borrado'  => '🗑️ Contenido eliminado correctamente.',
        'error'    => '⚠️ Ocurrió un error. Intentalo nuevamente.',
    ];

    $tipos = [
        'agregado' => 'success',
        'editado'  => 'primary',
        'borrado'  => 'danger',
        'error'    => 'warning',
    ];

    $msg = $_GET['msg'];
    if (array_key_exists($msg, $mensajes)) {
        echo "<div class='alert alert-{$tipos[$msg]} alert-dismissible fade show' role='alert'>
                {$mensajes[$msg]}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
              </div>";
    }
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="mb-0">🎬 Listado de Películas y Series</h2>
  <a href="create.php" class="btn btn-success">
    ➕ Agregar nuevo
  </a>
</div>

<table class="table table-bordered table-hover table-striped shadow-sm">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Tipo</th>
      <th>Género</th>
      <th>Plataforma</th>
      <th>IMDB</th>
      <th>Estado</th>
      <th>Opinión</th>
      <th class="text-center">⚙️ Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $conn->query("SELECT * FROM contenidos");
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>" . htmlspecialchars($row['titulo']) . "</td>
        <td>" . htmlspecialchars($row['descripcion']) . "</td>
        <td>{$row['tipo']}</td>
        <td>{$row['genero']}</td>
        <td>{$row['plataforma']}</td>
        <td>{$row['imdb']}</td>
        <td>{$row['estado']}</td>
        <td>{$row['opinion']}</td>
        <td class='text-center'>
          <div class='d-inline-flex gap-2'>
            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning' title='Editar' data-bs-toggle='tooltip'>
              ✏️
            </a>
            <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' title='Eliminar' data-bs-toggle='tooltip' onclick='return confirm(\"¿Estás seguro de que querés eliminar este contenido?\")'>
              🗑️
            </a>
          </div>
        </td>
        </tr>";
    }
    ?>
  </tbody>
</table>

<!-- Activar tooltips de Bootstrap -->
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].forEach(el => new bootstrap.Tooltip(el));
</script>

<?php include 'footer.php'; ?>
