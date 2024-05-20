const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), 
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), 
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), 
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); 
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { 
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { 
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                        && currYear === new Date().getFullYear() ? "active" : "";
        let isPastDay = date.getDate() > i && currMonth === new Date().getMonth() 
                        && currYear === new Date().getFullYear() ? "inactive" : ""; 
        liTag += `<li class="${isToday} ${isPastDay}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { 
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; 
    daysTag.innerHTML = liTag;

    // Asignar eventos de clic a los días del calendario después de renderizar
    const dayElements = document.querySelectorAll(".days li");
    dayElements.forEach(day => {
        day.addEventListener("click", () => {        
            if (!day.classList.contains('inactive')) { 
                dayElements.forEach(d => {
                    if (d !== day && !d.classList.contains('today')) {
                        d.classList.remove('selected');
                        d.style.color = ''; 
                    }
                });

                day.classList.add('selected');
                day.style.color = '#fff'; 

                const wrapper = document.querySelector(".wrapper");
                wrapper.style.transition = "transform 0.5s ease"; 
                wrapper.style.transform = "translateX(-215px)";

                const reservationWrapper = document.querySelector(".reservation-wrapper");
                reservationWrapper.style.transition = "transform 0.5s ease"; 
                reservationWrapper.style.transform = "translateX(215px)";

                const selectedDay = day.innerText;
                const selectedMonth = months[currMonth];
                
                var reservationTitle = document.getElementById("calendar_title_rsv");
                reservationTitle.textContent = `Reservaciones del ${selectedDay} de ${selectedMonth}`;
            }
        });
    });
};
function syncWrapperSizes() {
    const wrapper = document.querySelector('.wrapper');
    const reservationWrapper = document.querySelector('.reservation-wrapper');
    reservationWrapper.style.width = `${wrapper.offsetWidth}px`;
    reservationWrapper.style.height = `${wrapper.offsetHeight}px`;
}

window.addEventListener('load', syncWrapperSizes);
window.addEventListener('resize', syncWrapperSizes);

renderCalendar();
syncWrapperSizes()

prevNextIcon.forEach(icon => { 
    icon.addEventListener("click", () => { 
        if (icon.id === "prev") { 
            if (currMonth > date.getMonth() || currYear > date.getFullYear()) { 
                currMonth--; 
                if (currMonth < 0) { 
                    currMonth = 11;
                    currYear--;
                }
                renderCalendar();
                syncWrapperSizes()
            }
        } else { 
            currMonth++; 
            if (currMonth > 11) { 
                currMonth = 0;
                currYear++;
            }
            renderCalendar();
            syncWrapperSizes()
        }
    });
});

const reservaButton = document.getElementById("reservaButton");
const iniciaResvDiv = document.querySelector(".inicia_resv");

reservaButton.addEventListener("click", function() {
    iniciaResvDiv.classList.add("mostrar");
    reservaButton.style.display = "none";
});

document.addEventListener("click", function(event) {
    if (!iniciaResvDiv.contains(event.target) && event.target !== reservaButton) {
        iniciaResvDiv.classList.remove("mostrar");
        reservaButton.style.display = "block";
    }
});