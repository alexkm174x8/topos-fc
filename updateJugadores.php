<?php
include 'database.php';

if (isset($_GET['id'])) {
    $idJugador = $_GET['id'];

    // Fetch existing player data
    $pdo = Database::connect();
    $sql = "SELECT nombres, apellidos, numero, estado, posicion, goles, idEquipo FROM topos_jugador WHERE idjugador = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idJugador]);
    $player = $stmt->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $numero = $_POST['numero'];
        $estado = $_POST['estado'];
        $posicion = $_POST['posicion'];
        $goles = $_POST['goles'];
        $idEquipo = $player['idEquipo']; // Preserve the idEquipo

        $pdo = Database::connect();
        $sql = "UPDATE topos_jugador SET nombres = ?, apellidos = ?, numero = ?, estado = ?, posicion = ?, goles = ? WHERE idjugador = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombres, $apellidos, $numero, $estado, $posicion, $goles, $idJugador]);
        Database::disconnect();

        header("Location: jugadores.php?id=" . htmlspecialchars($idEquipo));
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Actualizar Jugador</h3>
    </div>
    <form action="updateJugadores.php?id=<?php echo htmlspecialchars($idJugador); ?>" method="post">
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo htmlspecialchars($player['nombres']); ?>" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($player['apellidos']); ?>" required>
        </div>
        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo htmlspecialchars($player['numero']); ?>" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <div class="controls">
                <input name="estado" type="radio" value="active" <?php echo ($player['estado'] == 'active') ? 'checked' : ''; ?>> Activo</input> &nbsp;&nbsp;
                <input name="estado" type="radio" value="inactive" <?php echo ($player['estado'] == 'inactive') ? 'checked' : ''; ?>> Inactivo</input>
                <span class="help-inline"></span>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label for="posicion">Posición</label>
            <input type="text" class="form-control" id="posicion" name="posicion" value="<?php echo htmlspecialchars($player['posicion']); ?>" required>
        </div>
        <div class="form-group">
            <label for="goles">Goles</label>
            <input type="number" class="form-control" id="goles" name="goles" value="<?php echo htmlspecialchars($player['goles']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a class="btn btn-secondary" href="../admin.php">Cancelar</a>
    </form>
</div>
</body>
</html>