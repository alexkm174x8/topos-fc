function sendRegister(){
  alert("Su registro ha sido enviado.")
}

function validateForm(event) {
  event.preventDefault();

  document.querySelectorAll('.error-message').forEach(el => el.remove());

  let isFormValid = true;
  let firstInvalidField = null;

  const radioGroups = [
    'medio',
    'ageReq',
    'consent',
    'parentConsent',
    'noAlcohol',
    'responsabilityRelease',
    'responsabilityTenant'
  ];

  for (const groupName of radioGroups) {
    const radios = document.getElementsByName(groupName);
    let groupChecked = false;

    for (const radio of radios) {
      if (radio.checked) {
        groupChecked = true;
        break;
      }
    }

    if (!groupChecked) {
      const errorMessage = document.createElement('span');
      errorMessage.className = 'error-message';
      errorMessage.style.color = 'red';
      errorMessage.innerText = ' Llene este campo también';
      radios[0].parentNode.appendChild(errorMessage);
      
      if (!firstInvalidField) {
        firstInvalidField = radios[0];
      }
      isFormValid = false;
    }
  }

  // Check if all required text inputs are filled
  const requiredInputs = [
    'name',
    'lastNames',
    'email',
    'age',
    'col',
    'phoneNumber',
    'teamName',
    'teamLogo',
    'tutor'
  ];

  for (const inputName of requiredInputs) {
    const input = document.querySelector(`input[name="${inputName}"]`);
    if (!input || input.value.trim() === '') {
      const errorMessage = document.createElement('span');
      errorMessage.className = 'error-message';
      errorMessage.style.color = 'red';
      errorMessage.innerText = ' Llene este campo.';
      input.parentNode.appendChild(errorMessage);

      if (!firstInvalidField) {
        firstInvalidField = input;
      }
      isFormValid = false;
    }
  }

  if (!isFormValid) {
    firstInvalidField.focus();
    alert('Llene todos los campos antes de enviar su solicitud');
    return;
  }

  // If validation passes, proceed with registration and form submission
  sendRegister();
  document.getElementById('myForm').submit();
}

window.onload = function() {
  formSummon(); // Call formSummon on load if needed to initialize the form
};

