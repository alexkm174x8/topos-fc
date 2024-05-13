function playerSquares() {
  var modality = document.getElementById("fname").value;
  var playersDiv = document.getElementById("players");
  playersDiv.classList.add("fade-out");
  setTimeout(() => {
  if (modality == "soccer5") {
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
              <td class="td-filler"></td>
            </tr>
           <tr>
              <td class="td-filler"></td>
              <td class="td-center" colspan="3">
                  <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/> 
              </td>
              <td class="td-filler"></td>
              <td class="td-center" colspan="3">
                  <img src="images/default_user.png" alt="Imagen de usuario no registrado" class="ima_usuario"/>
              </td>
              <td class="td-filler"></td>
           </tr>
           <tr>
              <td class="td-filler"></td>
              <td class="td-center" colspan="3">
                <input placeholder='Nombre completo' />
              </td>
              <td class="td-filler"></td>
              <td class="td-center" colspan="3">
                <input placeholder='Nombre completo' />
              </td>
              <td class="td-filler"></td>
           </tr>
          </table>`;
  } else if (modality == "soccer7") {
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
  } else if (modality == "soccer9") {
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