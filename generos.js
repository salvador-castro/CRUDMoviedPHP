const generos = {
  Película: [
    "Acción", "Animación", "Aventura", "Bélico", "Biográfico", "Ciencia Ficción",
    "Cine Negro", "Comedia", "Comedia Drámatica", "Comedia Negra", "Deportivo", "Documental", 
    "Drama", "Fantasía", "Histórico", "Misterio", "Musical", "Policial", "Romance", "Suspenso",
    "Terror", "Western"
  ],
  Serie: [
    "Animación", "Antológica", "Ciencia Ficción", "Comedia", "Comedia Drámatica", "Crimen", 
    "Documental", "Drama", "Drama Juvenil", "Espionaje", "Fantasía", "Histórico", "Médico",
    "Misterio", "Policíaco", "Reality Show", "Romance", "Sitcom", "Superhéroes",
    "Terror", "Thriller"
  ]
};

function actualizarGenero() {
  const tipo = document.getElementById("tipo").value.trim().toLowerCase();
  const generoSelect = document.getElementById("genero");
  generoSelect.innerHTML = "";

  let clave = tipo === "pelicula" ? "Película" :
              tipo === "serie" ? "Serie" : null;

  if (!clave || !generos[clave]) {
    generoSelect.innerHTML = '<option value="">-- Seleccionar Tipo primero --</option>';
    return;
  }

  generos[clave].forEach(genero => {
    const option = document.createElement("option");
    option.value = genero;
    option.textContent = genero;
    if (genero === generoSeleccionado) {
      option.selected = true;
    }
    generoSelect.appendChild(option);
  });
}