function formSummon() {
  var selectedLiga = document.querySelector('input[name="idLiga"]:checked');
  if (!selectedLiga) {
      return;
  }
  var modality = selectedLiga.value;
  var playersDiv = document.getElementById("players");
  if (modality != "") {
      playersDiv.innerHTML = `
    <form id="myForm" action="registerTeamOrPlayer.php" method="post" onsubmit="validateForm(event)" novalidate>
      <input type="hidden" name="idLiga" value="${modality}">
      <input type="hidden" name="teamId" id="teamId" value="">
      <table class="table-center">
      <tr>
        <td class="td-center">
          <label for="names">Nombre/s: </label>
          <input type="text" name="name" required>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="lastNames">Apellidos: </label>
          <input type="text" name="lastNames" required>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="email">Correo electrónico: </label>
          <input type="email" name="email" required>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="age">Edad: </label>
          <input type="number" name="age" required>
          <br>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="col">Colonia: </label>
          <input type="text" name="col" required>
        </td>
      </tr>
        <td class="td-center">
          <label for="phoneNumber">Teléfono de Contacto (WhatsApp): </label>
          <input type="number" name="phoneNumber" required>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="teamName">Nombre del equipo: </label>
          <input type="text" name="teamName" required>
        </td>
      </tr>
      <tr>
        <td class="td-center">
          <label for="teamLogo">URL/Enlace del logo del equipo: </label>
          <input type="text" name="teamLogo" required>
        </td>
      </tr>
      <tr>
        <td>
          <br>
        </td>
      <tr>
      <tr class="strongyellow">
        <td class="td-center">
          <label for="discovery">¿Cómo te enteraste de la Liga de Fútbol 5 "Madriguera"? </label>
        </td>
      </tr>
      <tr class="weakyellow">
        <td class="td-center">
          <input type="radio" name="medio" value="Redes sociales de la liga" required>Redes Sociales de la Liga</input>
        </td>
      </tr>
      <tr class="weakyellow">
        <td class="td-center">
          <input type="radio" name="medio" value="Redes Sociales de Topos">Redes Sociales de Topos FC</input>
        </td>
      </tr>
      <tr class="weakyellow">
        <td class="td-center">
          <input type="radio" name="medio" value="Invitación directa">Invitación Directa</input>
        </td>
      </tr>
      <tr class="weakyellow">
        <td class="td-center">
         <input type="radio" name="medio" value="Publicidad física">Publicidad Física</input>
        </td>
      </tr>
      <tr class="weakyellow">
        <td class="td-center">
         <input type="radio" name="medio" value="Otros">Otros</input>
        </td>
      </tr>
      </table>
      <table class="table-center">
        <tr class="strongred">
          <td class="td-left">
            <p class="white-text"><strong>Autorizaciones</strong></p>
          </td>
        </tr>
        <tr class="weakred">
          <td class="td-center">
            <p><b>En esta sección aceptarás los términos y condiciones sobre tu participación en La Liga de Fútbol 5 "Madriguera"</b></p>
          </td>
        </tr>
        <tr class="weakred">
          <td class="td-center">
          <br>
            <p><b>Por favor, lee todos los formatos presentes en las ligas de cada sección.</b></p>
          </td>
        </tr>
        <br>
        <tr class="weakred">
          <td class="td-center">
            <p><b>Deberás entregar una identificación oficial vigente con copia</b></p>
          </td>
        </tr>
        <br>
        <tr class="weakred">
          <td class="td-center">
            <br>
            <p><strong>NOTA IMPORTANTE:</strong><b> En caso de ser menor de edad, deberás entregar copia de la identificación oficial vigente de tu tutor legal y de tu responsable durante el torneo, así como tu hoja responsiva impresa con la firma de tutor legal y de tu acompañante al evento (sólo en caso de que tu acompañante y tu tutor legal sean personas distintas)</b></p>
          </td>
        </tr>
      </table>
      <br>
      <table class="table-center">
        <tr class="strongyellow">
          <td class="td-center">
            <label for="minAge">¿Eres mayor de edad? </label>
          </td>
        </tr>
        <tr class="weakyellow">
          <td class="td-center">
            <input type="radio" name="ageReq" value="Sí" required>Sí</input>
          </td>
        </tr>
        <tr class="weakyellow">
          <td class="td-center">
            <input type="radio" name="ageReq" value="No">No</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
        <tr class="strongblue">
          <td class="td-center">
            <p class="white-text">En caso de ser menor de edad coloca el nombre completo de tu tutor legal (En caso de ser mayor de edad, responde NA)</p>
          </td>
        </tr>
        <tr class="weakblue">
          <td class="td-center">
            <input type="text" name="tutor" class="white-text" required></input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr class="strongyellow">
          <td class="td-center">
            <p><strong>Soy mayor de edad</strong> y autorizo el uso de mi imagen en usos de multimedia para la difusión del evento, a través del Comité Organizador del Torneo de Fútbol 5 "Madriguera" </p>
            <a href="https://drive.google.com/file/d/1YPWbkt8SNt5tcTi3ty6eJCwp7z4H4pJU/view?pli=1" class="custom-link">*Consulta nuestro formato de uso de imagen para mayores de edad dando click en este enlace.</a> 
          </td>
        </tr>
        <tr class="weakyellow">
          <td class="td-center">
            <input type="radio" name="consent" value="Aceptado" required>Sí acepto</input>
          </td>
        </tr>
        <tr class="weakyellow">
          <td class="td-center">
            <input type="radio" name="consent" value="No aceptado">No acepto</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr class="strongblue">
          <td class="td-center">
            <p class="white-text">Soy madre, padre o tutor de un menor de edad autorizo el uso de la imagen de mi hijo (a) en usos de multimedia para la difusión del evento, a través del Comité Organizador del Torneo de Fútbol 5 "Madriguera".</p>
            <a href="https://drive.google.com/file/d/1YPWbkt8SNt5tcTi3ty6eJCwp7z4H4pJU/view?pli=1" class="custom-link">*Consulta nuestro formato de uso de imagen para menores de edad dando click en este enlace.</a>
          </td>
        </tr>
        <tr class="weakblue">
          <td class="td-center">
            <input type="radio" name="parentConsent" value="Aceptado" required>Sí acepto</input>
          </td>
        </tr>
        <tr class="weakblue">
          <td <td class="td-center">
           <input type="radio" name="parentConsent" value="No aceptado">No acepto</input>
          </td>
        </tr>
        <tr class="weakblue">
          <td <td class="td-center">
            <input type="radio" name="parentConsent" value="Menor de edad">Soy menor de edad</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr class="strongyellow">
          <td class="td-center">
            <p>Me comprometo a no ingerir bebidas alcohólicas ni estupefacientes en ningún espacio designado para La Liga de Fútbol 5 "Madriguera" </p>
          </td>
        </tr>
        <tr class="weakyellow">
          <td <td class="td-center">
           <input type="radio" name="noAlcohol" value="true" required>Acepto</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
        <tr class="strongblue">
          <td class="td-center">
            <p class="white-text">Deslindo y exonero de toda responsabilidad al Comité organizador de la Liga de Fútbol 5 "Madriguera" sus empleados, voluntarios, beneficiarios, consejeros, patrocinadores y demás relacionados al evento; de cualquier incidente. </p>
          </td>
        </tr>
        <tr class="weakblue">
          <td <td <td class="td-center">
            <input type="radio" name="responsabilityRelease" value="true" required>Acepto</input>
          </td>
        </tr>
        <tr>
          <td>
            <br>
          </td>
        </tr>
        <tr>
        <tr class="strongyellow">
          <td class="td-center">
            <p>Autorizo al Comité Organizador de la Liga de Fútbol 5 "Madriguera" o a quien designe a que en caso de que ocurra algún incidente durante LAS ACTIVIDADES se me brinde la atención necesaria, y en dado caso, el traslado a alguna Unidad Médica cercana, con la finalidad de que se atienda la emergencia y deslindo de toda responsabilidad al Comité Organizador de la Liga de Fútbol 5 "Madriguera"  y LOS COLABORADORES por las acciones aquí referidas o por las consecuencias inmediatas o futuras que se pudieran derivar de las mismas. </p>
            <br>
            <p>Acepto que es mi responsabilidad la certeza y suficiencia de la información médica entregada al Comité Organizador de la Liga de Fútbol 5 "Madriguera" que sea relevante, desde el momento de la inscripción y/o antes de participar en LAS ACTIVIDADES, y que esta información será proporcionada a las personas que me atiendan en caso de accidente.</p>
          </td>
        </tr>
        <tr class="weakyellow">
          <td class="td-center">
          <input type="radio" name="responsabilityTenant" value="true" required>Acepto</input>
          </td>
        </tr>
      </table>
      <br>
    <div>
      <button type="submit">
        <strong>Registrar equipo</strong>
      </button>
    </div> 
    </form>
      `;    
  } else {
    playersDiv.innerHTML = `
      <h3>
        <p>Escoja una de las opciones en el cuadro de opciones anterior.</p>
      </h3>`;
  }
}