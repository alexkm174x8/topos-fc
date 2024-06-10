<?php
include 'database.php';

if (isset($_GET['id'])) {
    $idJugador = $_GET['id'];

    $pdo = Database::connect();
    $sql = "SELECT nombres, apellidos, estado, numero, posicion, goles, idEquipo FROM topos_jugador WHERE idJugador = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idJugador]);
    $player = $stmt->fetch(PDO::FETCH_ASSOC);
    $team_id = $player['idEquipo']; // Obtener el ID del equipo
    Database::disconnect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario
        $nombres = !empty($_POST['nombres']) ? $_POST['nombres'] : $player['nombres'];
        $apellidos = !empty($_POST['apellidos']) ? $_POST['apellidos'] : $player['apellidos'];
        $estado = !empty($_POST['estado']) ? $_POST['estado'] : $player['estado'];
        $numero = !empty($_POST['numero']) ? $_POST['numero'] : $player['numero'];
        $posicion = !empty($_POST['posicion']) ? $_POST['posicion'] : $player['posicion'];
        $goles = !empty($_POST['goles']) ? $_POST['goles'] : $player['goles'];

        // Actualizar los datos del jugador en la base de datos
        $pdo = Database::connect();
        $sql = "UPDATE topos_jugador SET nombres = ?, apellidos = ?, estado = ?, numero = ?, posicion = ?, goles = ? WHERE idJugador = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombres, $apellidos, $estado, $numero, $posicion, $goles, $idJugador]);
        Database::disconnect();

        // Redirigir a la página de jugadores con el ID del equipo
        echo "<script>window.location.href='jugadores.php?id=".$team_id."';</script>";
        exit;
    }
} else {
    // Si no se proporciona un ID de jugador válido, redirigir a la página de jugadores sin ningún ID de equipo específico
    echo "<script>window.location.href = 'jugadores.php';</script>";
    exit;
}
?>

<form class="form-horizontal" action="updateJugadores.php?id=<?php echo htmlspecialchars($idJugador); ?>" method="post">
    <div class="control-group">
        <label class="control-label">Nombre/s</label>
        <div class="controls">
            <input name="nombres" type="text" value="<?php echo htmlspecialchars($player['nombres']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Apellidos</label>
        <div class="controls">
            <input name="apellidos" type="text" value="<?php echo htmlspecialchars($player['apellidos']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Estado</label>
        <div class="controls">
            <input name="estado" type="radio" value="Activo" <?php echo ($player['estado'] == 'Activo') ? 'checked' : ''; ?>> Activo</input> &nbsp;&nbsp;
            <input name="estado" type="radio" value="Inactivo" <?php echo ($player['estado'] == 'Inactivo') ? 'checked' : ''; ?>> Inactivo</input>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Número de Jugador</label>
        <div class="controls">
            <input name="numero" type="text" value="<?php echo htmlspecialchars($player['numero']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Posición</label>
        <div class="controls">
            <input name="posicion" type="text" value="<?php echo htmlspecialchars($player['posicion']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Goles</label>
        <div class="controls">
            <input name="goles" type="text" value="<?php echo htmlspecialchars($player['goles']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn" onclick="document.getElementById('updatePlayerModal').style.display='none'">Cerrar</button>
    </div>
</form>
