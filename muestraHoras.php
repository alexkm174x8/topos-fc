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
            if(!empty($horasReservadas)){
                for ($hr = 7; $hr <= 22; $hr++) {
                    if (in_array($hr, $horasReservadas)) {
                        echo '<h5>'. $hr .':00 - '. $hr+1 .':00 Cancha Reservada.</h5>';  
                    } 
                }
            }
            else{
                echo '<h5>No hay reservas hechas para este día.</h5>';
            }
    
            Database::disconnect();
        } catch (PDOException $e) {
            echo "Error de la base de datos: " . $e->getMessage();
        }
    } else {
        echo "Error: No se recibieron los valores correctamente.";
    }
?>