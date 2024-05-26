<?php
include 'database.php';

    if (!empty($_POST['nombre']) && !empty($_POST['año']) && !empty($_POST['gol']) && !empty($_POST['playedMatches']) && !empty($_POST['wonMatches']) && !empty($_POST['tiedMatches']) && !empty($_POST['lostMatches']) && !empty($_POST['extraPoints'])) {
        $nombreEquipo = $_POST['nombre'];
        $añoCreacion = $_POST['año'];
        $gol = $_POST['gol'];
        $partidosTotales = $_POST['playedMatches'];
        $partidosGanados = $_POST['wonMatches'];
        $partidosEmpatados = $_POST['tiedMatches'];
        $partidosPerdidos = $_POST['lostMatches'];
        $puntosExtra = $_POST['extraPoints'];

		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_last_id = "SELECT MAX(idequipo) AS last_id FROM TOPOS_Equipos";
        $stmt_last_id = $pdo->query($sql_last_id);
        $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
        $lastId = $row['last_id'];
        $nuevoIdEquipo = $lastId + 1;

        $sql_insert = "INSERT INTO TOPOS_Equipos (idequipo, nombre, creacion, goles_totales, partidos_totales, partidos_ganados, partidos_empatados, partidos_perdidos, puntos_extras) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql_insert);
        $q->execute(array($nuevoIdEquipo, $nombreEquipo, $añoCreacion, $gol, $partidosTotales,$partidosGanados,$partidosEmpatados,$partidosPerdidos,$puntosExtra));
        
        Database::disconnect();
        header("Location: index.php");
	}
    else{
        echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'createEquipos.php';</script>";

    }
?>
