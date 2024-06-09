<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID del Jugador</th>
                        <th>Edad</th>
                        <th>¿Es mayor de edad?</th>
                        <th>Correo electrónico</th>
                        <th>Número telefónico</th>
                        <th>Colonia</th>
                        <th>Acuerdo de imagen (Personal)</th>
                        <th>Acuerdo de imagen (Tutor)</th>
                        <th>Nombre del tutor</th>
                        <th>Medio por el cuál se enteró</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $player_id = $_GET['id'];
                        $pdo = Database::connect();

                        $sql = "SELECT idJugador AS 'ID del Jugador',
                                edad AS 'Edad',
                                ageReq AS '¿Es mayor de edad?',
                                correo AS 'Correo electrónico',
                                telefono AS 'Número telefónico',
                                colonia AS 'Colonia',
                                acuerdoImagen AS 'Acuerdo de imagen (Personal)',
                                acuerdoImagenTutor AS 'Acuerdo de imagen (Tutor)',
                                tutor AS 'Nombre del tutor',
                                medio AS 'Medio por el cuál se entero' 
                                FROM topos_informacion
                                WHERE idJugador = ?";

                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$player_id]);

                        foreach ($stmt as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['ID del Jugador'] . '</td>';
                            echo '<td>'. $row['Edad'] . '</td>';
                            echo '<td>'. $row['¿Es mayor de edad?'] . '</td>';
                            echo '<td>'. $row['Correo electrónico'] . '</td>';
                            echo '<td>'. $row['Número telefónico'] . '</td>';
                            echo '<td>'. $row['Colonia'] . '</td>'; 
                            echo '<td>'. $row['Acuerdo de imagen (Personal)'] . '</td>';
                            echo '<td>'. $row['Acuerdo de imagen (Tutor)'] . '</td>';
                            echo '<td>'. $row['Nombre del tutor'] . '</td>';
                            echo '<td>'. $row['Medio por el cuál se entero'] . '</td>';
                            echo '<td width=250>';
                            echo '&nbsp;';
                            echo '<a class="btn" href="admin.php">Regresar</a>';
                            echo '</tr>';
                        }

                        Database::disconnect();
                    } else {
                        echo '<tr><td colspan="10">No se proporcionó un ID de jugador.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>
