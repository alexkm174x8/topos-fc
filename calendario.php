<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Topos FC</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/menu-toggle.js"></script>
    <script src="scripts/cal-script.js" defer></script>
  </head>
  <body class="calendario">
  <!--Nav Bar-->
  <div class="container clearfix et_menu_container">
      <nav class="navbar_container">
          <div class="header_top">
              <div class="imagen_navbar">
                  <img src="images/topos_logo.png" alt="Logo de topos FC">
              </div>
              <div class="iniciar_sesion">
                  Iniciar sesión
              </div>
          </div>
          <div class="lista seccion1">
              <ul>
                  <li><a href="#inicio">Inicio</a></li>
                  <li><a href="#quienesSomos">Quiénes somos</a></li>
                  <li><a href="#ligaNacionalDeFuchoParaCiegos">Liga Nacional de Fucho para Ciegos</a></li>
                  <li><a href="#equipos">Equipos</a></li>
                  <li><a href="#laMadriguera">La Madriguera</a></li>
                  <li><a href="#noticias">Noticias</a></li>
                  <li class="flecha"><a href="#seccion2"></a></li>
              </ul>
          </div>
          <div class="lista seccion2">
              <ul>
                  <li><a href="#donativos">Donativos</a></li>
                  <li><a href="#contacto">Contacto</a></li>
                  <li><a href="#rentarCancha">Rentar Cancha</a></li>
                  <li><a href="#calendario">Calendario</a></li>
                  <li><a href="#registro">Registro</a></li>
                  <li><a href="#section_estadisticas">Estadísticas</a></li>
                  <li class="flecha"><a href="#seccion1"></a></li>
              </ul>
          </div>
      </nav>
  </div>

    <!--Page content-->
    <br>
    <div class="content">
        <p>Actualmente contamos con una cancha la cuál cuenta con pasto sintético en la cuál se llevan a cabo ligas de futbol 5, aunque como una iniciativa para seguir acondicionando la cancha y ofrecer a todos los jugadores la mejor experiencia posible, estamos rentando la cancha para actividades externas tales como:</p>
        <ul>
            <li>Escuela para niños.</li>
            <li>Área de fiestas.</li>
            <li>Zona de actividades recreativas.</li>
            <li>Partidos de fútbol de otros equipos.</li>
            <li>Entre otras actividades siempre y cuando no comprometan el estado de la cancha.</li>
        </ul>
        <br>
        <h1>Especificaciones de la cancha</h1>
        <ul>
            <li>Dimensiones: 10 metros de largo por 10 metros de ancho.</li>
            <li>Piso: Pasto sintético.</li>
            <li>Baños: 1 baño portátil.</li>
        </ul>
        <br>
        <h1>Condiciones para el Alquiler de las Instalaciones</h1>
        <ul>
            <li>Las rentas solo se concretarán a personas mayores de edad.</li>
            <li>Está prohibido introducir o consumir bebidas alcohólicas en la cancha.</li>
            <li>El uso de la cancha queda bajo la responsabilidad de quienes la apartaron durante el lapso de tiempo acordado.</li>
        </ul>
        <br>
        <h1>Políticas de Uso de Canchas</h1>
        <ul>
            <li>El costo de la renta deberá ser pagado en un periodo de 3 días hábiles, de otro modo no se agendará la renta de la cancha.</li>
            <li>Toda renta deberá estar cubierta previo a la ocupación de la cancha.</li>
            <li>Se prohíbe el uso de zapatos tales como los “tacos” o “taquetes” dentro de la cancha.</li>
        </ul>
        <br>
        <h1>Información requerida para apartar la cancha</h1>
    </div>
    <br>
    <!--Calendar-->
    <br>
    <div id="wrapper-container">
      <div class="wrapper">
          <h2 id="calendar_title">Calendario de Reservaciones</h2>
          <header>
              <br>
              <p class="current-date"></p>
              <div class="icons">
                  <span id="prev" class="material-symbols-rounded">chevron_left</span>
                  <span id="next" class="material-symbols-rounded">chevron_right</span>
              </div>
          </header>
          <div class="calendar">
          <ul class="weeks">
            <li>Dom</li>
            <li>Lun</li>
            <li>Mar</li>
            <li>Mie</li>
            <li>Jue</li>
            <li>Vie</li>
            <li>Sab</li>
          </ul>
          <ul class="days"></ul>
        </div>
      </div>
      <div class="reservation-wrapper">
        <h2 id="calendar_title_rsv">Reservaciones del día</h2>
        <br> <br>
        <h5>10:00 AM - 12:00 PM Cancha Reservada.</h5>
        <br>
        <button id="reservaButton" class="boton-reserva">¡Reserva Ahora!</button>
        <div class="inicia_resv">
          <div class="segment">
            <h2>Planea tu reserva</h2>
          </div>
          <form id="reservationForm" action="reservacion.php" method="post">
            <label>
              <input id="nombre" name="nombre" type="text" placeholder="Nombre Completo" required>
            </label>
            <label>
              <input id="email" name="email" type="email" placeholder="Correo Electrónico" required>
            </label>
            <label>
              <input id="motivo" name="motivo" type="text" placeholder="Motivo de Reserva" required>
            </label>
            <label for="time">Hora </label>
            <div id='horas'></div>
            <br>
            <input type="hidden" id="dia" name="dia" value="0">
            <input type="hidden" id="mes" name="mes" value="0">
            <input type="hidden" id="ano" name="ano" value="0">
            <input type="hidden" id="timestamp" name="timestamp" value="0">
            <br>
            <button id="reserva" type="submit" href="horasReservadas.php">Enviar</button>
          <!--
            <div class="btn-continuar">
              <a id="reservar" class="cta" href="reservacion.php">
                <span>Enviar</span>
                <span>
                  <svg width="26px" height="13px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <path class="one"
                        d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                        fill="#FFFFFF"></path>
                      <path class="two"
                        d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                        fill="#FFFFFF"></path>
                      <path class="three"
                        d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                        fill="#FFFFFF"></path>
                    </g>
                  </svg>
                </span>
              </a>
            </div>
          -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
      <div class="left-content">Topos F.C. 2021</div>
      <div class="right-content">
          <img src="images/facebook-icon-white-png.png" alt="facebook">
          <img src="images/twitter_logo_thin_icon_171449.png" alt="twitter">
          <img src="images/IG-white-instagram-logo-transparent-background-7740.png" alt="instagram">
      </div>
  </footer>

  </body>
  <script src="scripts/cal-script.js" defer></script>
</html>