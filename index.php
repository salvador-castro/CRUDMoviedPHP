<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<style>
  .alert { transition: all 0.3s ease-in-out; }
</style>

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

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="mb-0">🎬 Listado de Películas y Series</h2>
  <a href="create.php" class="btn btn-success">➕ Agregar nuevo</a>
</div>

<!-- Formulario de búsqueda -->
<form method="GET" id="form-busqueda" class="row g-2 mb-4">
  <div class="col-md-3">
    <input type="text" name="buscar_titulo" id="buscar_titulo" class="form-control" placeholder="🔍 Buscar por título...">
  </div>
  <div class="col-md-3">
    <input type="text" name="buscar_genero" id="buscar_genero" class="form-control" placeholder="🎭 Buscar por género...">
  </div>
  <div class="col-md-2">
    <select name="tipo" id="tipo" class="form-select">
      <option value="">🎞️ Tipo</option>
      <option value="pelicula">pelicula</option>
      <option value="serie">serie</option>
    </select>
  </div>
  <div class="col-md-2">
    <select name="estado" id="estado" class="form-select">
      <option value="">📺 Estado</option>
      <option value="Para ver">Para ver</option>
      <option value="Viendo">Viendo</option>
      <option value="Vista">Vista</option>
    </select>
  </div>
  <div class="col-md-2 d-flex gap-2">
    <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
    <a href="index.php" class="btn btn-secondary">Limpiar</a>
  </div>
</form>

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
  <tbody id="tabla-resultados">
    <!-- Las filas se cargarán por AJAX -->
  </tbody>
</table>

<!-- Activar tooltips de Bootstrap -->
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].forEach(el => new bootstrap.Tooltip(el));

  function buscar() {
    const datos = new URLSearchParams(new FormData(document.getElementById('form-busqueda')));
    fetch('buscar.php?' + datos.toString())
      .then(res => res.text())
      .then(html => {
        document.getElementById('tabla-resultados').innerHTML = html;
      });
  }

  // Buscar automáticamente al escribir
  ['buscar_titulo', 'buscar_genero', 'tipo', 'estado'].forEach(id => {
    document.getElementById(id).addEventListener('input', buscar);
  });

  // Cargar resultados al iniciar
  buscar();
</script>

<?php include 'footer.php'; ?>
