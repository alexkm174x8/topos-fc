function toggleGirar(elemento) {
    elemento.classList.toggle('girando');
  }
  function eliminarReservacion(horaRsv, buttonElement) {
    if (confirm('¿Estás seguro de que deseas eliminar esta reservación?')) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "denegarRsv.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
          if (xhr.responseText === 'Reservación eliminada correctamente.') {
            // Remover el elemento de la interfaz de usuario
            var scrollItem = buttonElement.closest('.scroll-item');
            if (scrollItem) {
              scrollItem.remove();
            }
          } else {
            alert('Error al eliminar la reservación: ' + xhr.responseText);
          }
        }
      };
      xhr.send("horaRsv=" + encodeURIComponent(horaRsv));
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function(event) {
        event.stopPropagation();  // Evitar que el clic en el botón también gire la tarjeta
        var horaRsv = this.getAttribute('data-hora-rsv');
        eliminarReservacion(horaRsv, this);
      });
    });
  });

function toggleGirar(elemento) {
    elemento.querySelector('.scroll-item').classList.toggle('girando');
  }
function reservationDone(){
    alert("La reservación ha sido AGENDADA.")
}

function statsPosted(){
    alert("Las estadísticas han sido publicadas.")
}

function changeLeague(value){
    if (value != "modality"){
        window.location.assign(value + '.php')
    }
}