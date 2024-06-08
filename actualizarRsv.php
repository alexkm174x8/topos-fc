<?php
  $horaRsv = $_POST['horaRsv'];
  $estado = $_POST['estado'];
  require 'database.php';
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE reservacion SET estado = ? WHERE horaRsv = ?";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([$estado, $horaRsv])) {
    echo "Estado actualizado correctamente.";
  } else {
    echo "Error al actualizar el estado.";
  }
?>
