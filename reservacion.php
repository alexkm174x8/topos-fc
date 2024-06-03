<?php
require 'database.php';
// Recibir los valores del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
$dia = isset($_POST['dia']) ? $_POST['dia'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$hora = isset($_POST['hora']) ? $_POST['hora'] : null;
$time = "$ano-$mes-$dia $hora:00";


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_last_id = "SELECT MAX(idReserva) AS last_id FROM reservacion";
$stmt_last_id = $pdo->query($sql_last_id);
$row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
$lastId = $row['last_id'];
$idReserva = $lastId + 1;

$sql = "INSERT INTO reservacion (idReserva, nombre, email, motivo, horaRsv) VALUES (?, ?, ?, ?, ?)";
$q = $pdo->prepare($sql);
$q->execute(array($idReserva, $nombre, $email, $motivo, $time));
echo "Reserva realizada <br>";

echo "Día: $dia<br>";
echo "Mes: $mes<br>";
echo "Año: $ano<br>";


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

    echo "<pre>";
    print_r($result);
    echo "</pre>";

    $horasReservadas = [];
    foreach ($result as $row) {
        $horasReservadas[] = $row['hora'];
    }

    echo "<pre>";
    print_r($horasReservadas);
    echo "</pre>";
?>