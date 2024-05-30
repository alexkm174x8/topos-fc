<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Agregar datos de un nuevo partido</h3>
            </div>
            <form class="form-horizontal" action="createPartido2.php" method="post">
                <div class="control-group">
                    <label class="control-label">Nombre de equipo local</label>
                    <select class="controls" name="equipoCasa" id="equipoCasa">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "topos";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        $sql = "SELECT idEquipo, nombre FROM topos_equipo";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row["idEquipo"] . "\">" . $row["nombre"] . "</option>";
                            }
                        } else {
                            echo "<option value=\"\">No hay equipos disponibles.</option>";
                        }

                        $conn->close();
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
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        $sql = "SELECT idEquipo, nombre FROM topos_equipo";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row["idEquipo"] . "\">" . $row["nombre"] . "</option>";
                            }
                        } else {
                            echo "<option value=\"\">No hay equipos disponibles.</option>";
                        }

                        $conn->close();
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
                    <a class="btn" href="admin.php">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
