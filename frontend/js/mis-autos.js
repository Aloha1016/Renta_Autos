document.addEventListener('DOMContentLoaded', () => {
    const autosActivosList = document.getElementById('autosActivos');
    const historialAutosList = document.getElementById('historialAutos');
  
    async function fetchAutos(endpoint) {
      const response = await fetch(`../backend/index.php?accion=${endpoint}`);
      const data = await response.json();
      return data;
    }
  
    async function cargarAutos() {
      const autosActivos = await fetchAutos('obtenerRentasActivas');
      const historialAutos = await fetchAutos('obtenerHistorialRentas');
  
      autosActivosList.innerHTML = '';
      historialAutosList.innerHTML = '';
  
      if (autosActivos.success) {
        autosActivos.rentas.forEach(auto => {
          const li = document.createElement('li');
          li.textContent = `${auto.Aut_Marca} ${auto.Aut_Modelo} - ${auto.Ren_Fecha_Renta} a ${auto.Ren_Fecha_Devolucion}`;
          autosActivosList.appendChild(li);
        });
      } else {
        autosActivosList.textContent = 'No tienes autos activos.';
      }
  
      if (historialAutos.success) {
        historialAutos.rentas.forEach(auto => {
          const li = document.createElement('li');
          li.textContent = `${auto.Aut_Marca} ${auto.Aut_Modelo} - ${auto.Ren_Fecha_Renta} a ${auto.Ren_Fecha_Devolucion}`;
          historialAutosList.appendChild(li);
        });
      } else {
        historialAutosList.textContent = 'No tienes historial de autos.';
      }
    }
  
    cargarAutos();
  
    var acc = document.getElementsByClassName("accordion");
    var i;
  
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  });
  