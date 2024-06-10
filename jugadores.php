<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/menu-toggle.js"></script>
    <script src="scripts/jugador.js"></script>
</head>

<body>

<!--Nav Bar-->
<div class="container clearfix et_menu_container">
    <nav class="navbar_container">
        <div class="header_top">
            <div class="imagen_navbar">
                <?php
                include 'database.php';
                // Verificar si el parámetro 'id' está presente en la URL
                if (!isset($_GET['id'])) {
                    // Redirigir a la página de error o a la página de inicio
                    header("Location: admin.php");
                    exit;}

                $pdo = Database::connect();
                $team_id = isset($_GET['id']) ? $_GET['id'] : null; // Obtener el id del equipo desde la URL
                $logo_url = 'images/topos_logo.png'; // URL del logo por defecto

                if ($team_id) {
                    $sql_logo = "SELECT logo FROM topos_equipo WHERE idEquipo = ?";
                    $stmt_logo = $pdo->prepare($sql_logo);
                    $stmt_logo->execute([$team_id]);
                    $logo_url = $stmt_logo->fetchColumn() ?: $logo_url; // Si no hay logo, usar el logo por defecto
                }

                echo '<img src="' . htmlspecialchars($logo_url) . '" alt="Logo del equipo" onerror="setDefaultImage(this)">';
                ?>
            </div>
            <div class="iniciar_sesion">
                <a href="admin.php">Menú de Administrador</a>
            </div>
        </div>
        <br>
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
<div id="divInicial">
<div class="container">
    <div class="bootstrap-section">
    <div class="row">
        <?php
        $team_name = '';
        if ($team_id) {
            $sql_team = "SELECT nombre FROM topos_equipo WHERE idEquipo = ?";
            $stmt_team = $pdo->prepare($sql_team);
            $stmt_team->execute([$team_id]);
            $team_name = $stmt_team->fetchColumn();
        }

        echo '<h3>Jugadores de ' . htmlspecialchars($team_name) . '</h3>';
        ?>
        <br>
    </div>

    <div class="row">
        <p>
            <a href="#" class="btn btn-success" onclick="openAddPlayerModal(<?php echo htmlspecialchars($team_id); ?>)">Agregar un jugador</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID del Jugador</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Equipo</th>
                <th>Numero</th>
                <th>Estado</th>
                <th>Posición</th>
                <th>Goles</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT j.idJugador, j.nombres, j.apellidos, e.nombre AS nombre_equipo, j.numero, j.estado, j.posicion, j.goles 
                FROM topos_jugador j 
                INNER JOIN topos_equipo e ON j.idEquipo = e.idEquipo
                WHERE j.idEquipo = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$team_id]);

            foreach ($stmt as $row) {
                echo '<tr>';
                echo '<td>'. htmlspecialchars($row['idJugador']) . '</td>';
                echo '<td>'. htmlspecialchars($row['nombres']) . '</td>';
                echo '<td>'. htmlspecialchars($row['apellidos']) . '</td>';
                echo '<td>'. htmlspecialchars($row['nombre_equipo']) . '</td>';
                echo '<td>'. htmlspecialchars($row['numero']) . '</td>';
                echo '<td>'. htmlspecialchars($row['estado']) . '</td>';
                echo '<td>'. htmlspecialchars($row['posicion']) . '</td>';
                echo '<td>'. htmlspecialchars($row['goles']) . '</td>';
                echo '<td width=250>';
                echo '&nbsp;';
                echo '<a class="btn" href="#" onclick="openShowPlayerModal('.htmlspecialchars($row['idJugador']).')">Información del jugador</a>';
                echo '<a class="btn btn-danger" href="deleteJugadores.php?id='.htmlspecialchars($row['idJugador']).'">Eliminar</a>';
                echo '<a class="btn btn-primary" href="#" onclick="openUpdatePlayerModal('.htmlspecialchars($row['idJugador']).')">Actualizar datos</a>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
        <a class="btn" href="admin.php">Regresar</a>
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

<!-- Modal para agregar un jugador -->
<div id="addPlayerModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

<!-- Modal para mostrar información de un jugador -->
<div id="showPlayerModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

<!-- Modal para actualizar un jugador -->
<div id="updatePlayerModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <!-- Contenido del formulario se cargará aquí -->
        </div>
    </div>
</div>

</body>
</html>
