<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: adminAccess.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Topos: Administrador</title>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-styles">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/menu-toggle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/admin.js"></script>
</head>
<body class="adminPage">
<!--Nav Bar-->
<div class="container clearfix et_menu_container">
    <nav class="navbar_container">
        <div class="header_top">
            <div class="imagen_navbar">
                <img src="images/topos_logo.png" alt="Logo de topos FC">
            </div>
            <div class="iniciar_sesion">
                <a href="logout.php">Cerrar Sesión</a>
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
    <br>
    <h1>Herramientas de Administrador</h1>
    <h2>Reservaciones Pendientes</h2>
    <br><br>
    <div class="scroll-container" id="reservations-container">
        <?php
        require 'database.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT nombre, apellido, correo, motivo, horaRsv FROM reservacion WHERE estado = 'Pendiente'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            echo '<div class="scroll-item no-reservations">
                <div class="contenido">
                    <p>No hay reservaciones pendientes</p>
                </div>
            </div>';
        } else {
            foreach ($result as $row) {
                $horaRsv = $row['horaRsv'];
                echo '<div class="scroll-item" onclick="toggleGirar(this)">
                    <div class="contenido">
                        <img src="images/usuario.png" alt="Imagen usuario" class="ima_usuario"><br><br>
                        <div>
                            <div class="pinfo">' . $row['nombre'] . ' ' . $row['apellido'] . '</div>
                            <div class="pinfo correo-container">' . $row['correo'] . '
                                <button type="button" class="copy-btn" data-correo="' . $row['correo'] . '">Copiar</button>
                            </div>
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
        }

        Database::disconnect();
        ?>
    </div>
    <h1>Añadir Datos Estadísticos</h1>
<select class="button-colors" name="leagueChosen" id="leagueSelector" onchange="changeLeague(this.value)">
    <option value="admin" selected>Seleccionar liga.</option>
    <option value="adminLVDorada">Liga Varonil Dorada.</option>
    <option value="adminLVEstrella">Liga Varonil Estrella.</option>
    <option value="adminLFTalpa">Liga Femenil Talpa.</option>
</select>
<div class="crudContainer">
    <!-- Sección para Liga Varonil Dorada -->
    <div id="adminLVDorada" class="leagueSection" style="display:none;">
        <div class="bootstrap-section">
            <div class="container">
                <div class="row">
                    <h2>Equipos Inscritos - Liga Varonil Dorada</h2>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddTeamModal('2')">Agregar un equipo</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Equipo</th>
                            <th>Nombre de Equipo</th>
                            <th>Creación</th>
                            <th>Goles totales</th>
                            <th>Partidos jugados</th>
                            <th>Partidos ganados</th>
                            <th>Partidos empatados</th>
                            <th>Partidos perdidos</th>
                            <th>Puntos extras</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pdo = Database::connect();
                        $sql = "SELECT idEquipo AS 'Número de equipo', nombre AS 'Nombre de equipo', creacion AS 'Creación', goles_totales AS 'Goles totales', partidos_totales AS 'Partidos jugados', partidos_ganados AS 'Partidos ganados', partidos_empatados AS 'Partidos empatados', partidos_perdidos AS 'Partidos perdidos', puntos_extras AS 'Puntos extras' FROM topos_equipo WHERE idLiga = 2";
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
                            echo '<a class="btn btn-danger" href="deleteEquipo.php?id='.$row['Número de equipo'].'">Eliminar</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-primary" onclick="openUpdateTeamModal('.$row['Número de equipo'].')">Actualizar datos</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row">
                    <h3>Registro de Partidos - Liga Varonil Dorada</h3>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddMatchModal('2')">Agregar datos de un partido</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Partido</th>
                            <th>Equipo local</th>
                            <th>Marcador de casa</th>
                            <th>Equipo visita</th>
                            <th>Marcador de visita</th>
                            <th>Fecha</th>
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
                                      JOIN topos_equipo ev ON p.equipo_visita = ev.idEquipo
                                      WHERE p.idLiga=2";
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
    </div>
    <!-- Fin de sección para Liga Varonil Dorada -->

    <!-- Sección para Liga Varonil Estrella -->
    <div id="adminLVEstrella" class="leagueSection" style="display:none;">
        <div class="bootstrap-section">
            <div class="container">
                <div class="row">
                    <h2>Equipos Inscritos - Liga Varonil Estrella</h2>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddTeamModal('1')">Agregar un equipo</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Equipo</th>
                            <th>Nombre de Equipo</th>
                            <th>Creación</th>
                            <th>Goles totales</th>
                            <th>Partidos jugados</th>
                            <th>Partidos ganados</th>
                            <th>Partidos empatados</th>
                            <th>Partidos perdidos</th>
                            <th>Puntos extras</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pdo = Database::connect();
                        $sql = "SELECT idEquipo AS 'Número de equipo', nombre AS 'Nombre de equipo', creacion AS 'Creación', goles_totales AS 'Goles totales', partidos_totales AS 'Partidos jugados', partidos_ganados AS 'Partidos ganados', partidos_empatados AS 'Partidos empatados', partidos_perdidos AS 'Partidos perdidos', puntos_extras AS 'Puntos extras' FROM topos_equipo WHERE idLiga = 1";
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
                            echo '<a class="btn btn-danger" href="deleteEquipo.php?id='.$row['Número de equipo'].'">Eliminar</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-primary" onclick="openUpdateTeamModal('.$row['Número de equipo'].')">Actualizar datos</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row">
                    <h3>Registro de Partidos - Liga Varonil Estrella</h3>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddMatchModal('1')">Agregar datos de un partido</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Partido</th>
                            <th>Equipo local</th>
                            <th>Marcador de casa</th>
                            <th>Equipo visita</th>
                            <th>Marcador de visita</th>
                            <th>Fecha</th>
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
                                      JOIN topos_equipo ev ON p.equipo_visita = ev.idEquipo
                                      WHERE p.idLiga=1";
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
    </div>
    <!-- Fin de sección para Liga Varonil Estrella -->

    <!-- Sección para Liga Femenil Talpa -->
    <div id="adminLFTalpa" class="leagueSection" style="display:none;">
        <div class="bootstrap-section">
            <div class="container">
                <div class="row">
                    <h2>Equipos Inscritos - Liga Femenil Talpa</h2>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddTeamModal('3')">Agregar un equipo</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Equipo</th>
                            <th>Nombre de Equipo</th>
                            <th>Creación</th>
                            <th>Goles totales</th>
                            <th>Partidos jugados</th>
                            <th>Partidos ganados</th>
                            <th>Partidos empatados</th>
                            <th>Partidos perdidos</th>
                            <th>Puntos extras</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pdo = Database::connect();
                        $sql = "SELECT idEquipo AS 'Número de equipo', nombre AS 'Nombre de equipo', creacion AS 'Creación', goles_totales AS 'Goles totales', partidos_totales AS 'Partidos jugados', partidos_ganados AS 'Partidos ganados', partidos_empatados AS 'Partidos empatados', partidos_perdidos AS 'Partidos perdidos', puntos_extras AS 'Puntos extras' FROM topos_equipo WHERE idLiga = 3";
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
                            echo '<a class="btn btn-danger" href="deleteEquipo.php?id='.$row['Número de equipo'].'">Eliminar</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-primary" onclick="openUpdateTeamModal('.$row['Número de equipo'].')">Actualizar datos</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row">
                    <h3>Registro de Partidos - Liga Femenil Talpa</h3>
                </div>
                <br>
                <div class="row">
                    <p>
                        <a href="#" class="btn btn-success" onclick="openAddMatchModal('3')">Agregar datos de un partido</a>
                    </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Número de Partido</th>
                            <th>Equipo local</th>
                            <th>Marcador de casa</th>
                            <th>Equipo visita</th>
                            <th>Marcador de visita</th>
                            <th>Fecha</th>
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
                                      JOIN topos_equipo ev ON p.equipo_visita = ev.idEquipo
                                      WHERE p.idLiga=3";
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
    </div>
    <!-- Fin de sección para Liga Femenil Talpa -->
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

<!-- Modal para agregar un partido -->
<div id="addMatchModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

<!-- Modal para agregar un equipo -->
<div id="addTeamModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

<!-- Modal para actualizar un equipo -->
<div id="updateTeamModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

</body>
</html>
