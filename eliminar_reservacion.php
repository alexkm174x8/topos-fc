<?php
// Conectarse a la base de datos
require 'database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obtener la hora de la reservación desde la solicitud POST
$horaRsv = $_POST['horaRsv'];

// Preparar la consulta SQL para eliminar la reservación
$sql = "DELETE FROM reservacion WHERE horaRsv = ?";
$stmt = $pdo->prepare($sql);

// Ejecutar la consulta y devolver una respuesta
if ($stmt->execute([$horaRsv])) {
    echo "Reservación eliminada correctamente.";
} else {
    echo "Error al eliminar la reservación.";
}

// Desconectarse de la base de datos
Database::disconnect();
?>
