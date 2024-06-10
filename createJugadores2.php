<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $team_id = $_GET['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $posicion = $_POST['posicion'];
    $goles = $_POST['goles'];

    // Validar que todos los campos estén llenos
    if (!empty($nombres) && !empty($apellidos) && !empty($estado) && !empty($numero) && !empty($posicion) && !empty($goles)) {
        $pdo = Database::connect();
        $sql = "INSERT INTO topos_jugador (idEquipo, nombres, apellidos, estado, numero, posicion, goles) values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$team_id, $nombres, $apellidos, $estado, $numero, $posicion, $goles]);
        Database::disconnect();

        header("Location: jugadores.php?id=$team_id");
        exit;
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido o ID de equipo no establecido.";
}
?>
