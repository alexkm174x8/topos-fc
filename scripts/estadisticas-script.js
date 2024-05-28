function toggleDropdown() {
    document.getElementById("dropdown-content").classList.toggle("show");
    document.getElementById("team-details").innerHTML = ""; // Limpiar los detalles del equipo
    cargarEquipos();
}

function cargarEquipos() {
    fetch('prueba.php')
        .then(response => response.json())
        .then(data => {
            const dropdownContent = document.getElementById('dropdown-content');
            dropdownContent.innerHTML = ''; // Clear existing content
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
        .catch(error => console.error('Error:', error));
}

function handleTeamButtonClick(equipo) {
    fetch(`prueba.php?equipo=${equipo}`)
        .then(response => response.json())
        .then(data => {
            const teamDetails = document.getElementById('team-details');
            if (data) {
                teamDetails.innerHTML = `
                    <h2>${data.nombre}</h2>
                    <table style="border-collapse: collapse; border: 4px solid #000; width: 100%; margin-top: 20px;">
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Creación</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.creacion}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Goles Totales</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.goles_totales}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Partidos Totales</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.partidos_totales}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Partidos Ganados</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.partidos_ganados}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Partidos Empatados</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.partidos_empatados}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #000; padding: 10px;">Puntos Extras</th>
                            <td style="border: 1px solid #000; padding: 10px;">${data.puntos_extras}</td>
                        </tr>
                    </table>
                    <br>
                    <img src="${data.logo}" alt="Logo del equipo" width="100" height="100" style="margin-top: 20px;">
                `;
            } else {
                teamDetails.innerHTML = '<p>No se encontraron detalles del equipo.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    cargarEquipos();
});
