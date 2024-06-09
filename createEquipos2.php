<?php
include 'database.php';

    if (!empty($_POST['nombre']) && !empty($_POST['año']) && !empty($_POST['gol']) && !empty($_POST['playedMatches']) && !empty($_POST['wonMatches']) && !empty($_POST['tiedMatches']) && !empty($_POST['lostMatches']) && !empty($_POST['extraPoints'] && !empty($_POST['idLiga']))) {
        $nombreEquipo = $_POST['nombre'];
        $añoCreacion = $_POST['año'];
        $logo = $_POST['logo'];
        $gol = $_POST['gol'];
        $partidosTotales = $_POST['playedMatches'];
        $partidosGanados = $_POST['wonMatches'];
        $partidosEmpatados = $_POST['tiedMatches'];
        $partidosPerdidos = $_POST['lostMatches'];
        $puntosExtra = $_POST['extraPoints'];
        $idLiga = $_POST['idLiga'];

		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_last_id = "SELECT MAX(idequipo) AS last_id FROM topos_equipo";
        $stmt_last_id = $pdo->query($sql_last_id);
        $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
        $lastId = $row['last_id'];
        $nuevoIdEquipo = $lastId + 1;

        $sql_insert = "INSERT INTO topos_equipo (idequipo, nombre, creacion, logo, goles_totales, partidos_totales, partidos_ganados, partidos_empatados, partidos_perdidos, puntos_extras, idLiga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql_insert);
        $q->execute(array($nuevoIdEquipo, $nombreEquipo, $añoCreacion, $logo, $gol, $partidosTotales,$partidosGanados,$partidosEmpatados,$partidosPerdidos,$puntosExtra, $idLiga));
        
        Database::disconnect();
        header("Location: admin.php");
	}
    else{
        echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'admin.php';</script>";

    }
?>
