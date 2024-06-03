<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database.php';

$dia = isset($_POST['dia']);
$mes = isset($_POST['mes']);
$ano = isset($_POST['ano']);

echo "Día: $dia<br>";
echo "Mes: $mes<br>";
echo "Año: $ano<br>";

if ($dia !== null && $mes !== null && $ano !== null) {
    $conn = Database::connect();

    $sql = "SELECT HOUR(horaRsv) AS hora
            FROM reservacion
            WHERE DAY(horaRsv) = ?
            AND MONTH(horaRsv) = ?
            AND YEAR(horaRsv) = ?";

    $stmt = $conn->prepare($sql);
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
} else {
    echo "Valores de fecha no proporcionados correctamente.";
}
?>
