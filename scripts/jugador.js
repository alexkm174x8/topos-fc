function openAddPlayerModal(teamId) {
    const modal = document.getElementById("addPlayerModal");
    const modalBody = modal.querySelector('.modal-body');
    const url = `createJugadores.php?id=${teamId}`;

    console.log("Fetching URL for player:", url);

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
            console.error("Fetch error for player:", error);
        });
}

function openUpdatePlayerModal(playerId) {
    const modal = document.getElementById("updatePlayerModal");
    const modalBody = modal.querySelector('.modal-body');
    const url = `updateJugadores.php?id=${playerId}`;

    console.log("Fetching URL for player:", url);

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
            console.error("Fetch error for player:", error);
        });
}

function openShowPlayerModal(playerId) {
    const modal = document.getElementById("showPlayerModal");
    const modalBody = modal.querySelector('.modal-body');
    const url = `informacion.php?id=${playerId}`;

    console.log("Fetching URL for player info:", url);

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
            console.error("Fetch error for player info:", error);
        });
}

document.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll(".modal");
    const closeButtons = document.querySelectorAll(".close");

    closeButtons.forEach(close => {
        close.onclick = function() {
            this.parentElement.parentElement.style.display = "none";
        }
    });

    window.onclick = function(event) {
        modals.forEach(modal => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
});

function setDefaultImage(img) {
    img.onerror = null;
    img.src = 'images/topos_logo.png';
}

function closeWindow() {
    window.close();
}