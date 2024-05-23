var currentTeam = '';

function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdown-content");
    var teamStatsDiv = document.getElementById("team-stats");
    dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    teamStatsDiv.style.display = "none";
    currentTeam = '';
}

function handleTeamButtonClick(team) {
    var teams = {
        'Axolotes': { name: 'Axolotes', partidosJugados: 10, ganados: 5, perdidos: 2, empatados: 3, golesFavor: 20, golesContra: 15, puntosExtra: 2 },
        'Aguilas': { name: 'Aguilas', partidosJugados: 10, ganados: 4, perdidos: 4, empatados: 2, golesFavor: 19, golesContra: 16, puntosExtra: 2 },
        'Patos': { name: 'Patos', partidosJugados: 10, ganados: 6, perdidos: 2, empatados: 2, golesFavor: 24, golesContra: 14, puntosExtra: 3 },
        'Conejos': { name: 'Conejos', partidosJugados: 10, ganados: 5, perdidos: 3, empatados: 2, golesFavor: 22, golesContra: 17, puntosExtra: 2 }
    };

    var teamStatsDiv = document.getElementById("team-stats");
    var teamStatsBody = document.getElementById("team-stats-body");

    if (team !== currentTeam) {
        teamStatsBody.innerHTML =        "";
        currentTeam = team;
    } else {
        teamStatsDiv.style.display = "none";
        currentTeam = '';
        return;
    }

    var selectedTeam = teams[team];

    var tr = document.createElement("tr");

    Object.values(selectedTeam).forEach(function(value) {
        var td = document.createElement("td");
        td.textContent = value;
        tr.appendChild(td);
    });

    teamStatsBody.appendChild(tr);

    teamStatsDiv.style.display = "block";
}

