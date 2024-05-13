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
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});

// Obtén todos los elementos <li> que representan los días del calendario
const dayElements = document.querySelectorAll(".days li");

// Agrega un evento de clic a cada elemento <li> del calendario
dayElements.forEach(day => {
    day.addEventListener("click", () => {
        // Remueve la clase 'selected' de todos los elementos <li> excepto el día actual
        dayElements.forEach(d => {
            if (d !== day && !d.classList.contains('today')) {
                d.classList.remove('selected');
                d.style.color = ''; // Restablece el color del número
            }
        });

        // Añade la clase 'selected' al día clickeado
        day.classList.add('selected');
        day.style.color = '#fff'; // Cambia el color del número a blanco
        
        // Mueve el wrapper hacia la izquierda con animación
        const wrapper = document.querySelector(".wrapper");
        wrapper.style.transition = "transform 0.5s ease"; // Define una transición suave de 0.5 segundos
        wrapper.style.transform = "translateX(-215px)";

        // Mueve el reservation-wrapper hacia la derecha con animación
        const reservationWrapper = document.querySelector(".reservation-wrapper");
        reservationWrapper.style.transition = "transform 0.5s ease"; // Define una transición suave de 0.5 segundos
        reservationWrapper.style.transform = "translateX(215px)";
        
        // Puedes ajustar la duración y la función de temporización de la transición según tus preferencias.
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
});

// Agrega un evento de clic a todo el documento para cerrar el div si se hace clic fuera de él
document.addEventListener("click", function(event) {
    if (!iniciaResvDiv.contains(event.target) && event.target !== reservaButton) {
        // Si se hace clic fuera del div o del botón, quita la clase de animación
        iniciaResvDiv.classList.remove("mostrar");
    }
});
