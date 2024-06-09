<?php
if (isset($_GET['idLiga'])) {
    $idLiga = intval($_GET['idLiga']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "topos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT idEquipo, nombre FROM topos_equipo WHERE idLiga = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idLiga);
    $stmt->execute();
    $result = $stmt->get_result();

    $equipos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $equipos[] = $row;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "idLiga no está establecido en la URL.";
    exit;
}
?>

<form class="form-horizontal" action="createPartido2.php" method="post">
    <input type="hidden" name="idLiga" value="<?php echo $idLiga; ?>">
    <div class="control-group">
        <label class="control-label">Nombre de equipo local</label>
        <select class="controls" name="equipoCasa" id="equipoCasa">
            <?php
            foreach ($equipos as $equipo) {
                echo "<option value=\"" . $equipo["idEquipo"] . "\">" . $equipo["nombre"] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="control-group">
        <label class="control-label" for="localScore">Puntuación de equipo local</label>
        <div class="controls">
            <input name="localScore" type="text" id="localScore" placeholder="Cantidad de goles" value="">
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nombre de equipo visitante</label>
        <select class="controls" name="equipoVisita" id="equipoVisita">
            <?php
            foreach ($equipos as $equipo) {
                echo "<option value=\"" . $equipo["idEquipo"] . "\">" . $equipo["nombre"] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="control-group">
        <label class="control-label" for="visitScore">Puntuación de equipo visitante</label>
        <div class="controls">
            <input name="visitScore" type="text" id="visitScore" placeholder="Cantidad de goles" value="">
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('addMatchModal').style.display='none'">Cerrar</button>
    </div>
</form>
