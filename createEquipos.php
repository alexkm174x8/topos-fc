<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
		   			<h3>Agregar un nuevo equipo</h3>
		   		</div>
					<form class="form-horizontal" action="createEquipos2.php" method="post">
    					<div class="control-group">
        					<label class="control-label">Nombre de equipo</label>
        					<div class="controls">
            					<input name="nombre" type="text" placeholder="Nombre de Equipo" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
    					<div class="control-group">
        					<label class="control-label">Año de creación del equipo</label>
        					<div class="controls">
            					<input name="año" type="text" placeholder="Año de creación" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Número de goles anotados en total</label>
        					<div class="controls">
            					<input name="gol" type="text" placeholder="Goles totales" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Partidos jugados</label>
        					<div class="controls">
            					<input name="playedMatches" type="text" placeholder="Goles totales" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Partidos ganados</label>
        					<div class="controls">
            					<input name="wonMatches" type="text" placeholder="Victorias" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Partidos empatados</label>
        					<div class="controls">
            					<input name="tiedMatches" type="text" placeholder="Empates" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Partidos perdidos</label>
        					<div class="controls">
            					<input name="lostMatches" type="text" placeholder="Derrotas" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
						<div class="control-group">
        					<label class="control-label">Puntos extra</label>
        					<div class="controls">
            					<input name="extraPoints" type="text" placeholder="Puntos adicionales" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
    					<div class="form-actions">
        					<button type="submit" class="btn btn-success">Agregar</button>
      						<a class="btn" href="index.php">Regresar</a>
    					</div>
					</form>
				</div>
	    </div> 
	</body>
</html>
