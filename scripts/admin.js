 function toggleGirar(elemento) {
  elemento.classList.toggle('girando');
}

  function actualizarEstadoReservacion(horaRsv, estado, buttonElement) {
  console.log('Valor de horaRsv antes de enviar la solicitud:', horaRsv); // Registro de depuración
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "actualizarRsv.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
  console.log(xhr.responseText);
  if (xhr.responseText === 'Estado actualizado correctamente.') {
  var scrollItem = buttonElement.closest('.scroll-item');
  if (scrollItem) {
  scrollItem.remove();
}
} else {
  alert('Error al actualizar el estado: ' + xhr.responseText);
}
}
};
  xhr.send("horaRsv=" + encodeURIComponent(horaRsv) + "&estado=" + encodeURIComponent(estado));
}

  document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.accept').forEach(button => {
    button.addEventListener('click', function(event) {
      event.stopPropagation();
      var horaRsv = this.getAttribute('data-hora-rsv');
      actualizarEstadoReservacion(horaRsv, 'Aceptada', this);
    });
  });

  document.querySelectorAll('.delete-btn').forEach(button => {
  button.addEventListener('click', function(event) {
  event.stopPropagation();
  var horaRsv = this.getAttribute('data-hora-rsv');
  eliminarReservacion(horaRsv, this);
});
});
});

  function eliminarReservacion(horaRsv, buttonElement) {
  if (confirm('¿Estás seguro de que deseas eliminar esta reservación?')) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "eliminar_reservacion.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
  console.log(xhr.responseText);
  if (xhr.responseText === 'Reservación eliminada correctamente.') {
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