<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link href=	"../css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
		   			<h3>Agregar un nuevo Jugador</h3>
		   		</div>

                   <form class="form-horizontal" action="createJugadores2.php?id=<?php if(isset($_GET['id'])) { $team_id=$_GET['id']; echo $team_id; } ?>" method="post">
                        <div class="control-group">
                            <label class="control-label">Nombre/s</label>
                            <div class="controls">
                                <input name="nombres" type="text"  placeholder="Nombres" value="">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Apellidos</label>
                            <div class="controls">
                                <input name="apellidos" type="text"  placeholder="Apellidos" value="">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Estado</label>
                            <div class="controls">
                                <input name="estado" type="radio" value="active"> Activo</input> &nbsp;&nbsp;
                                <input name="estado" type="radio" value="inactive"> Inactivo</input>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Número de Jugador</label>
                            <div class="controls">
                                <input name="numero" type="text"  placeholder="Número de jugador" value="">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Posición</label>
                            <div class="controls">
                                <input name="posicion" type="text"  placeholder="Posición en el campo" value="">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Goles</label>
                            <div class="controls">
                                <input name="goles" type="text"  placeholder="Cantidad de goles anotados" value="">
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Agregar jugador</button>
                            <a class="btn" href="jugadores.php?id=<?php echo $team_id?>">Regresar</a>
                        </div>
</form>
				</div>
	    </div>
	</body>
</html>
