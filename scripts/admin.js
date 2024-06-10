// Función para girar las cartas de apartación
function toggleGirar(elemento) {
  elemento.classList.toggle('girando');
}

document.addEventListener('DOMContentLoaded', function () {
  // Función para ajustar el tamaño del texto dentro de su contenedor
  const fitTextToContainer = (element) => {
    const parentWidth = element.offsetWidth;
    let fontSize = parseInt(window.getComputedStyle(element, null).getPropertyValue('font-size'));
    element.style.fontSize = fontSize + 'px';

    // Se ajusta el tamaño de la fuente mientras haya desbordamiento y no sea menor a 10px
    while (element.scrollWidth > parentWidth && fontSize > 10) {
      fontSize -= 1;
      element.style.fontSize = fontSize + 'px';
    }
  };

  // Ajusta el tamaño del texto para cada elemento con la clase 'pinfo'
  const pinfoElements = document.querySelectorAll('.pinfo');
  pinfoElements.forEach(element => {
    fitTextToContainer(element);
  });

  // Vuelve a ajustar el tamaño del texto en los elementos 'pinfo' cuando se cambia el tamaño de la ventana
  window.addEventListener('resize', () => {
    pinfoElements.forEach(element => {
      fitTextToContainer(element);
    });
  });

  // Añade manejadores de eventos a los botones de aceptar y eliminar
  document.querySelectorAll('.accept').forEach(button => {
    button.addEventListener('click', function (event) {
      event.stopPropagation();
      var horaRsv = this.getAttribute('data-hora-rsv');
      actualizarEstadoReservacion(horaRsv, 'Aceptada', this);
    });
  });

  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (event) {
      event.stopPropagation();
      var horaRsv = this.getAttribute('data-hora-rsv');
      eliminarReservacion(horaRsv, this);
    });
  });

  // Añade manejadores de eventos a los botones de copiar
  document.querySelectorAll('.copy-btn').forEach(button => {
    button.addEventListener('click', function (event) {
      event.stopPropagation();
      var correo = this.getAttribute('data-correo');
      copiarAlPortapapeles(correo);
    });
  });

  // Función para manejar la aceptación de reservaciones
  function actualizarEstadoReservacion(horaRsv, estado, buttonElement) {
    console.log('Valor de horaRsv antes de enviar la solicitud:', horaRsv); // Registro de depuración
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actualizarRsv.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText);
        if (xhr.responseText === 'Estado actualizado correctamente.') {
          var scrollItem = buttonElement.closest('.scroll-item');
          if (scrollItem) {
            scrollItem.remove();
            checkNoReservations(); // Verifica si ya no quedan reservaciones
          }
        } else {
          alert('Error al actualizar el estado: ' + xhr.responseText);
        }
      }
    };
    xhr.send("horaRsv=" + encodeURIComponent(horaRsv) + "&estado=" + encodeURIComponent(estado));
  }

  // Función para manejar la eliminación de reservaciones
  function eliminarReservacion(horaRsv, buttonElement) {
    if (confirm('¿Estás seguro de que deseas eliminar esta reservación?')) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "eliminar_reservacion.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
          if (xhr.responseText === 'Reservación eliminada correctamente.') {
            var scrollItem = buttonElement.closest('.scroll-item');
            if (scrollItem) {
              scrollItem.remove();
              checkNoReservations(); // Verifica si ya no quedan reservaciones
            }
          } else {
            alert('Error al eliminar la reservación: ' + xhr.responseText);
          }
        }
      };
      xhr.send("horaRsv=" + encodeURIComponent(horaRsv));
    }
  }

  // Función para copiar el correo al portapapeles
// Función para copiar el correo al portapapeles
  function copiarAlPortapapeles(correo) {
    var tempInput = document.createElement('input');
    tempInput.value = correo;
    document.body.appendChild(tempInput);
    tempInput.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      alert('Correo copiado al portapapeles: ' + correo);
    } catch (err) {
      console.error('Error al copiar al portapapeles: ', err);
    }
    document.body.removeChild(tempInput);
  }


  // Función para verificar si no hay más reservaciones y mostrar un mensaje si es necesario
  function checkNoReservations() {
    const container = document.getElementById('reservations-container');
    if (container.children.length === 0) {
      const noReservationsMessage = document.createElement('div');
      noReservationsMessage.className = 'scroll-item no-reservations';
      noReservationsMessage.innerHTML = `
        <div class="contenido">
          <p>No hay reservaciones pendientes</p>
        </div>
      `;
      container.appendChild(noReservationsMessage);
    }
  }
});

// Función para cambiar entre CRUDS
function changeLeague(value) {
  if (value !== 'admin') {
    document.querySelector('#leagueSelector option[value="admin"]').style.display = 'none';
  }
  $('.leagueSection').hide();
  if (value !== 'admin') {
    $('#' + value).show();
  }
  document.querySelectorAll('.leagueSection').forEach(section => section.style.display = 'none');
  if (value !== 'admin') {
    document.getElementById(value).style.display = 'block';
  }
}

function openAddMatchModal(leagueId) {
  const modal = document.getElementById("addMatchModal");
  const modalBody = modal.querySelector('.modal-body');
  const url = `createPartido.php?idLiga=${leagueId}`;

  console.log("Fetching URL for match:", url);

  fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text();
      })
      .then(html => {
        modalBody.innerHTML = html;
        modal.style.display = "block";
      })
      .catch(error => {
        modalBody.innerHTML = `<p>Error loading form: ${error.message}</p>`;
        console.error("Fetch error for match:", error);
      });
}

function openAddTeamModal(leagueId) {
  const modal = document.getElementById("addTeamModal");
  const modalBody = modal.querySelector('.modal-body');
  const url = `createEquipos.php?idLiga=${leagueId}`;

  console.log("Fetching URL for team:", url);

  fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text();
      })
      .then(html => {
        modalBody.innerHTML = html;
        modal.style.display = "block";
      })
      .catch(error => {
        modalBody.innerHTML = `<p>Error loading form: ${error.message}</p>`;
        console.error("Fetch error for team:", error);
      });
}

function openUpdateTeamModal(teamId) {
  const modal = document.getElementById("updateTeamModal");
  const modalBody = modal.querySelector('.modal-body');
  const url = `updateEquipo.php?id=${teamId}`;

  console.log("Fetching URL for update:", url);

  fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text();
      })
      .then(html => {
        modalBody.innerHTML = html;
        modal.style.display = "block";
      })
      .catch(error => {
        modalBody.innerHTML = `<p>Error loading form: ${error.message}</p>`;
        console.error("Fetch error for update:", error);
      });
}

function loadPlayers(teamId) {
  $.ajax({
    url: 'jugadores.php',
    type: 'GET',
    data: {id: teamId},
    success: function(data) {
      $('#crudContainer').hide();
      $('#players-content').html($(data).find('.container').html());
      $('#players-container').show();
    },
    error: function() {
      alert('Error al cargar los jugadores.');
    }
  });
}

$(document).ready(function(){
  $('#back-button').click(function(){
    $('#players-container').hide();
    $('#players-content').empty();
    $('#crudContainer').show();
  });
});