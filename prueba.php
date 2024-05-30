<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "topos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre_html = isset($_GET['nombre_html']) ? $_GET['nombre_html'] : '';

if (isset($_GET['equipo'])) {
    $equipo = $conn->real_escape_string($_GET['equipo']);
    $sql = "SELECT * FROM TOPOS_Equipo WHERE nombre='$equipo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = json_encode($row);
    } else {
        $response = json_encode([]);
    }
    echo $response;
} else {
    $sql = "SELECT nombre, logo FROM TOPOS_Equipo";
    if ($nombre_html === 'estadistica_varonil') {
        $sql .= " WHERE IDLIGA = 1";
    } elseif ($nombre_html === 'estadistica_femenil') {
        $sql .= " WHERE IDLIGA = 2";
    } elseif ($nombre_html === 'estadistica_topitos') {
        $sql .= " WHERE IDLIGA = 3";
    }
    $result = $conn->query($sql);
    $equipos = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $equipos[] = $row;
        }
    }

    echo json_encode($equipos);
}

$conn->close();
?>
