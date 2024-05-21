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
        					<label class="control-label">Fecha Inscrita</label>
        					<div class="controls">
            					<input name="fecha" type="text" placeholder="Fecha de Ingreso" value="">
            					<span class="help-inline"></span>
        					</div>
    					</div>
    					<div class="form-actions">
        					<button type="submit" class="btn btn-success">Agregar</button>
      						<a class="btn" href="index.php">Regresar</a>
    					</div>
					</form>
				</div>
	    </div> <!-- /container -->
	</body>
</html>
