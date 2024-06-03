<?php
include 'database.php';

if (!empty($_POST['equipoCasa']) && !empty($_POST['localScore']) && !empty($_POST['equipoVisita']) && !empty($_POST['visitScore'])) {
    $homeTeam = $_POST['equipoCasa'];
    $localScore = $_POST['localScore'];
    $visitTeam = $_POST['equipoVisita'];
    $visitScore = $_POST['visitScore'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_last_id = "SELECT MAX(idPartido) AS last_id FROM topos_partido";
    $stmt_last_id = $pdo->query($sql_last_id);
    $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
    $lastId = $row['last_id'];
    $nuevoIdPartido = $lastId + 1;

    // Inserting new record with the correct column names
    $sql_insert = "INSERT INTO topos_partido (idPartido, equipo_casa, marcador_casa, equipo_visita, marcador_visita, fecha) VALUES (?, ?, ?, ?, ?, NOW())";
    $q = $pdo->prepare($sql_insert);
    $q->execute(array($nuevoIdPartido, $homeTeam, $localScore, $visitTeam, $visitScore));
    
    Database::disconnect();
    header("Location: admin.php");
    exit();
} else {
    echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'createPartido.php';</script>";
}
?>
