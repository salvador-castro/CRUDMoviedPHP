// assets/modo-oscuro.js
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const btnModo = document.getElementById('modoOscuroBtn');
  
    if (!btnModo) return;
  
    // Cargar preferencia
    if (localStorage.getItem('modo-oscuro') === 'true') {
      body.classList.add('modo-oscuro');
      btnModo.innerText = '☀️ Modo claro';
    }
  
    btnModo.addEventListener('click', () => {
      body.classList.toggle('modo-oscuro');
      const esOscuro = body.classList.contains('modo-oscuro');
      btnModo.innerText = esOscuro ? '☀️ Modo claro' : '🌙 Modo oscuro';
      localStorage.setItem('modo-oscuro', esOscuro);
    });
  });
  