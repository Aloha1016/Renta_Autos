document.addEventListener('DOMContentLoaded', () => {
    const gridAutos = document.getElementById('gridAutos');
    const filtroMarca = document.getElementById('filtroMarca');
    const filtroColor = document.getElementById('filtroColor');
    const filtroPasajeros = document.getElementById('filtroPasajeros');
    const paginacion = document.getElementById('paginacion');

    let autosFiltrados = [];
    let paginaActual = 1;
    const autosPorPagina = 6;

    async function fetchAutos() {
        const response = await fetch('../backend/index.php?accion=ObtenerAutos');
        const data = await response.json();
        if (data.success) {
            autosFiltrados = data.Autos;
            mostrarAutos();
            actualizarPaginacion();
        } else {
            console.error(data.message);
        }
    }

    function mostrarAutos() {
        gridAutos.innerHTML = '';
        const inicio = (paginaActual - 1) * autosPorPagina;
        const fin = inicio + autosPorPagina;
        const autosPagina = autosFiltrados.slice(inicio, fin);

        autosPagina.forEach(auto => {
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

    function actualizarPaginacion() {
        paginacion.innerHTML = '';
        const totalPaginas = Math.ceil(autosFiltrados.length / autosPorPagina);
        for (let i = 1; i <= totalPaginas; i++) {
            const botonPagina = document.createElement('button');
            botonPagina.textContent = i;
            botonPagina.className = i === paginaActual ? 'active' : '';
            botonPagina.addEventListener('click', () => {
                paginaActual = i;
                mostrarAutos();
                actualizarPaginacion();
            });
            paginacion.appendChild(botonPagina);
        }
    }

    function aplicarFiltros() {
        const marca = filtroMarca.value;
        const color = filtroColor.value;
        const pasajeros = filtroPasajeros.value;

        fetch('../backend/index.php?accion=ObtenerAutos')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    autosFiltrados = data.Autos;
                    if (marca !== 'Todos') {
                        autosFiltrados = autosFiltrados.filter(auto => auto.Aut_Marca === marca);
                    }
                    if (color !== 'Todos') {
                        autosFiltrados = autosFiltrados.filter(auto => auto.Aut_Color === color);
                    }
                    if (pasajeros !== 'Todos') {
                        autosFiltrados = autosFiltrados.filter(auto => auto.Aut_Pasajeros == pasajeros);
                    }
                    paginaActual = 1;
                    mostrarAutos();
                    actualizarPaginacion();
                } else {
                    console.error(data.message);
                }
            });
    }

    filtroMarca.addEventListener('change', aplicarFiltros);
    filtroColor.addEventListener('change', aplicarFiltros);
    filtroPasajeros.addEventListener('change', aplicarFiltros);

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

window.onclick = function(event) {
    if (event.target.className === 'modal') {
        event.target.style.display = "none";
    }
}

function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

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