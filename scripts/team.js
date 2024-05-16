function playerSquares() {
  var selectedLiga = document.querySelector('input[name="liga"]:checked')
  if (!selectedLiga) {
    alert("Please select a league.");
    return;
  }
  var modality = selectedLiga.value;
  var playersDiv = document.getElementById("players");
  playersDiv.classList.add("fade-out");
  setTimeout(() => {
  if (modality == "LVDorada") {
    playersDiv.innerHTML = `
      <table class="table-center">
      <tr>
        <td>
          <label for="email">Correo electrónico: </label>
          <input type="text" name="email">
        </td>
      </tr>
      <tr>
        <td>
          <label for="name">Nombre completo: </label>
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <td>
          <label for="age">Edad: </label>
          <input type="text" name="age">
        </td>
      </tr>
      <tr>
        <td>
          <label for="col">Colonia: </label>
          <input type="text" name="col">
        </td>
      </tr>
      <tr>
        <td>
          <label for="phoneNumber">Teléfono de Contacto (WhatsApp): </label>
          <input type="text" name="phoneNumber">
        </td>
      </tr>
      <tr>
        <td>
          <label for="teamName">Nombre del equipo: </label>
          <input type="text" name="teamName">
        </td>
      </tr>
      <tr>
        <td>
          <label for="discovery">¿Cómo te enteraste de la Liga de Fútbol 5 "Madriguera"? </label>
          <br>
          <div>
            <input type="radio" name="medio" value="SNLeague">Redes Sociales de la Liga</input>
            <br>
            <input type="radio" name="medio" value="SNTopos">Redes Sociales de Topos FC</input>
            <br>
            <input type="radio" name="medio" value="invitation">Invitación Directa</input>
            <br>
            <input type="radio" name="medio" value="advertising">Publicidad Física</input>
         </div>
        </td>
      </tr>
      </table>
      <br>
      <table>
        <tr>
          <td>
            <h3>Autorizaciones</h3>
          </td>
        </tr>
        <tr>
          <td>
            <p><b>En esta sección aceptarás los términos y condiciones sobre tu participación en La Liga de Fútbol 5 "Madriguera"</b></p>
          </td>
        </tr>
        <tr>
          <td>
            <p><b>Por favor, lee todos los formatos presentes en las ligas de cada sección.</b></p>
          </td>
        </tr>
        <tr>
          <td>
            <p><b>Deberás entregar una identificación oficial vigente con copia</b></p>
          </td>
        </tr>
        <tr>
          <td>
            <p><strong>NOTA IMPORTANTE:</strong><b> En caso de ser menor de edad, deberás entregar copia de la identificación oficial vigente de tu tutor legal y de tu responsable durante el torneo, así como tu hoja responsiva impresa con la firma de tutor legal y de tu acompañante al evento (sólo en caso de que tu acompañante y tu tutor legal sean personas distintas)</b></p>
          </td>
        </tr>
      </table>
      <br>
      <table>
        <tr>
          <td>
            <label for="minAge">¿Eres mayor de edad? </label>
            <br>
            <input type="radio" name="ageReq" value="true">Sí</input>
            <br>
            <input type="radio" name="ageReq" value="false">No</input>
          </td>
        </tr>
        <tr>
          <td>
            <p>En caso de ser menor de edad coloca el nombre completo de tu tutor legal (En caso de ser mayor de edad, responde NA)</p>
            <input type="text" name="tutor">No</input>
          </td>
        </tr>
      </table>
      `;    
  } else if (modality == "LVEstrella") {
    playersDiv.innerHTML = `
    <table class="table-center">
      <tr>
        <td class="td-center" colspan="4">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
        <td class="td-center" colspan="4">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
        <td class="td-center" colspan="4">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
        <td class="td-center" colspan="4">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
       </tr>
       <tr>
          <td class="td-center" colspan="4">
              <input placeholder='Nombre completo'/>
          </td>
          <td class="td-center" colspan="4">
            <input placeholder='Nombre completo'/>
          </td>
          <td class="td-center" colspan="4">
              <input placeholder='Nombre completo'/>
          </td>
          <td class="td-center" colspan="4">
              <input placeholder='Nombre completo'/>
          </td>
        </tr>
        <tr>
          <td class="td-filler"></td>
          <td class="td-filler"></td>
        </tr>
       <tr>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
              <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/> 
          </td>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
              <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
          </td>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
              <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
          </td>
          <td class="td-filler"></td>
       </tr>
       <tr>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
            <input placeholder='Nombre completo' />
          </td>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
            <input placeholder='Nombre completo' />
          </td>
          <td class="td-filler"></td>
          <td class="td-center" colspan="4">
            <input placeholder='Nombre completo' />
          </td>
          <td class="td-filler"></td>
          <td class="td-filler"></td>
       </tr>
      </table>`;
  } else if (modality == "LFTalpa") {
    playersDiv.innerHTML = `
        <table class="table-center">
        <tr>
        <td class="td-center" colspan="3">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
        <td class="td-center" colspan="3">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
        <td class="td-center" colspan="3">
            <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
        </td>
       </tr>
       <tr>
          <td class="td-center" colspan="3">
              <input placeholder='Nombre completo'/>
          </td>
          <td class="td-center" colspan="3">
            <input placeholder='Nombre completo'/>
          </td>
          <td class="td-center" colspan="3">
              <input placeholder='Nombre completo'/>
          </td>
        </tr>
        <tr>
          <td class="td-filler"></td>
        </tr>
           <tr>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
           </tr>
           <tr>
              <td class="td-center" colspan="3">
                  <input placeholder='Nombre completo'/>
              </td>
              <td class="td-center" colspan="3">
                <input placeholder='Nombre completo'/>
              </td>
              <td class="td-center" colspan="3">
                  <input placeholder='Nombre completo'/>
              </td>
            </tr>
              <tr>
            <td class="td-filler"></td>
          </tr>
            <tr>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
            <td class="td-center" colspan="3">
                <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
            </td>
           </tr>
           <tr>
              <td class="td-center" colspan="3">
                  <input placeholder='Nombre completo'/>
              </td>
              <td class="td-center" colspan="3">
                <input placeholder='Nombre completo'/>
              </td>
              <td class="td-center" colspan="3">
                  <input placeholder='Nombre completo'/>
              </td>
            </tr>`;
  } else {
    playersDiv.innerHTML = `
      <h3>
        <p>Escoja una de las opciones en el cuadro de opciones anterior.</p>
      </h3>`;
  }
  playersDiv.classList.remove("fade-in");
  playersDiv.classList.add("fade-out");
  setTimeout(() => {
    playersDiv.classList.remove("fade-out");
  }, 300);
  }, 300);
}