<?php
require 'database.php';

try {
    // Obtener el ID del jugador de la URL
    $id = $_GET['id'];

    // Establecer la conexión a la base de datos
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta de eliminación
    $sql = "DELETE FROM TOPOS_Jugador WHERE idjugador = ?";
    $q = $pdo->prepare($sql);

    // Ejecutar la consulta de eliminación con el ID del jugador
    $q->execute(array($id));

    // Cerrar la conexión a la base de datos
    Database::disconnect();

    // Redireccionar a la página principal después de eliminar al jugador
    header("Location: index.php");
} catch (PDOException $e) {
    // Capturar y mostrar cualquier excepción que ocurra durante la ejecución de la consulta
    echo "Error al eliminar al jugador: " . $e->getMessage();
}
?>
