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
        <h3>Equipos Inscritos</h3>
    </div>

    <div class="row">
        <p>
            <a href="createEquipos.php" class="btn btn-success">Agregar un equipo</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Numero de Equipo	</th>
                <th>Nombre de Equipo				</th>
                <th>Inscritos en					</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = "SELECT idequipo AS 'Numero de equipo', equipo AS 'Nombre de Equipo', creacion AS 'Inscritos en' FROM CRUD_Equipo";
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['Numero de equipo'] . '</td>';
                echo '<td>'. $row['Nombre de Equipo'] . '</td>';
                echo '<td>'. $row['Inscritos en'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="jugadores.php?id='.$row['Numero de equipo'].'">Detalles</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="delete.php?id='.$row['Numero de equipo'].'">Eliminar</a>';
                echo '</td>';
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