function cargarGeneros() {
  const tipo = document.getElementById("tipo").value;
  const generoSelect = document.getElementById("genero");

  const generosPelicula = ["Acción", "Animación", "Aventura", "Bélico", "Biográfico", "Ciencia Ficción", "Cine Negro", "Comedia", "Deportivo", "Documental", "Drama", "Fantasía", "Histórico", "Misterio", "Musical", "Policial", "Romance", "Suspenso", "Terror", "Western"];
  const generosSerie = ["Animación", "Antológica", "Ciencia Ficción", "Comedia", "Crimen", "Documental", "Drama", "Drama Juvenil", "Espionaje", "Fantasía", "Histórico", "Médico", "Misterio", "Policíaco", "Reality Show", "Romance", "Sitcom", "Superhéroes", "Terror", "Thriller"];

  generoSelect.innerHTML = "";
  const generos = tipo === "pelicula" ? generosPelicula : generosSerie;
  generos.forEach(function (genero) {
    const option = document.createElement("option");
    option.value = genero;
    option.text = genero;
    generoSelect.appendChild(option);
  });
}

function mostrarOpinion() {
  const estado = document.getElementById("estado").value;
  const opinionDiv = document.getElementById("opinionDiv");
  opinionDiv.style.display = (estado === "Vista") ? "block" : "none";
}