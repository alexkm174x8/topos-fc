<!DOCTYPE html>
<html>
  <head>
    <title>Topos: Administrador</title>
    <meta charset ="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-styles">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      #divInicial {
        padding-left: 20px;
      }
      ul, ol {
        list-style-type: none;
      }
      .scroll-container {
        width: 100vw;
        white-space: nowrap;
        overflow-x: auto;
      }
      .scroll-item {
        perspective: 1000px;
        position: relative;
        display: inline-block;
        width: 210px;
        height: 300px;
        margin-right: 10px;
        margin-bottom: 10px;
        background-color: #f0f0f0;
        text-align: center;
        padding: 5px;
        background: #f9ba0c;
        border-radius: 15px;
        cursor: pointer;
        transition: transform 0.6s;
      }
      .scroll-item .contenido {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        transition: opacity 0.6s;
      }
      .scroll-item img {
        width: 105px;
        height: auto;
        max-height: 100px;
      }
      .pinfo {
        padding: 5px;
        margin: 10px;
        border-radius: 12px;
        background: wheat;
      }
      .girando {
        transform: rotateY(180deg);
      }
      .girando .contenido {
        opacity: 0;
      }
      .back-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        background-color: #f9ba0c;
        border-radius: 15px;
        padding: 5px;
        box-sizing: border-box;
        transform: rotateY(180deg);
      }
      .girando .back-content {
        display: block;
      }
      button {
        border-radius: 10px;
      }
    </style>

    <script>
      function toggleGirar(elemento) {
        elemento.classList.toggle('girando');
      }

      function actualizarEstadoReservacion(horaRsv, estado, buttonElement) {
  console.log('Valor de horaRsv antes de enviar la solicitud:', horaRsv); // Registro de depuración
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "actualizarRsv.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
      if (xhr.responseText === 'Estado actualizado correctamente.') {
        var scrollItem = buttonElement.closest('.scroll-item');
        if (scrollItem) {
          scrollItem.remove();
        }
      } else {
        alert('Error al actualizar el estado: ' + xhr.responseText);
      }
    }
  };
  xhr.send("horaRsv=" + encodeURIComponent(horaRsv) + "&estado=" + encodeURIComponent(estado));
}

      document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.accept').forEach(button => {
          button.addEventListener('click', function(event) {
            event.stopPropagation();
            var horaRsv = this.getAttribute('data-hora-rsv');
            actualizarEstadoReservacion(horaRsv, 'Aceptada', this);
          });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
          button.addEventListener('click', function(event) {
            event.stopPropagation();
            var horaRsv = this.getAttribute('data-hora-rsv');
            eliminarReservacion(horaRsv, this);
          });
        });
      });

      function eliminarReservacion(horaRsv, buttonElement) {
        if (confirm('¿Estás seguro de que deseas eliminar esta reservación?')) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "eliminar_reservacion.php", true);
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              console.log(xhr.responseText);
              if (xhr.responseText === 'Reservación eliminada correctamente.') {
                var scrollItem = buttonElement.closest('.scroll-item');
                if (scrollItem) {
                  scrollItem.remove();
                }
              } else {
                alert('Error al eliminar la reservación: ' + xhr.responseText);
              }
            }
          };
          xhr.send("horaRsv=" + encodeURIComponent(horaRsv));
        }
      }
    </script>
  </head>
  <body>
    <div id='divInicial'>
      <h1>Herramientas de Administrador</h1>
      <ul>
        <li>
        <h2>Reservaciones Pendientes</h2>
        <div class="scroll-container">
        <?php
          require 'database.php';
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT nombre, apellido, email, motivo, horaRsv FROM reservacion WHERE estado = 'Pendiente'";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($result as $row) {
            $horaRsv = $row['horaRsv'];
            echo '<div class="scroll-item" onclick="toggleGirar(this)">
                    <div class="contenido">
                      <img src="images/usuario.png" alt="Imagen usuario" class="ima_usuario"><br><br>
                      <div>
                        <div class="pinfo">' . $row['nombre'] . ' ' . $row['apellido'] . '</div>
                        <div class="pinfo">' . $row['email'] . '</div>
                        <div class="pinfo">' . $row['horaRsv'] . '</div>
                        <br>
                        <button type="button" class="accept" data-hora-rsv="' . $horaRsv . '">Aceptar</button>
                        <button type="button" class="delete-btn" data-hora-rsv="' . $horaRsv . '">Eliminar</button>
                      </div>
                    </div>
                    <div class="back-content">
                      El motivo de la reservacion es:
                      <br>' . $row['motivo'] . '
                    </div>
                  </div>';
          }
          Database::disconnect();
        ?>
        </div>
        </li>
      </ul>
    </div>
    <h2>Añadir Datos Estadísticos</h2>
          <select class="button-colors" name="leagueChosen" id="fname" onchange="changeLeague(this.value)">
            <option value="admin">Seleccionar liga.</option>
            <option value="adminLVDorada">Liga Varonil Dorada.</option>
            <option value="adminLVEstrella">Liga Varonil Estrella.</option>
            <option value="adminLFTalpa">Liga Femenil Talpa.</option>
          </select>
          <div class="bootstrap-section">
            <div class="container">
            <div class="row">
                <h3>Registro de partidos</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Número de Partido	</th>
                        <th>Equipo local     	</th>
                        <th>Marcador de casa	</th>
                        <th>Equipo visita		  </th>
                        <th>Marcador de visita</th>
                        <th>Fecha             </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = "SELECT 
                      p.idPartido AS 'Número de partido', 
                      el.nombre AS 'Equipo local', 
                      ev.nombre AS 'Equipo visita', 
                      p.marcador_casa AS 'Marcador de casa', 
                      p.marcador_visita AS 'Marcador de visita', 
                      p.fecha AS 'Fecha' 
                      FROM topos_partido p
                      JOIN topos_equipo el ON p.equipo_casa = el.idEquipo
                      JOIN topos_equipo ev ON p.equipo_visita = ev.idEquipo";
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['Número de partido'] . '</td>';
                        echo '<td>'. $row['Equipo local'] . '</td>';
                        echo '<td>'. $row['Marcador de casa'] . '</td>';
                        echo '<td>'. $row['Equipo visita'] . '</td>';
                        echo '<td>'. $row['Marcador de visita'] . '</td>';
                        echo '<td>'. $row['Fecha'] . '</td>';
                        echo '<td width=250>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="deletePartido.php?id='.$row['Número de partido'].'">Eliminar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?> 
                    </tbody>
                </table>
            </div>
        </div> 
        </div>
        </td>
      </tr>
    </table>
    
    <footer class="footer">
      <div class="left-content">Topos F.C. 2021</div>
      <div class="right-content">
        <img src="images/facebook-icon-white-png.png" alt="facebook">
        <img src="images/twitter_logo_thin_icon_171449.png" alt="twitter">
        <img src="images/IG-white-instagram-logo-transparent-background-7740.png" alt="instagram">
      </div>
    </footer>
  </body>
</html>
