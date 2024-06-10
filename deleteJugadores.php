<?php
require 'database.php';

try {
    // Obtener el ID del jugador de la URL
    $id = $_GET['id'];

    // Establecer la conexión a la base de datos
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el ID del equipo al que pertenece el jugador para la redirección
    $sql_get_team_id = "SELECT idEquipo FROM TOPOS_Jugador WHERE idJugador = ?";
    $q_get_team_id = $pdo->prepare($sql_get_team_id);
    $q_get_team_id->execute(array($id));
    $team_id = $q_get_team_id->fetch(PDO::FETCH_ASSOC)['idEquipo'];

    // Preparar la consulta de eliminación de información relacionada con el jugador
    $sql_delete_info = "DELETE FROM topos_informacion WHERE idJugador = ?";
    $q_delete_info = $pdo->prepare($sql_delete_info);
    $q_delete_info->execute(array($id));

    // Preparar la consulta de eliminación del jugador
    $sql_delete_player = "DELETE FROM TOPOS_Jugador WHERE idJugador = ?";
    $q_delete_player = $pdo->prepare($sql_delete_player);
    $q_delete_player->execute(array($id));

    // Cerrar la conexión a la base de datos
    Database::disconnect();

    // Redireccionar a la página de jugadores del equipo después de eliminar al jugador
    header("Location: jugadores.php?id=$team_id");
} catch (PDOException $e) {
    // Capturar y mostrar cualquier excepción que ocurra durante la ejecución de la consulta
    echo "Error al eliminar al jugador: " . $e->getMessage();
}
?>
