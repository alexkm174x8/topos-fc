<!DOCTYPE html>

<html lang="en">
<head>
    <meta 	charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="row">
        <?php
        include 'database.php';
        $pdo = Database::connect();
        $team_id = $_GET['id'];
        $team_name = '';
        if ($team_id) {
            $sql_team = "SELECT equipo FROM TOPOS_Equipos WHERE idequipo = ?";
            $stmt_team = $pdo->prepare($sql_team);
            $stmt_team->execute([$team_id]);
            $team_name = $stmt_team->fetchColumn();
        }
        
        echo '<h3>Jugadores de ' . $team_name . '</h3>';
        ?>
    </div>

    <div class="row">
        <p>
            <a href="createJugadores.php?id=<?php echo $team_id;?>" class="btn btn-success">Agregar un jugador</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID del Jugador  </th>
                <th>Nombres	        </th>
                <th>Apellidos		</th>
                <th>Equipo			</th>
                <th>Numero			</th>
                <th>Estado	    	</th>
                <th>Opciones        </th>
                <th>Posición        </th>
                <th>Goles           </th>
            </tr>
            </thead>
            <tbody>
            <?php
                $pdo = Database::connect();
                $team_id = $_GET['id'];

                $sql = "SELECT j.idjugador, j.nombres, j.apellidos, e.equipo AS nombre_equipo, j.numero, j.estado, j.posicion, j.goles 
                FROM TOPOS_Jugador j 
                INNER JOIN TOPOS_Equipo e ON j.idequipo = e.idequipo
                WHERE j.idequipo = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$team_id]);

                foreach ($stmt as $row) {
                echo '<tr>';
                echo '<td>'. $row['idjugador'] . '</td>';
                echo '<td>'. $row['nombres'] . '</td>';
                echo '<td>'. $row['apellidos'] . '</td>';
                echo '<td>'. $row['nombre_equipo'] . '</td>';
                echo '<td>'. $row['numero'] . '</td>';
                echo '<td>'. $row['estado'] . '</td>'; 
                echo '<td>'. $row['posicion'] . '</td>';
                echo '<td>'. $row['goles'] . '</td>';
                echo '<td width=250>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="deleteJugadores.php?id='.$row['idjugador'].'">Eliminar</a>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>

    </div>

</div> <!-- /container -->
</body>
</html>
