<!DOCTYPE html>
<html>

  <head>
    <title>Topos: Administrador</title>
    <meta charset ="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link   href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-styles">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/admin.js"></script>
  </head>

  <body>
    <nav class="navbar_container">
      <div class="iniciar_sesion">
        Iniciar sesión
      </div>
      <div class="imagen_navbar">
        <img src="images/topos_logo.png" alt="Logo de topos FC">
      </div>
      <div class="lista">
        <ul>
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#quienesSomos">Quiénes somos</a></li>
          <li><a href="#ligaNacionalDeFuchoParaCiegos">Liga Nacional de Fucho para Ciegos</a></li>
          <li><a href="#equipos">Equipos</a></li>
          <li><a href="#laMadrigruera">La Madriguera</a></li>
          <li><a href="#noticias">Noticias</a></li>
          <li><a href="#donativos">Donativos</a></li>
          <li><a href="#contacto">Contacto</a></li>
          <li><a href="#rentarCancha">Rentar Cancha</a></li>
          <li><a href="#calendario">Calendario</a></li>
          <li><a href="#registro">Registro</a></li>
          <li><a href="#section_administracion">Administracion</a></li>
          <li><a href="#section_estadisticas">Estadisticas</a></li>
        </ul>
      </div>
    </nav>

    <table>
      <tr>
        <td>
          <h1>Herramientas de Administración</h1>
          <h2>Apartaciones Pendientes</h2>
          <table class="fill_up">
            <tr>
              <td>
                <table class="info_cont">
                  <tr>
                    <td>
                      <img src="images/usuario.png" alt="Imagen usuario" class="ima_usuario"></img>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button class="fill">Rogelio Fernández</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button class="fill">+52 123 456 7890</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button class="fill">13 de Abril, 13:00:00</button>
                    </td>
                  </tr>
                </table>
                <td>
                  <table>
                    <tr>
                      <td>
                        <form><button type="button" class="accept" onclick="reservationDone()"> Pagado</button></form>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <form><button type="button" class="denied" onclick="reservationDenied()"> Denegado</button></form>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
          </table>
        <tr>
          <td>
            <h2>Añadir Datos Estadísticos</h2>
          </td>
      </tr>
      <tr>
        <td>
          <br>
        </td>
      </tr>
      <tr>
        <td>
          <select class="button-colors" name="leagueChosen" id="fname" onchange="changeLeague(this.value)">
            <option value="admin">Seleccionar liga.</option>
            <option value="adminLVDorada">Liga Varonil Dorada.</option>
            <option value="adminLVEstrella">Liga Varonil Estrella.</option>
            <option value="adminLFTalpa">Liga Femenil Talpa.</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <br>
        </td>
      </tr>
      <tr>
        <td>
          <div class="bootstrap-section">
            <div class="container">
            <div class="row">
                <h3>Equipos Inscritos</h3>
            </div>
            <div class="row">
                <p>
                    <a href="createEquipos.php?idLiga=2" class="btn btn-success">Agregar un equipo</a>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Número de Equipo	</th>
                        <th>Nombre de Equipo	</th>
                        <th>Creación				  </th>
                        <th>Goles totales			</th>
                        <th>Partidos jugados  </th>
                        <th>Partidos ganados  </th>
                        <th>Partidos empatados </th>
                        <th>Partidos perdidos </th>
                        <th>Puntos extras     </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = "SELECT idEquipo AS 'Número de equipo', nombre AS 'Nombre de equipo', creacion AS 'Creación', goles_totales AS 'Goles totales', partidos_totales AS 'Partidos jugados', partidos_ganados AS 'Partidos ganados', partidos_empatados AS 'Partidos empatados', partidos_perdidos AS 'Partidos perdidos', puntos_extras AS 'Puntos extras' FROM topos_equipo WHERE idLiga = 2";
                    $idLiga = 1;
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['Número de equipo'] . '</td>';
                        echo '<td>'. $row['Nombre de equipo'] . '</td>';
                        echo '<td>'. $row['Creación'] . '</td>';
                        echo '<td>'. $row['Goles totales'] . '</td>';
                        echo '<td>'. $row['Partidos jugados'] . '</td>';
                        echo '<td>'. $row['Partidos ganados'] . '</td>';
                        echo '<td>'. $row['Partidos empatados'] . '</td>';
                        echo '<td>'. $row['Partidos perdidos'] . '</td>';
                        echo '<td>'. $row['Puntos extras'] . '</td>';
                        echo '<td width=250>';
                        echo '<a class="btn" href="jugadores.php?id='.$row['Número de equipo'].'">Detalles</a>';
                        echo '&nbsp;';
                        echo '<a class="btn btn-danger" href="delete.php?id='.$row['Número de equipo'].'">Eliminar</a>';
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
      </tr>
  </tr>
      <tr>
        <td>
          <br>
        </td>
      </tr>
      <tr>
        <td>
          <div class="bootstrap-section">
            <div class="container">
            <div class="row">
                <h3>Registro de partidos</h3>
            </div>
            <div class="row">
                <p>
                    <a href="createPartido.php" class="btn btn-success">Agregar datos de un partido</a>
                </p>
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
