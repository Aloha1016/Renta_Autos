document.addEventListener('DOMContentLoaded', () => {
    const gridAutos = document.getElementById('gridAutos');
    const autos = [
        {
            id: 1,
            nombre: 'Jetta',
            imagen: 'jetta.jpg',
            precio: 50,
            especificaciones: {
                'Cilindros / Válvulas /Cilindrada (cm3)': '4 / 16 válvulas / 1.4 / 1395',
                'Alimentación': 'Inyección directa de gasolina con turbocompresor e intercooler (TSI)',
                'Potencia CV (KW) / rpm': '150 (110) / 5000 - 6000',
                'Par máximo Nm (Kgfm) / rpm': '250 (26) / 1500 - 3500',
                'Caja de cambios': 'Manual',
                'Color': 'Blanco'
            }
        },
        {
            id: 2,
            nombre: 'BMW SERIE 2',
            imagen: 'BMW_SERIE_2.jpg',
            precio: 120,
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '306 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Volumen del maletero': '430 litros',
                'Aceleración (0-100km/h)': '4.9 segundos',
                'Velocidad Máxima': '250 km/h',
                'Color': 'Azul'
            }
        },
        {
            id: 3,
            nombre: 'AUDI A3',
            imagen: 'AUDI_A3.jpg',
            precio: 70,
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '116 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '425 litros',
                'Aceleración (0-100km/h)': '10.6 segundos',
                'Velocidad Máxima': '210 km/h',
                'Color': 'Gris'
            }
        },
        {
            id: 4,
            nombre: 'AUDI A8',
            imagen: 'AUDI_A8.jpg',
            precio: 150,
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Híbrido enchufable',
                'Potencia máxima': '462 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Volumen del maletero': '390 litros',
                'Aceleración (0-100km/h)': '4.9 segundos',
                'Velocidad Máxima': '250 km/h',
                'Color': 'Rojo'
            }
        },
        {
            id: 5,
            nombre: 'SUZUKI JIMNY',
            imagen: 'SUZUKI_JIMNY.jpg',
            precio: 40,
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '102 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Velocidad Máxima': '145 km/h',
                'Color': 'Verde'
            }
        },
        {
            id: 6,
            nombre: 'MAZDA MAZDA6',
            imagen: 'MAZDA_MAZDA6.jpg',
            precio: 60,
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '165 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '480 litros',
                'Aceleración (0-100km/h)': '10 segundos',
                'Velocidad Máxima': '208 km/h',
                'Color': 'Rojo'
            }
        },
        {
            id: 7,
            nombre: 'FIAT TIPO',
            imagen: 'FIAT_TIPO.jpg',
            precio: 35,
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Diésel',
                'Potencia máxima': '130 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '440 litros',
                'Aceleración (0-100km/h)': '9.8 segundos',
                'Velocidad Máxima': '208 km/h',
                'Color': 'Gris'
            }
        },
        {
            id: 8,
            nombre: 'FORD FOCUS',
            imagen: 'FORD_FOCUS.jpg',
            precio: 55,
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '125 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '480 litros',
                'Aceleración (0-100km/h)': '10.3 segundos',
                'Velocidad Máxima': '198 km/h',
                'Color': 'Azul'
            }
        },
        {
            id: 9,
            nombre: 'PEUGEOT 3008 HYBRID',
            imagen: 'PEUGEOT_3008_HYBRID.jpg',
            precio: 85,
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '136 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '520 litros',
                'Aceleración (0-100km/h)': '10.3 segundos',
                'Velocidad Máxima': '201 km/h',
                'Color': 'Azul'
            }
        }
    ];

    const filtros = {
        'Caja de cambios': 'Todos',
        'Color': 'Todos'
    };

    function filtrarAutos(autos, filtros) {
        return autos.filter(auto => {
            const filtroCaja = filtros['Caja de cambios'] === 'Todos' || auto.especificaciones['Caja de cambios'] === filtros['Caja de cambios'];
            const filtroColor = filtros['Color'] === 'Todos' || auto.especificaciones['Color'] === filtros['Color'];
            return filtroCaja && filtroColor;
        });
    }

    function mostrarAutos(autos) {
        gridAutos.innerHTML = '';
        autos.forEach(auto => {
            const tarjetaAuto = document.createElement('div');
            tarjetaAuto.className = 'tarjeta-auto';
            tarjetaAuto.innerHTML = `
                <img src="./assets/${auto.imagen}" alt="${auto.nombre}">
                <h3>${auto.nombre}</h3>
                <p>Empieza en $${auto.precio}/day</p>
                <button onclick="mostrarDetalles(${auto.id})">Rent</button>
            `;
            gridAutos.appendChild(tarjetaAuto);
        });
    }

    document.getElementById('filtroCaja').addEventListener('change', (e) => {
        filtros['Caja de cambios'] = e.target.value;
        mostrarAutos(filtrarAutos(autos, filtros));
    });

    document.getElementById('filtroColor').addEventListener('change', (e) => {
        filtros['Color'] = e.target.value;
        mostrarAutos(filtrarAutos(autos, filtros));
    });

    mostrarAutos(autos);
});

