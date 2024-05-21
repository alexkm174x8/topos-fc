<?php
include 'database.php';

    if (!empty($_POST['nombre']) && !empty($_POST['fecha'])) {
        $nombreEquipo = $_POST['nombre'];
        $fechaIngreso = $_POST['fecha'];

		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_last_id = "SELECT MAX(idequipo) AS last_id FROM CRUD_Equipo";
        $stmt_last_id = $pdo->query($sql_last_id);
        $row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
        $lastId = $row['last_id'];
        $nuevoIdEquipo = $lastId + 1;

        $sql_insert = "INSERT INTO CRUD_Equipo (idequipo, equipo, creacion) VALUES (?, ?, ?)";
        $q = $pdo->prepare($sql_insert);
        $q->execute(array($nuevoIdEquipo, $nombreEquipo, $fechaIngreso));
        
        Database::disconnect();
        header("Location: index.php");
	}
    else{
        echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'createEquipos.php';</script>";

    }
?>
