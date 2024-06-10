<?php
require 'database.php';

try {
    // Obtener el ID del jugador de la URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        throw new Exception("El ID del jugador no está presente en la URL.");
    }
    $id = $_GET['id'];

    // Establecer la conexión a la base de datos
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el ID del equipo del jugador antes de eliminarlo
    $sql_get_team_id = "SELECT idEquipo FROM topos_jugador WHERE idJugador = ?";
    $q_get_team_id = $pdo->prepare($sql_get_team_id);
    $q_get_team_id->execute(array($id));
    $team_result = $q_get_team_id->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un resultado
    if (!$team_result) {
        throw new Exception("No se encontró un jugador con el ID especificado.");
    }

    $team_id = $team_result['idEquipo'];

    // Preparar la consulta de eliminación del jugador
    $sql_delete_player = "DELETE FROM topos_jugador WHERE idJugador = ?";
    $q_delete_player = $pdo->prepare($sql_delete_player);
    $q_delete_player->execute(array($id));

    // Cerrar la conexión a la base de datos
    Database::disconnect();

    // Redireccionar a la página de jugadores del equipo después de eliminar al jugador
    header("Location: jugadores.php?id=$team_id");
} catch (PDOException $e) {
    // Capturar y mostrar cualquier excepción que ocurra durante la ejecución de la consulta
    echo "Error al eliminar al jugador: " . $e->getMessage();
} catch (Exception $e) {
    // Capturar y mostrar excepciones generales
    echo "Error: " . $e->getMessage();
}
?>