function mostrarDetalles(autoId) {
    const autos = [
        {
            id: 1,
            nombre: 'Jetta',
            imagen: 'jetta.jpg',
            especificaciones: {
                'Cilindros / Válvulas /Cilindrada (cm3)': '4 / 16 válvulas / 1.4 / 1395',
                'Alimentación': 'Inyección directa de gasolina con turbocompresor e intercooler (TSI)',
                'Potencia CV (KW) / rpm': '150 (110) / 5000 - 6000',
                'Par máximo Nm (Kgfm) / rpm': '250 (26) / 1500 - 3500',
                'Caja de cambios': 'Manual',
                'Color': 'Rojo'
            }
        },
        {
            id: 2,
            nombre: 'BMW SERIE 2',
            imagen: 'BMW_SERIE_2.jpg',
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '306 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Volumen del maletero': '430 litros',
                'Aceleración (0-100km/h)': '4.9 segundos',
                'Velocidad Máxima': '250 km/h',
                'Color': 'Blanco'
            }
        },
        {
            id: 3,
            nombre: 'AUDI A3',
            imagen: 'AUDI_A3.jpg',
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '116 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '425 litros',
                'Aceleración (0-100km/h)': '10.6 segundos',
                'Velocidad Máxima': '210 km/h',
                'Color': 'Azul'
            }
        },
        {
            id: 4,
            nombre: 'AUDI A8',
            imagen: 'AUDI_A8.jpg',
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Híbrido enchufable',
                'Potencia máxima': '462 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Volumen del maletero': '390 litros',
                'Aceleración (0-100km/h)': '4.9 segundos',
                'Velocidad Máxima': '250 km/h',
                'Color': 'Negro'
            }
        },
        {
            id: 5,
            nombre: 'SUZUKI JIMNY',
            imagen: 'SUZUKI_JIMNY.jpg',
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '102 cv',
                'Tracción': 'Integral (AWD, 4WD, 4x4)',
                'Velocidad Máxima': '145 km/h',
                'Color': 'Verde'
            }
        },
        {
            id: 6,
            nombre: 'MAZDA MAZDA6',
            imagen: 'MAZDA_MAZDA6.jpg',
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '165 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '480 litros',
                'Aceleración (0-100km/h)': '10 segundos',
                'Velocidad Máxima': '208 km/h',
                'Color': 'Gris'
            }
        },
        {
            id: 7,
            nombre: 'FIAT TIPO',
            imagen: 'FIAT_TIPO.jpg',
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Diésel',
                'Potencia máxima': '130 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '440 litros',
                'Aceleración (0-100km/h)': '9.8 segundos',
                'Velocidad Máxima': '208 km/h',
                'Color': 'Gris'
            }
        },
        {
            id: 8,
            nombre: 'FORD FOCUS',
            imagen: 'FORD_FOCUS.jpg',
            especificaciones: {
                'Caja de cambios': 'Manual',
                'Combustible': 'Gasolina',
                'Potencia máxima': '125 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '480 litros',
                'Aceleración (0-100km/h)': '10.3 segundos',
                'Velocidad Máxima': '198 km/h',
                'Color': 'Azul'
            }
        },
        {
            id: 9,
            nombre: 'PEUGEOT 3008 HYBRID',
            imagen: 'PEUGEOT_3008_HYBRID.jpg',
            especificaciones: {
                'Caja de cambios': 'Automático',
                'Combustible': 'Gasolina',
                'Potencia máxima': '136 cv',
                'Tracción': 'Delantera (FWD)',
                'Volumen del maletero': '520 litros',
                'Aceleración (0-100km/h)': '10.3 segundos',
                'Velocidad Máxima': '201 km/h',
                'Color': 'Azul'
            }
        }
    ];

    const auto = autos.find(auto => auto.id === autoId);
    if (auto) {
        const detallesAutoContainer = document.createElement('div');
        detallesAutoContainer.className = 'detalles-auto';
        detallesAutoContainer.innerHTML = `
            <div class="contenido-detalles-auto">
                <h1>${auto.nombre}</h1>
                <img src="./assets/${auto.imagen}" alt="${auto.nombre}">
                <div class="especificaciones-auto">
                    ${Object.keys(auto.especificaciones).map(key => `<div><strong>${key}:</strong> ${auto.especificaciones[key]}</div>`).join('')}
                </div>
                <button onclick="cerrarDetalles()">Close</button>
            </div>
        `;
        document.body.appendChild(detallesAutoContainer);
    }
}

function cerrarDetalles() {
    const detallesAutoContainer = document.querySelector('.detalles-auto');
    if (detallesAutoContainer) {
        detallesAutoContainer.remove();
    }
}
