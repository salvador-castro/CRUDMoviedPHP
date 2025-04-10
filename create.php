<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<?php if (isset($_GET['error'])): ?>
  <div class="alert alert-danger" role="alert">
    <?= htmlspecialchars($_GET['error']) ?>
  </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="mb-0">➕ Agregar Película o Serie</h2>
  <div class="d-flex gap-2">
    <button id="modoOscuroBtn" class="btn btn-outline-dark">🌙 Modo oscuro</button>
  </div>
</div>

<form action="store.php" method="POST" class="row g-3">
  <div class="col-md-6">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $_POST['titulo'] ?? '' ?>" required>
  </div>

  <div class="col-md-6">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" id="tipo" name="tipo" required onchange="actualizarGenero()">
      <option value="">-- Seleccionar --</option>
      <option value="Película" <?= ($_POST['tipo'] ?? '') === 'Película' ? 'selected' : '' ?>>Película</option>
      <option value="Serie" <?= ($_POST['tipo'] ?? '') === 'Serie' ? 'selected' : '' ?>>Serie</option>
    </select>
  </div>

  <div class="col-md-12">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= $_POST['descripcion'] ?? '' ?></textarea>
  </div>

  <div class="col-md-4">
    <label for="genero" class="form-label">Género</label>
    <select class="form-select" id="genero" name="genero">
      <option value="">-- Seleccionar Tipo primero --</option>
    </select>
  </div>

  <div class="col-md-4">
    <label for="plataforma" class="form-label">Plataforma</label>
    <select class="form-select" id="plataforma" name="plataforma">
      <?php
        $plataformas = ["APPLE TV", "DISNEY+", "HBO", "MUBI", "NETFLIX", "PARAMOUNT", "PRIMEVIDEO", "SALA DE CINE", "YOUTUBE PREMIUM"];
        foreach ($plataformas as $p) {
          $selected = ($_POST['plataforma'] ?? '') === $p ? 'selected' : '';
          echo "<option value=\"$p\" $selected>$p</option>";
        }
      ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="imdb" class="form-label">IMDB</label>
    <input type="number" class="form-control" id="imdb" name="imdb" step="0.1" min="0" max="10" value="<?= $_POST['imdb'] ?? '' ?>">
  </div>

  <div class="col-md-6">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" id="estado" name="estado">
      <?php
        $estados = ["Para ver", "Viendo", "Vista"];
        foreach ($estados as $e) {
          $selected = ($_POST['estado'] ?? '') === $e ? 'selected' : '';
          echo "<option value=\"$e\" $selected>$e</option>";
        }
      ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="opinion" class="form-label">Opinión</label>
    <input type="text" class="form-control" id="opinion" name="opinion" value="<?= $_POST['opinion'] ?? '' ?>">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </div>
</form>

<script>
  const generoSeleccionado = <?= json_encode($_POST['genero'] ?? '') ?>;
  const tipoSeleccionado = <?= json_encode($_POST['tipo'] ?? '') ?>;
</script>
<script src="generos.js"></script>

<?php include 'footer.php'; ?>