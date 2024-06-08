<?php
require 'database.php';
// Recibir los valores del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
$dia = isset($_POST['dia']) ? $_POST['dia'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$hora = isset($_POST['hora']) ? $_POST['hora'] : null;
$estado = 'Pendiente';
$time = "$ano-$mes-$dia $hora:00";


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Consulta para verificar si el timestamp ya existe
$sql_check = "SELECT COUNT(*) as count FROM reservacion
            WHERE DAY(horaRsv) = ?
            AND MONTH(horaRsv) = ?
            AND YEAR(horaRsv) = ?
            AND HOUR(horaRsv) = ?";
$stmt = $pdo->prepare($sql_check);
$stmt->bindValue(1, $dia, PDO::PARAM_INT);
$stmt->bindValue(2, $mes, PDO::PARAM_INT);
$stmt->bindValue(3, $ano, PDO::PARAM_INT);
$stmt->bindValue(4, $hora, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $row['count'];

if ($count == 0) {
    $sql_last_id = "SELECT MAX(idReserva) AS last_id FROM reservacion";
    $stmt_last_id = $pdo->query($sql_last_id);
    $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
    $lastId = $row['last_id'];
    $idReserva = $lastId + 1;

    $sql = "INSERT INTO reservacion (idReserva, nombre, apellido, email, motivo, horaRsv, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($idReserva, $nombre, $apellido ,$email, $motivo, $time, $estado));
    echo "Reserva realizada <br>";
}


    $sql = "SELECT HOUR(horaRsv) AS hora
            FROM reservacion
            WHERE DAY(horaRsv) = ?
            AND MONTH(horaRsv) = ?
            AND YEAR(horaRsv) = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $dia, PDO::PARAM_INT);
    $stmt->bindValue(2, $mes, PDO::PARAM_INT);
    $stmt->bindValue(3, $ano, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $horasReservadas = [];
    foreach ($result as $row) {
        $horasReservadas[] = $row['hora'];
    }
    header("Location: confirmacionRsv.html");
    exit;
?>