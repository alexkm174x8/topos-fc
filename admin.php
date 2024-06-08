<!DOCTYPE html>
<html>
  <head>
    <title>Topos: Administrador</title>
    <meta charset ="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-styles">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/menu-toggle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
  <!--Nav Bar-->
  <div class="container clearfix et_menu_container">
      <nav class="navbar_container">
          <div class="header_top">
              <div class="imagen_navbar">
                  <img src="images/topos_logo.png" alt="Logo de topos FC">
              </div>
              <div class="iniciar_sesion">
                  <a href="adminAccess.php">Iniciar sesión</a>
              </div>
          </div>
          <div class="lista seccion1">
              <ul>
                  <li><a href="https://toposfc.org/">Inicio</a></li>
                  <li><a href="https://toposfc.org/quienes-somos/">Quiénes somos</a></li>
                  <li><a href="https://toposfc.org/liga-nacional-de-futbol-para-ciegos/">Liga Nacional de Fucho para Ciegos</a></li>
                  <li><a href="https://toposfc.org/equipos/">Equipos</a></li>
                  <li><a href="https://toposfc.org/cdc_la_madriguera/">La Madriguera</a></li>
                  <li><a href="https://toposfc.org/noticias/">Noticias</a></li>
                  <li class="flecha"><a href="#seccion2"><img src="images/flecha_abajo.png" alt="Cambio de menú"></a></li>
              </ul>
          </div>
          <div class="lista seccion2">
              <ul>
                  <li class="flecha"><a href="#seccion1"><img src="images/flecha_arriba.png" alt="Cambio de menú"></a></li>
                  <li><a href="https://toposfc.org/donativos/">Donativos</a></li>
                  <li><a href="https://toposfc.org/contacto/">Contacto</a></li>
                  <li><a href="calendario.php">Rentar Cancha</a></li>
                  <li><a href="calendario.php">Calendario</a></li>
                  <li><a href="equipo.html">Registro</a></li>
                  <li><a href="estadisticas.html">Estadísticas</a></li>
              </ul>
          </div>
      </nav>
  </div>
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
