<?php
include 'database.php';

if (isset($_GET['id'])) {
    $idEquipo = $_GET['id'];

    $pdo = Database::connect();
    $sql = "SELECT nombre, creacion, goles_totales, partidos_totales, partidos_ganados, partidos_empatados, partidos_perdidos, puntos_extras FROM topos_equipo WHERE idEquipo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idEquipo]);
    $team = $stmt->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $creacion = $_POST['creacion'];
        $goles_totales = $_POST['goles_totales'];
        $partidos_totales = $_POST['partidos_totales'];
        $partidos_ganados = $_POST['partidos_ganados'];
        $partidos_empatados = $_POST['partidos_empatados'];
        $partidos_perdidos = $_POST['partidos_perdidos'];
        $puntos_extras = $_POST['puntos_extras'];

        $pdo = Database::connect();
        $sql = "UPDATE topos_equipo SET nombre = ?, creacion = ?, goles_totales = ?, partidos_totales = ?, partidos_ganados = ?, partidos_empatados = ?, partidos_perdidos = ?, puntos_extras = ? WHERE idEquipo = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $creacion, $goles_totales, $partidos_totales, $partidos_ganados, $partidos_empatados, $partidos_perdidos, $puntos_extras, $idEquipo]);
        Database::disconnect();

        header("Location: admin.php");
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Actualizar Equipo</h3>
    </div>
    <form action="updateEquipo.php?id=<?php echo htmlspecialchars($idEquipo); ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre de Equipo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($team['nombre']); ?>" required>
        </div>
        <div class="form-group">
            <label for="creacion">Creación</label>
            <input type="date" class="form-control" id="creacion" name="creacion" value="<?php echo htmlspecialchars($team['creacion']); ?>" required>
        </div>
        <div class="form-group">
            <label for="goles_totales">Goles Totales</label>
            <input type="number" class="form-control" id="goles_totales" name="goles_totales" value="<?php echo htmlspecialchars($team['goles_totales']); ?>" required>
        </div>
        <div class="form-group">
            <label for="partidos_totales">Partidos Jugados</label>
            <input type="number" class="form-control" id="partidos_totales" name="partidos_totales" value="<?php echo htmlspecialchars($team['partidos_totales']); ?>" required>
        </div>
        <div class="form-group">
            <label for="partidos_ganados">Partidos Ganados</label>
            <input type="number" class="form-control" id="partidos_ganados" name="partidos_ganados" value="<?php echo htmlspecialchars($team['partidos_ganados']); ?>" required>
        </div>
        <div class="form-group">
            <label for="partidos_empatados">Partidos Empatados</label>
            <input type="number" class="form-control" id="partidos_empatados" name="partidos_empatados" value="<?php echo htmlspecialchars($team['partidos_empatados']); ?>" required>
        </div>
        <div class="form-group">
            <label for="partidos_perdidos">Partidos Perdidos</label>
            <input type="number" class="form-control" id="partidos_perdidos" name="partidos_perdidos" value="<?php echo htmlspecialchars($team['partidos_perdidos']); ?>" required>
        </div>
        <div class="form-group">
            <label for="puntos_extras">Puntos Extras</label>
            <input type="number" class="form-control" id="puntos_extras" name="puntos_extras" value="<?php echo htmlspecialchars($team['puntos_extras']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a class="btn btn-secondary" href="equipo_list.php">Cancelar</a>
    </form>
</div>
</body>
</html>
