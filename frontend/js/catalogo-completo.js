document.addEventListener('DOMContentLoaded', () => {
    const gridAutos = document.getElementById('gridAutos');
  
    async function fetchAutos() {
      const response = await fetch('../backend/index.php?accion=ObtenerAutos');
      const data = await response.json();
      if (data.success) {
        mostrarAutos(data.Autos);
      } else {
        console.error(data.message);
      }
    }
  
    function mostrarAutos(autos) {
      gridAutos.innerHTML = '';
      autos.forEach(auto => {
        const tarjetaAuto = document.createElement('div');
        tarjetaAuto.className = 'tarjeta-auto';
        tarjetaAuto.innerHTML = `
          <img src="./assets/${auto.Aut_Modelo}.jpg" alt="${auto.Aut_Modelo}">
          <h3 class="mt-4 text-xl font-bold">${auto.Aut_Marca} ${auto.Aut_Modelo}</h3>
          <p>Es tuyo por $${auto.Aut_Costo_Dia.replace('.00', '')} / día</p>
          <div class="precio-boton">
            <button class="mx-2 bg-transparent text-semibold text-red-800 hover:text-red-700" onclick="mostrarDetalles(${auto.Aut_Id})">Detalles</button>
            <a href="rentaauto.html?id=${auto.Aut_Id}" class="rentar-boton bg-red-500 hover:bg-red-600 text-white mx-2 px-4 rounded">Rentar</a>
          </div>
        `;
        gridAutos.appendChild(tarjetaAuto);
      });
    }
  
    window.mostrarDetalles = async function(autoId) {
      const response = await fetch(`../backend/index.php?accion=ObtenerAutoId&id=${autoId}`);
      const data = await response.json();
      if (data.success) {
        const auto = data.Auto;
        const detallesAutoContainer = document.createElement('div');
        detallesAutoContainer.className = 'detalles-auto';
        detallesAutoContainer.innerHTML = `
          <div class="contenido-detalles-auto">
            <h1 class="text-5xl font-bold mb-7">${auto.Aut_Marca} ${auto.Aut_Modelo}</h1>
            <img src="./assets/${auto.Aut_Modelo}.jpg" alt="${auto.Aut_Modelo}">
            <div class="especificaciones-auto">
              <div><strong>Marca:</strong> ${auto.Aut_Marca}</div>
              <div><strong>Modelo:</strong> ${auto.Aut_Modelo}</div>
              <div><strong>Color:</strong> ${auto.Aut_Color}</div>
              <div><strong>Motor:</strong> ${auto.Aut_Motor}</div>
              <div><strong>Transmisión:</strong> ${auto.Aut_Transmision}</div>
              <div><strong>Número de pasajeros:</strong> ${auto.Aut_Pasajeros}</div>
            </div>
            <button class="bg-red-500 hover:bg-red-600 text-white mt-8 px-4 py-2 rounded" onclick="cerrarDetalles()">Volver</button>
          </div>
        `;
        document.body.appendChild(detallesAutoContainer);
      } else {
        console.error(data.message);
      }
    }
  
    window.cerrarDetalles = function() {
      const detallesAutoContainer = document.querySelector('.detalles-auto');
      if (detallesAutoContainer) {
        detallesAutoContainer.remove();
      }
    }
  
    fetchAutos();
  });
  