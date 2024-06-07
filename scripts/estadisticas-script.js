document.addEventListener('DOMContentLoaded', function() {
    mostrarMarcadores();
    cargarEquipos();
    cargarDatosLiga();
});

function toggleDropdown() {
    document.getElementById("dropdown-content").classList.toggle("show");
    document.getElementById("team-details").innerHTML = ""; // Limpiar los detalles del equipo
    cargarEquipos();
}

function cargarDatosLiga() {
    const nombreHtml = document.body.getAttribute('data-page-name');
    fetch(`prueba.php?nombre_html=${nombreHtml}`)
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos (liga):', data);
            // Verificamos si se recibieron los datos de la liga
            if (data && data.length > 0) {
                // Actualizamos los valores de partidos y goles
                document.getElementById('partidos').innerHTML = `<h1>${data[0].partidos_totales}</h1><br><h3>PARTIDOS</h3>`;
                document.getElementById('goles').innerHTML = `<h1>${data[0].goles_totales}</h1><br><br><h3>GOLES</h3>`;
            } else {
                console.error('No se encontraron datos de la liga.');
            }
        })
        .catch(error => console.error('Error en cargarDatosLiga:', error));
}


function cargarEscudos(escudoIzquierda, escudoDerecha) {
    const escudoIzquierdaEl = document.getElementById('escudo_izquierda');
    const escudoDerechaEl = document.getElementById('escudo_derecha');

    // Comprobamos si se proporcionaron ambos escudos
    if (escudoIzquierda && escudoDerecha) {
        escudoIzquierdaEl.src = escudoIzquierda;
        escudoDerechaEl.src = escudoDerecha;
    } else {
        // Si al menos uno de los escudos no está presente, se muestra un mensaje de error
        console.error('Al menos uno de los escudos no está presente.');

        // Verificamos individualmente si cada escudo está presente y lo asignamos si es así
        if (escudoIzquierda) {
            escudoIzquierdaEl.src = escudoIzquierda;
        }
        if (escudoDerecha) {
            escudoDerechaEl.src = escudoDerecha;
        }
    }
}


function mostrarMarcadores() {
    const nombreHtml = document.body.getAttribute('data-page-name');
    fetch(`prueba.php?nombre_html=${nombreHtml}&marcador=true`)
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos (marcadores):', data);
            const marcadoresDiv = document.querySelector('.marcadores h1');
            if (data && data.marcador_casa !== undefined && data.marcador_visita !== undefined) {
                marcadoresDiv.textContent = `${data.marcador_casa} - ${data.marcador_visita}`;
                cargarEscudos(data.logo_casa, data.logo_visita);
            } else {
                marcadoresDiv.textContent = "No se encontraron marcadores.";
            }
        })
        .catch(error => console.error('Error en mostrarMarcadores:', error));
}




function cargarEquipos() {
    const nombreHtml = document.body.getAttribute('data-page-name');
    fetch(`prueba.php?nombre_html=${nombreHtml}`)
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos (equipos):', data);  // Verifica los datos recibidos
            const dropdownContent = document.getElementById('dropdown-content');
            dropdownContent.innerHTML = '';
            data.forEach(equipo => {
                const button = document.createElement('button');
                const logo = document.createElement('img');
                logo.src = equipo.logo;
                logo.alt = equipo.nombre + " Logo";
                button.appendChild(logo);
                const span = document.createElement('span');
                span.textContent = equipo.nombre;
                button.appendChild(span);
                button.onclick = () => handleTeamButtonClick(equipo.nombre);
                dropdownContent.appendChild(button);
            });
        })
        .catch(error => console.error('Error en cargarEquipos:', error));
}

function handleTeamButtonClick(equipo) {
    fetch(`prueba.php?equipo=${equipo}`)
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos (equipo):', data);  // Verifica los datos recibidos
            const teamDetails = document.getElementById('team-details');
            if (data && Object.keys(data).length > 0) {
                teamDetails.innerHTML = `
                    <h2 style="margin-top:5vh;">${data.nombre}</h2>
                    <table style="border-collapse: collapse; border: 5px solid #000; width: 100%; margin-top: 5vh;">
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Creación</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.creacion}</td>
                        </tr>
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Goles Totales</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.goles_totales}</td>
                        </tr>
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Partidos Totales</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.partidos_totales}</td>
                        </tr>
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Partidos Ganados</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.partidos_ganados}</td>
                        </tr>
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Partidos Empatados</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.partidos_empatados}</td>
                        </tr>
                        <tr>
                            <th style="border: 3px solid #000; padding: 15px;">Puntos Extras</th>
                            <td style="border: 3px solid #000; padding: 15px;">${data.puntos_extras}</td>
                        </tr>
                    </table>
                    <br>
                    <img src="${data.logo}" alt="Logo del equipo" width="100" height="100" style="margin-top: 2vh;">
                `;
            } else {
                teamDetails.innerHTML = '<p>No se encontraron detalles del equipo.</p>';
            }
        })
        .catch(error => console.error('Error en handleTeamButtonClick:', error));
}
