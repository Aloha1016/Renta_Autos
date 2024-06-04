document.addEventListener('DOMContentLoaded', () => {
    const userId = localStorage.getItem('userId'); 

    if (!userId) {
        console.error('User is not logged in');
        return;
    }

    const rentasActivasContainer = document.getElementById('rentasActivas');
    const historialRentasContainer = document.getElementById('historialRentas');

    async function fetchRentasActivas() {
        try {
            const response = await fetch(`../backend/index.php?accion=obtenerRentasActivas&usu_id=${userId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            });
            const textData = await response.text();
            console.log('Response for fetchRentasActivas:', textData);

            const data = JSON.parse(textData);

            if (data.success && data.user) {
                mostrarRentasActivas(data.user); // data.user ya es un array
            } else {
                console.error(data.message);
            }
        } catch (error) {
            console.error('Error fetching rentas activas:', error);
        }
    }

    async function fetchHistorialRentas() {
        try {
            const response = await fetch(`../backend/index.php?accion=obtenerRentaUsuario&usu_id=${userId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            });
            const textData = await response.text();
            console.log('Response for fetchHistorialRentas:', textData);

            const data = JSON.parse(textData);

            if (data.success && data.user) {
                mostrarHistorialRentas(data.user); // data.user ya es un array
            } else {
                console.error(data.message);
            }
        } catch (error) {
            console.error('Error fetching historial rentas:', error);
        }
    }

    function mostrarRentasActivas(rentas) {
        rentasActivasContainer.innerHTML = '';
    
        rentas.forEach(renta => {
            const rentaElement = document.createElement('div');
            rentaElement.className = 'renta';
            const imagen = document.createElement('img');
            imagen.src = `./assets/idCar/${renta.Ren_Aut_Id}.jpg`;
            imagen.alt = 'Descripción de la imagen'; 
            imagen.className = 'imagen-renta'; 
            rentasActivasContainer.appendChild(imagen);
            rentaElement.innerHTML = `
                <div class="renta-info">
                    <p>Renta desde: ${renta.Ren_Fecha_Renta}</p>
                </div>
            `;
            rentasActivasContainer.appendChild(rentaElement);
        });
    }
    
    function mostrarHistorialRentas(rentas) {
        historialRentasContainer.innerHTML = '';
    
        rentas.forEach(renta => {
            const rentaElement = document.createElement('div');
            rentaElement.className = 'renta';
            const imagen = document.createElement('img');
            imagen.src = `./assets/idCar/${renta.Ren_Aut_Id}.jpg`;
            imagen.alt = 'Descripción de la imagen'; 
            imagen.className = 'imagen-historial';
            historialRentasContainer.appendChild(imagen);
            rentaElement.innerHTML = `
                <div class="renta-info">
                    <p>Renta desde: ${renta.Ren_Fecha_Renta} hasta: ${renta.Ren_Fecha_Devolucion}</p>
                </div>
            `;
            historialRentasContainer.appendChild(rentaElement);
        });
    }    

    fetchRentasActivas();
    fetchHistorialRentas();
});
