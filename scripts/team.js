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
            <br>
          </td>
        </tr>
        <tr>
        <tr>
          <td>
            <p>En caso de ser menor de edad coloca el nombre completo de tu tutor legal (En caso de ser mayor de edad, responde NA)</p>
            <input type="text" name="tutor"></input>
            <br>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
          <td>
            <p><strong>Soy mayor de edad</strong> y autorizo el uso de mi imagen en usos de multimedia para la difusión del evento, a través del Comité Organizador del Torneo de Fútbol 5 "Madriguera" </p>
            <a href="https://drive.google.com/file/d/1YPWbkt8SNt5tcTi3ty6eJCwp7z4H4pJU/view?pli=1">*Consulta nuestro formato de uso de imagen para mayores de edad dando click en este enlace.</a>
            <br>
            <input type="radio" name="consent" value="true">Sí acepto</input>
            <br>
            <input type="radio" name="consent" value="false">No acepto</input>
            <br>
            <input type="radio" name="consent" value="false">Soy menor de edad</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
          <td>
            <p>Soy madre, padre o tutor de un menor de edad y autorizo el uso de imagen de mi hijo/a en usos de multimedia para la difusión del evento, a través del Comité Organizador del Torneo de Fútbol 5 "La Madriguera" </p>
            <a href="https://drive.google.com/file/d/1XaKUjhrQ_pD4izPLUyM_YAspJIuZ9Aun/view">*Consulta nuestro uso de imagen para menores de edad, dando click en este enlace.</a>
            <br>
            <input type="radio" name="consent" value="true">Sí acepto</input>
            <br>
            <input type="radio" name="consent" value="false">No acepto</input>
            <br>
            <input type="radio" name="consent" value="false">Soy menor de edad</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
          <td>
            <p>Me comprometo a no ingerir bebidas alcohólicas ni estupefacientes en ningún espacio designado para La Liga de Fútbol 5 "Madriguera" </p>
            <input type="radio" value="true">Acepto</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
        <tr>
          <td>
            <p>Deslindo y exonero de toda responsabilidad al Comité organizador de la Liga de Fútbol 5 "Madriguera" sus empleados, voluntarios, beneficiarios, consejeros, patrocinadores y demás relacionados al evento; de cualquier incidente. </p>
            <input type="radio" value="true">Acepto</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
        <tr>
          <td>
            <p>Autorizo al Comité Organizador de la Liga de Fútbol 5 "Madriguera" o a quien designe a que en caso de que ocurra algún incidente durante LAS ACTIVIDADES se me brinde la atención necesaria, y en dado caso, el traslado a alguna Unidad Médica cercana, con la finalidad de que se atienda la emergencia y deslindo de toda responsabilidad al Comité Organizador de la Liga de Fútbol 5 "Madriguera"  y LOS COLABORADORES por las acciones aquí referidas o por las consecuencias inmediatas o futuras que se pudieran derivar de las mismas. </p>
            <br>
            <p>Acepto que es mi responsabilidad la certeza y suficiencia de la información médica entregada al Comité Organizador de la Liga de Fútbol 5 "Madriguera" que sea relevante, desde el momento de la inscripción y/o antes de participar en LAS ACTIVIDADES, y que esta información será proporcionada a las personas que me atiendan en caso de accidente.</p>
            <br>
            <input type="radio" value="true">Acepto</input>
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