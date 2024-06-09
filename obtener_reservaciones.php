<?php
require 'database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT nombre, apellido, correo, motivo, horaRsv FROM reservacion WHERE estado = 'Pendiente'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();
echo json_encode($result);
?>
