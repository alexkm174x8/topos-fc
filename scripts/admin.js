function reservationDone(){
    alert("La reservación ha sido AGENDADA.")
}

function reservationDenied(){
   alert("La reservación ha sido DENEGADA.")
}

function statsPosted(){
    alert("Las estadísticas han sido publicadas.")
}

function chooseLeague(){
    var modality = document.getElementById("fname").value;
    var leaguesDiv = document.getElementById("league");
    
    if (modality == "LVDorada"){
        leaguesDiv.innerHTML = `
        <table>
            <tr>
              <td>
                <table class="info_cont">
                  <tr>
                    <td>
                      <img src="images/usuario.png" alt="Imagen equipo 1" class="ima_equipo">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" placeholder="Equipo 1" class="fill"/>
                    </td>
                  </tr>
                </table>
              </td>
              <td rowspan="2" class="write">
                <input type="text" placeholder="Puntaje Equipo 1"/>
              </td>
              <td rowspan="2" class="write">
                <input type="text" placeholder="Puntaje Equipo 2"/>
              </td>
              <td>
                <table class="info_cont" id="left_team">
                  <tr>
                    <td>
                      <img src="images/usuario.png" alt="Imagen equipo 2" class="ima_equipo">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" placeholder="Equipo 2" class="fill"/>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
                <td>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="button-colors" onclick="statsPosted()"><strong>Publicar partido.</strong></button>
                </td>
            </tr>
          </table>`;
    } else if (modality == "LVEstrella"){
        leaguesDiv.innerHTML = `
            <table>
                <tr>
                <td>
                    <table class="info_cont">
                    <tr>
                        <td>
                        <img src="images/usuario.png" alt="Imagen equipo 1" class="ima_equipo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" placeholder="Equipo 1" class="fill"/>
                        </td>
                    </tr>
                    </table>
                </td>
                <td rowspan="2" class="write">
                    <input type="text" placeholder="Puntaje Equipo 1"/>
                </td>
                <td rowspan="2" class="write">
                    <input type="text" placeholder="Puntaje Equipo 2"/>
                </td>
                <td>
                    <table class="info_cont" id="left_team">
                    <tr>
                        <td>
                        <img src="images/usuario.png" alt="Imagen equipo 2" class="ima_equipo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" placeholder="Equipo 2" class="fill"/>
                        </td>
                    </tr>
                    </table>
                </td>
                </tr>
            </table>`;
    } else if (modality == "LFTalpa"){
        leaguesDiv.innerHTML = `
        <table>
            <tr>
              <td>
                <table class="info_cont">
                  <tr>
                    <td>
                      <img src="images/usuario.png" alt="Imagen equipo 1" class="ima_equipo">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" placeholder="Equipo 1" class="fill"/>
                    </td>
                  </tr>
                </table>
              </td>
              <td rowspan="2" class="write">
                <input type="text" placeholder="Puntaje Equipo 1"/>
              </td>
              <td rowspan="2" class="write">
                <input type="text" placeholder="Puntaje Equipo 2"/>
              </td>
              <td>
                <table class="info_cont" id="left_team">
                  <tr>
                    <td>
                      <img src="images/usuario.png" alt="Imagen equipo 2" class="ima_equipo">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" placeholder="Equipo 2" class="fill"/>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>`;
    }
}
