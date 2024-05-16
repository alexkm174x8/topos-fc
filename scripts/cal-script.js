const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
              "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        let isPastDay = date.getDate() > i && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "past" : ""; // added class for past days
        liTag += `<li class="${isToday} ${isPastDay}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // Obteniendo los íconos prev y next
    icon.addEventListener("click", () => { // Agregando evento de clic a ambos íconos
        if (icon.id === "prev") { // Si se hizo clic en el ícono de prev
            if (currMonth > date.getMonth() || currYear > date.getFullYear()) { // Solo retroceder si no estamos en el mes actual
                currMonth--; // Decrementando el mes actual
                if (currMonth < 0) { // Si el mes actual se vuelve negativo, retroceder un año
                    currMonth = 11;
                    currYear--;
                }
                renderCalendar(); // Volviendo a renderizar el calendario con el nuevo mes y año
            }
        } else { // Si se hizo clic en el ícono de next
            currMonth++; // Incrementando el mes actual
            if (currMonth > 11) { // Si el mes actual supera 11, avanzar un año
                currMonth = 0;
                currYear++;
            }
            renderCalendar(); // Volviendo a renderizar el calendario con el nuevo mes y año
        }
    });
});

// Obtén todos los elementos <li> que representan los días del calendario
const dayElements = document.querySelectorAll(".days li");

// Agrega un evento de clic a cada elemento <li> del calendario
dayElements.forEach(day => {
    day.addEventListener("click", () => {        
        if (!day.classList.contains('past')) { // Solo realiza la acción si el día no está en el pasado
            // Restaurar el color de los demás días
            dayElements.forEach(d => {
                if (d !== day && !d.classList.contains('today')) {
                    d.classList.remove('selected');
                    d.style.color = ''; // Restablece el color del número
                }
            });

            // Añadir la clase 'selected' al día clickeado
            day.classList.add('selected');
            day.style.color = '#fff'; // Cambia el color del número a blanco

            // Mueve el wrapper hacia la izquierda con animación
            const wrapper = document.querySelector(".wrapper");
            wrapper.style.transition = "transform 0.5s ease"; 
            wrapper.style.transform = "translateX(-215px)";

            // Mueve el reservation-wrapper hacia la derecha con animación
            const reservationWrapper = document.querySelector(".reservation-wrapper");
            reservationWrapper.style.transition = "transform 0.5s ease"; 
            reservationWrapper.style.transform = "translateX(215px)";

            // Obtener el día seleccionado
            const selectedDay = day.innerText;
            const selectedMonth = months[currMonth];
            
            // Actualizar el título de las reservaciones con el día seleccionado
            var reservationTitle = document.getElementById("calendar_title_rsv");
            reservationTitle.textContent = `Reservaciones del ${selectedDay} de ${selectedMonth}`;
        }
    });
});


// Obtén el botón de reserva por su ID
const reservaButton = document.getElementById("reservaButton");

// Obtén el div de inicia_resv por su ID
const iniciaResvDiv = document.querySelector(".inicia_resv");

// Agrega un evento de clic al botón de reserva
reservaButton.addEventListener("click", function() {
    // Agrega la clase de animación para mostrar el div
    iniciaResvDiv.classList.add("mostrar");
    // Desaparece el botón de reserva
    reservaButton.style.display = "none";
});

// Agrega un evento de clic a todo el documento para cerrar el div si se hace clic fuera de él
document.addEventListener("click", function(event) {
    if (!iniciaResvDiv.contains(event.target) && event.target !== reservaButton) {
        // Si se hace clic fuera del div o del botón, quita la clase de animación
        iniciaResvDiv.classList.remove("mostrar");
        // Vuelve a mostrar el botón de reserva
        reservaButton.style.display = "block";
    }
});