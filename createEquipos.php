<?php
if (isset($_GET['idLiga'])) {
    $idLiga = intval($_GET['idLiga']);
} else {
    echo "idLiga no está establecido en la URL.";
    exit;
}
?>

<form class="form-horizontal" action="createEquipos2.php" method="post">
    <input type="hidden" name="idLiga" value="<?php echo $idLiga; ?>">
    <div class="control-group">
        <label class="control-label">Nombre de equipo</label>
        <div class="controls">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de Equipo" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Año de creación del equipo</label>
        <div class="controls">
            <input type="text" class="form-control" id="año" name="año" placeholder="Año de creación" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Logo</label>
        <div class="controls">
            <input type="text" class="form-control" id="logo" name="logo" placeholder="Logo" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Número de goles anotados en total</label>
        <div class="controls">
            <input type="text" class="form-control" id="gol" name="gol" placeholder="Goles Totales" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos jugados</label>
        <div class="controls">
            <input type="text" class="form-control" id="playedMatches" name="playedMatches" placeholder="Partidos Jugados" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos ganados</label>
        <div class="controls">
            <input type="text" class="form-control" id="wonMatches" name="wonMatches" placeholder="Victorias" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos empatados</label>
        <div class="controls">
            <input type="text" class="form-control" id="tiedMatches" name="tiedMatches" placeholder="Empates" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Partidos perdidos</label>
        <div class="controls">
            <input type="text" class="form-control" id="lostMatches" name="lostMatches" placeholder="Derrotas" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Puntos extra</label>
        <div class="controls">
            <input type="text" class="form-control" id="extraPoints" name="extraPoints" placeholder="Puntos Extra" required>
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('addTeamModal').style.display='none'">Cerrar</button>
    </div>
</form>
