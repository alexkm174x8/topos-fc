<?php
include 'database.php';

if (isset($_GET['id'])) {
    $idEquipo = $_GET['id'];

    $pdo = Database::connect();
    $sql = "SELECT nombre, creacion, goles_totales, partidos_totales, partidos_ganados, partidos_empatados, partidos_perdidos, puntos_extras, logo FROM topos_equipo WHERE idEquipo = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idEquipo]);
    $team = $stmt->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : $team['nombre'];
        $creacion = !empty($_POST['creacion']) ? $_POST['creacion'] : $team['creacion'];
        $goles_totales = !empty($_POST['goles_totales']) ? $_POST['goles_totales'] : $team['goles_totales'];
        $partidos_totales = !empty($_POST['partidos_totales']) ? $_POST['partidos_totales'] : $team['partidos_totales'];
        $partidos_ganados = !empty($_POST['partidos_ganados']) ? $_POST['partidos_ganados'] : $team['partidos_ganados'];
        $partidos_empatados = !empty($_POST['partidos_empatados']) ? $_POST['partidos_empatados'] : $team['partidos_empatados'];
        $partidos_perdidos = !empty($_POST['partidos_perdidos']) ? $_POST['partidos_perdidos'] : $team['partidos_perdidos'];
        $puntos_extras = !empty($_POST['puntos_extras']) ? $_POST['puntos_extras'] : $team['puntos_extras'];
        $logo = !empty($_POST['logo']) ? $_POST['logo'] : $team['logo'];

        $pdo = Database::connect();
        $sql = "UPDATE topos_equipo SET nombre = ?, creacion = ?, goles_totales = ?, partidos_totales = ?, partidos_ganados = ?, partidos_empatados = ?, partidos_perdidos = ?, puntos_extras = ?, logo = ? WHERE idEquipo = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $creacion, $goles_totales, $partidos_totales, $partidos_ganados, $partidos_empatados, $partidos_perdidos, $puntos_extras, $logo, $idEquipo]);
        Database::disconnect();

        echo "<script>window.location.href='admin.php';</script>";
        exit;
    }
} else {
    echo "<script>window.location.href = 'admin.php';</script>";
    exit;
}
?>

<form class="form-horizontal" action="updateEquipo.php?id=<?php echo htmlspecialchars($idEquipo); ?>" method="post">
    <div class="control-group">
        <label class="control-label">Nombre de equipo</label>
        <div class="controls">
            <input name="nombre" type="text" placeholder="Nombre de Equipo" value="<?php echo htmlspecialchars($team['nombre']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Año de creación del equipo</label>
        <div class="controls">
            <input name="creacion" type="date" value="<?php echo htmlspecialchars($team['creacion']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Número de goles anotados en total</label>
        <div class="controls">
            <input name="goles_totales" type="number" value="<?php echo htmlspecialchars($team['goles_totales']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos jugados</label>
        <div class="controls">
            <input name="partidos_totales" type="number" value="<?php echo htmlspecialchars($team['partidos_totales']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos ganados</label>
        <div class="controls">
            <input name="partidos_ganados" type="number" value="<?php echo htmlspecialchars($team['partidos_ganados']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos empatados</label>
        <div class="controls">
            <input name="partidos_empatados" type="number" value="<?php echo htmlspecialchars($team['partidos_empatados']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos perdidos</label>
        <div class="controls">
            <input name="partidos_perdidos" type="number" value="<?php echo htmlspecialchars($team['partidos_perdidos']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Puntos extra</label>
        <div class="controls">
            <input name="puntos_extras" type="number" value="<?php echo htmlspecialchars($team['puntos_extras']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Logo</label>
        <div class="controls">
            <input name="logo" type="text" value="<?php echo htmlspecialchars($team['logo']); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn" onclick="document.getElementById('updateTeamModal').style.display='none'">Cerrar</button>
    </div>
</form>
