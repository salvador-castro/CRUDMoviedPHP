<?php
include 'db.php';
include 'header.php';

if (!isset($_GET['id'])) {
  echo "<div class='alert alert-danger'>ID no especificado.</div>";
  include 'footer.php';
  exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM contenidos WHERE id = $id");

if ($result->num_rows === 0) {
  echo "<div class='alert alert-warning'>Contenido no encontrado.</div>";
  include 'footer.php';
  exit;
}

$row = $result->fetch_assoc();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="mb-4">✏️ Editar Película o Serie</h2>
  <div class="d-flex gap-2">
    <button id="modoOscuroBtn" class="btn btn-outline-dark">🌙 Modo oscuro</button>
  </div>
</div>

<form action="update.php" method="POST" class="row g-3">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">

  <div class="col-md-6">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($row['titulo']) ?>" required>
  </div>

  <div class="col-md-6">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" id="tipo" name="tipo" required>
      <option value="Película" <?= $row['tipo'] === 'Película' ? 'selected' : '' ?>>Película</option>
      <option value="Serie" <?= $row['tipo'] === 'Serie' ? 'selected' : '' ?>>Serie</option>
    </select>
  </div>

  <div class="col-md-12">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($row['descripcion']) ?></textarea>
  </div>

  <div class="col-md-4">
    <label for="genero" class="form-label">Género</label>
    <select class="form-select" id="genero" name="genero">
      <option value="">-- Seleccionar --</option>
    </select>
  </div>

  <div class="col-md-4">
    <label for="plataforma" class="form-label">Plataforma</label>
    <select class="form-select" id="plataforma" name="plataforma">
      <!-- JS lo completará -->
    </select>
  </div>

  <div class="col-md-4">
    <label for="imdb" class="form-label">IMDB</label>
    <input type="text" class="form-control" id="imdb" name="imdb" value="<?= htmlspecialchars($row['imdb']) ?>">
  </div>

  <div class="col-md-6">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" id="estado" name="estado">
      <option <?= $row['estado'] === 'Para ver' ? 'selected' : '' ?>>Para ver</option>
      <option <?= $row['estado'] === 'Viendo' ? 'selected' : '' ?>>Viendo</option>
      <option <?= $row['estado'] === 'Vista' ? 'selected' : '' ?>>Vista</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="opinion" class="form-label">Opinión</label>
    <input type="text" class="form-control" id="opinion" name="opinion" value="<?= htmlspecialchars($row['opinion']) ?>">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </div>
</form>

<script>
  const generoSeleccionado = <?= json_encode($row['genero']) ?>;
  const tipoSeleccionado = <?= json_encode($row['tipo']) ?>;
  const plataformaSeleccionada = <?= json_encode($row['plataforma']) ?>;
</script>

<script src="generos.js"></script>
<script src="plataformas.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const tipoSelect = document.getElementById("tipo");
    tipoSelect.addEventListener("change", actualizarGenero);
    actualizarGenero();
    cargarPlataformas(plataformaSeleccionada);
  });
</script>

<?php include 'footer.php'; ?>