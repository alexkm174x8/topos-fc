<?php
require 'database.php';

$dia = isset($_POST['dia']) ? $_POST['dia'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;

if ($dia !== null && $mes !== null && $ano !== null) {
    try {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT HOUR(horaRsv) AS hora
                FROM reservacion
                WHERE DAY(horaRsv) = ?
                AND MONTH(horaRsv) = ?
                AND YEAR(horaRsv) = ?";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([$dia, $mes, $ano]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $horasReservadas = [];
        foreach ($result as $row) {
            $horasReservadas[] = $row['hora'];
        }

        echo '<select id="hora" name="hora" required>
            <option value="" disabled selected>Selecciona una hora</option>';  
        for ($hr = 7; $hr <= 23; $hr++) {
            if (!in_array($hr, $horasReservadas)) {
                echo '<option value="'.$hr.'">'.$hr.':00</option>';
            } 
            else {
                echo '<option value="'.$hr.'" disabled>'.$hr.':00</option>';
            }
        }
        echo '</select>';

        Database::disconnect();
    } catch (PDOException $e) {
        echo "Error de la base de datos: " . $e->getMessage();
    }
} else {
    echo "Error: No se recibieron los valores correctamente.";
}
?>
