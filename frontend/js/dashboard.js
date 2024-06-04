document.addEventListener('DOMContentLoaded', () => {
    const autosActivosContainer = document.getElementById('autosActivos');
    const historialAutosContainer = document.getElementById('historialAutos');

    async function fetchAutosActivos() {
        const response = await fetch('../backend/index.php?accion=getAutosActivos');
        const data = await response.json();
        if (data.success) {
            data.autosActivos.forEach(auto => {
                const autoDiv = document.createElement('div');
                autoDiv.className = 'auto-item';
                autoDiv.innerHTML = `
                    <h3>${auto.Aut_Marca} ${auto.Aut_Modelo}</h3>
                    <p>Renta desde: ${auto.Ren_Fecha_Renta}</p>
                `;
                autosActivosContainer.appendChild(autoDiv);
            });
        } else {
            console.error(data.message);
        }
    }

    async function fetchHistorialAutos() {
        const response = await fetch('../backend/index.php?accion=getHistorialAutos');
        const data = await response.json();
        if (data.success) {
            data.historialAutos.forEach(auto => {
                const autoDiv = document.createElement('div');
                autoDiv.className = 'auto-item';
                autoDiv.innerHTML = `
                    <h3>${auto.Aut_Marca} ${auto.Aut_Modelo}</h3>
                    <p>Renta desde: ${auto.Ren_Fecha_Renta} hasta ${auto.Ren_Fecha_Devolucion}</p>
                `;
                historialAutosContainer.appendChild(autoDiv);
            });
        } else {
            console.error(data.message);
        }
    }

    fetchAutosActivos();
    fetchHistorialAutos();

    var acc = document.getElementsByClassName("accordion-btn");
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
