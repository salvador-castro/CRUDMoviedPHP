const generos = {
    Película: [
      "Acción", "Animación", "Aventura", "Bélico", "Biográfico", "Ciencia Ficción",
      "Cine Negro", "Comedia", "Comedia Negra", "Deportivo", "Documental", "Drama", "Fantasía",
      "Histórico", "Misterio", "Musical", "Policial", "Romance", "Suspenso",
      "Terror", "Western"
    ],
    Serie: [
      "Animación", "Antológica", "Ciencia Ficción", "Comedia", "Crimen", "Documental",
      "Drama", "Drama Juvenil", "Espionaje", "Fantasía", "Histórico", "Médico",
      "Misterio", "Policíaco", "Reality Show", "Romance", "Sitcom", "Superhéroes",
      "Terror", "Thriller"
    ]
  };
  
  function actualizarGenero() {
    const tipo = document.getElementById("tipo").value;
    const generoSelect = document.getElementById("genero");
  
    generoSelect.innerHTML = "";
  
    if (!tipo || !generos[tipo]) {
      generoSelect.innerHTML = '<option value="">-- Seleccionar Tipo primero --</option>';
      return;
    }
  
    generos[tipo].forEach(genero => {
      const option = document.createElement("option");
      option.value = genero;
      option.textContent = genero;
      if (genero === generoSeleccionado) {
        option.selected = true;
      }
      generoSelect.appendChild(option);
    });
  }
  
  // Cargar los géneros automáticamente si ya se había seleccionado uno
  document.addEventListener("DOMContentLoaded", () => {
    if (tipoSeleccionado) {
      actualizarGenero();
    }
  });
  