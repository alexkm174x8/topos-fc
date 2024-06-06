<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['teamName'];
    $name = $_POST['name'];
    $lastName = $_POST['lastNames'];
    $correo = $_POST['email'];
    $age = $_POST['age'];
    $col = $_POST['col'];
    $phoneNumber = $_POST['phoneNumber'];
    $consent = $_POST['consent'];
    $parentConsent = $_POST['parentConsent'];
    $idLiga = $_POST['idLiga'];
    $tutor = $_POST['tutor'];
    $medio = $_POST['medio'];
    $mayorEdad = $_POST['ageReq'];
    $teamLogo = $_POST['teamLogo'];
    

    try {
        // Connect to the database using the Database class
        $db = Database::connect();

        // Check if a team with the same nombre already exists
        $stmt = $db->prepare("SELECT COUNT(*) AS teamCount FROM topos_equipo WHERE nombre = :teamName");
        $stmt->execute(['teamName' => $teamName]);
        $teamCount = $stmt->fetch(PDO::FETCH_ASSOC)['teamCount'];

        // If a team with the same nombre exists, display a message and redirect back
        if ($teamCount > 0) {
            echo "Este equipo ya ha sido registrado.";
            header("Location: equipo.html");
            exit;
        }

        // Proceed with inserting the new team into topos_equipo table
        $stmt = $db->prepare("INSERT INTO topos_equipo (nombre, idLiga, logo) VALUES (:teamName, :idLiga, :teamLogo)");
        $stmt->execute([
            'teamName' => $teamName,
            'idLiga' => $idLiga
        ]);
        
        // Get the last inserted team id
        $teamId = $db->lastInsertId();

        // Get the max idJugador from topos_jugador table
        $stmt = $db->query("SELECT MAX(idJugador) AS maxId FROM topos_jugador");
        $maxIdResult = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxIdJugador = $maxIdResult['maxId'] + 1;

        // Insert player into topos_jugador with a unique idJugador
        $stmt2 = $db->prepare("INSERT INTO topos_jugador (idJugador, nombres, apellidos, idEquipo) VALUES (:idJugador, :name, :lastName, :teamId)");
        $stmt2->execute([
            'idJugador' => $maxIdJugador,
            'name' => $name,
            'lastName' => $lastName,
            'teamId' => $teamId
        ]);

        $stmt3 = $db->prepare("INSERT INTO topos_informacion (idJugador, edad, correo, colonia, telefono, acuerdoImagen, acuerdoImagenTutor, tutor, medio, ageReq) VALUES (:idJugador, :age, :correo, :col, :telefono, :consent, :parentConsent, :tutor, :medio, :ageReq)");
        $stmt3->execute([
            'idJugador' => $maxIdJugador,
            'age' => $age,
            'correo' => $correo,
            'col' => $col,
            'telefono' => $phoneNumber,
            'consent' => $consent,
            'parentConsent' => $parentConsent,
            'tutor' => $tutor,
            'medio' => $medio,
            'ageReq' => $mayorEdad
        ]);

        if ($stmt3->rowCount() > 0) {
            echo "Los datos han sido guardados exitosamente.";
        } else {
            echo "Hubo un error al intentar guardar la información: " . implode(" ", $stmt3->errorInfo());
        }

        // Redirect to equipo.html page
        header("Location: equipo.html");
        exit; // Ensure that subsequent code is not executed
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    } finally {
        // Disconnect from the database
        Database::disconnect();
    }
}
?>