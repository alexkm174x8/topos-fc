function reservationDone(){
    alert("La reservación ha sido AGENDADA.")
}

function reservationDenied(){
   alert("La reservación ha sido DENEGADA.")
}

function statsPosted(){
    alert("Las estadísticas han sido publicadas.")
}

function changeLeague(value){
    if (value != "modality"){
        window.location.assign(value + '.php')
    }
}