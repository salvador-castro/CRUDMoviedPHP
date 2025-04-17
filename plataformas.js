const plataformas = [
  "APPLE TV", "DISNEY+", "HBO", "MUBI", "NETFLIX", "NO DISPONIBLE",
  "PARAMOUNT", "PRIMEVIDEO", "SALA DE CINE", "YOUTUBE PREMIUM"
];

function cargarPlataformas(plataformaActual = "") {
  console.log("🔄 Ejecutando cargarPlataformas()"); // Verifica que la función se ejecuta

  const select = document.getElementById("plataforma");
  select.innerHTML = '<option value="">-- Seleccionar --</option>';

  plataformas.forEach(plataforma => {
    console.log(`➡️ Agregando: [${plataforma}]`); // Muestra cada opción agregada
    const option = document.createElement("option");
    option.value = plataforma;
    option.textContent = plataforma;
    if (plataforma === plataformaActual) {
      option.selected = true;
    }
    select.appendChild(option);
  });
}