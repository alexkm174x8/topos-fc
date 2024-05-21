function reservationDone(){
    alert("La reservación ha sido AGENDADA.")
}

function reservationDenied(){
   alert("La reservación ha sido DENEGADA.")
}

function statsPosted(){
    alert("Las estadísticas han sido publicadas.")
}

function chooseLeague() {
  var formData = $('#leagueForm').serialize();
  $.ajax({
      type: 'POST',
      url: 'getInformacionLiga.php',
      data: formData,
      success: function(response) {
          $('#league').html(response);
      },
      error: function() {
          alert('Error loading data.');
      }
  });
}