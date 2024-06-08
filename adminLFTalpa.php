<!DOCTYPE html>
<html>

<head>
    <title>Topos: Administrador</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-styles">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/admin.js"></script>
</head>

<body>
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

    <div class="center-content">
        <table>
            <tr>
                <td class="td-center">
                    <h1>Herramientas de Administración</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Seleccione la liga</h2>
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
                                    <a href="createEquipos.php?idLiga=3" class="btn btn-success">Agregar un equipo</a>
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
                                        include 'database.php';
                                        $pdo = Database::connect();
                                        $sql = "SELECT idEquipo AS 'Número de equipo', nombre AS 'Nombre de equipo', creacion AS 'Creación', goles_totales AS 'Goles totales', partidos_totales AS 'Partidos jugados', partidos_ganados AS 'Partidos ganados', partidos_empatados AS 'Partidos empatados', partidos_perdidos AS 'Partidos perdidos', puntos_extras AS 'Puntos extras' FROM topos_equipo WHERE idLiga = 3";
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
                                            echo '&nbsp;';
                                            echo '<a class="btn btn-primary" href="updateEquipo.php?id='.$row['Número de equipo'].'">Actualizar datos</a>';
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
                                    <a href="createPartido.php?idLiga=3" class="btn btn-success">Agregar datos de un partido</a>
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
                                            WHERE p.idLiga = 3";
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
    </div>
</body>

</html>
