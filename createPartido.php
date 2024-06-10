<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['idLiga'])) {
    $idLiga = intval($_GET['idLiga']);

    // Incluir el archivo de conexión a la base de datos
    include 'database.php';

    // Crear conexión utilizando la clase Database
    $pdo = Database::connect();

    // Preparar la consulta
    $sql = "SELECT idEquipo, nombre FROM topos_equipo WHERE idLiga = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $pdo->errorInfo()[2]);
    }

    // Ejecutar la consulta con el parámetro
    $stmt->execute([$idLiga]);

    // Obtener resultado
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result === false) {
        die("Error al ejecutar la consulta: " . $stmt->errorInfo()[2]);
    }

    // Obtener equipos
    $equipos = [];
    if (count($result) > 0) {
        foreach ($result as $row) {
            $equipos[] = $row;
        }
    } else {
        echo "No se encontraron equipos para la liga especificada.";
    }

    // Cerrar la conexión
    $stmt->closeCursor();
    $pdo = null;
} else {
    echo "idLiga no está establecido en la URL.";
    exit;
}
?>

<form class="form-horizontal" action="createPartido2.php" method="post">
    <input type="hidden" name="idLiga" value="<?php echo htmlspecialchars($idLiga); ?>">
    <div class="control-group">
        <label class="control-label">Nombre de equipo local</label>
        <select class="controls" name="equipoCasa" id="equipoCasa">
            <?php
            foreach ($equipos as $equipo) {
                echo "<option value=\"" . htmlspecialchars($equipo["idEquipo"]) . "\">" . htmlspecialchars($equipo["nombre"]) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="control-group">
        <label class="control-label" for="localScore">Puntuación de equipo local</label>
        <div class="controls">
            <input type="text" class="form-control" id="localScore" name="localScore" placeholder="Cantidad de goles" required>
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nombre de equipo visitante</label>
        <select class="controls" name="equipoVisita" id="equipoVisita">
            <?php
            foreach ($equipos as $equipo) {
                echo "<option value=\"" . htmlspecialchars($equipo["idEquipo"]) . "\">" . htmlspecialchars($equipo["nombre"]) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="control-group">
        <label class="control-label" for="visitScore">Puntuación de equipo visitante</label>
        <div class="controls">
            <input type="text" class="form-control" id="visitScore" name="visitScore" placeholder="Cantidad de goles" required>
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('addMatchModal').style.display='none'">Cerrar</button>
    </div>
</form>
