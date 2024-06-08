<?php
if (isset($_POST['horaRsv'])) {
  $horaRsv = $_POST['horaRsv'];

  require 'database.php';
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM reservacion WHERE horaRsv = ?";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([$horaRsv])) {
    echo "Reservación eliminada correctamente.";
  } else {
    echo "Error al eliminar la reservación.";
  }
} else {
  echo "Error: No se proporcionó la hora de la reservación.";
}
?>
