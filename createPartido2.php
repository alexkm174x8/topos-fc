<?php
include 'database.php';

if (!empty($_POST['equipoCasa']) && !empty($_POST['localScore']) && !empty($_POST['equipoVisita']) && !empty($_POST['visitScore'] && !empty($_POST['idLiga']))) {
    $homeTeam = $_POST['equipoCasa'];
    $localScore = $_POST['localScore'];
    $visitTeam = $_POST['equipoVisita']; 
    $visitScore = $_POST['visitScore'];
    $idLiga = $_POST['idLiga'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_last_id = "SELECT MAX(idPartido) AS last_id FROM topos_partido";
    $stmt_last_id = $pdo->query($sql_last_id);
    if ($stmt_last_id) {
        $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
        $lastId = $row['last_id'];
        $nuevoIdPartido = $lastId + 1;
    } else {
        echo "Hubo un error recuperando la última ID: " . $pdo->errorInfo()[2];
        Database::disconnect();
        exit();
    }

    // Insert new match record
    $sql_insert = "INSERT INTO topos_partido (idPartido, equipo_casa, marcador_casa, equipo_visita, marcador_visita, fecha, idLiga) VALUES (?, ?, ?, ?, ?, NOW(), ?)";
    $q = $pdo->prepare($sql_insert);
    if ($q->execute(array($nuevoIdPartido, $homeTeam, $localScore, $visitTeam, $visitScore, $idLiga))) {
        Database::disconnect();
        header("Location: admin.php");
        exit();
    } else {
        echo "Error inserting record: " . $q->errorInfo()[2];
        Database::disconnect();
        exit();
    }
} else {
    echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'createPartido.php';</script>";
}
?>
