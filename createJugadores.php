
        <form class="form-horizontal" action="createJugadores2.php?id=<?php if(isset($_GET['id'])) { $team_id=$_GET['id']; echo $team_id; } ?>" method="post" onsubmit="return validateForm()">
            <div class="control-group">
                <label class="control-label">Nombre/s</label>
                <div class="controls">
                    <input name="nombres" type="text" placeholder="Nombres" required>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Apellidos</label>
                <div class="controls">
                    <input name="apellidos" type="text" placeholder="Apellidos" required>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Estado</label>
                <div class="controls">
                    <input name="estado" type="radio" value="Activo" required> Activo</input> &nbsp;&nbsp;
                    <input name="estado" type="radio" value="Inactivo" required> Inactivo</input>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Número de Jugador</label>
                <div class="controls">
                    <input name="numero" type="text" placeholder="Número de jugador" required>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Posición</label>
                <div class="controls">
                    <input name="posicion" type="text" placeholder="Posición en el campo" required>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Goles</label>
                <div class="controls">
                    <input name="goles" type="text" placeholder="Cantidad de goles anotados" required>
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Agregar</button>
                <button type="button" class="btn" onclick="document.getElementById('addPlayerModal').style.display='none'">Cerrar</button>
            </div>
        </form>
