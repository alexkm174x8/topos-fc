<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "topos";

$nombre_html = isset($_GET['nombre_html']) ? $_GET['nombre_html'] : '';

switch ($nombre_html) {
    case 'estadistica_varonil':
        $idLiga = 1;
        break;
    case 'estadistica_femenil':
        $idLiga = 3;
        break;
    case 'estadistica_topitos':
        $idLiga = 2;
        break;
    default:
        $idLiga = 1;
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

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
} elseif (isset($_GET['marcador'])) {
    $sql = "SELECT marcador_casa, marcador_visita, equipo_casa.logo AS logo_casa, equipo_visita.logo AS logo_visita FROM TOPOS_Partido
            INNER JOIN TOPOS_Equipo AS equipo_casa ON TOPOS_Partido.equipo_casa = equipo_casa.idEquipo
            INNER JOIN TOPOS_Equipo AS equipo_visita ON TOPOS_Partido.equipo_visita = equipo_visita.idEquipo
            WHERE TOPOS_Partido.idLiga = $idLiga ORDER BY fecha DESC LIMIT 1";
    $result = $conn->query($sql);
    $marcador = [];

    if ($result->num_rows > 0) {
        $marcador = $result->fetch_assoc();
    }
    echo json_encode($marcador);
} else {
    $sql = "SELECT nombre, logo FROM TOPOS_Equipo WHERE idLiga = $idLiga";
    $result = $conn->query($sql);
    $equipos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $equipos[] = $row;
        }
    }

    echo json_encode($equipos);
}

$conn->close();
?>
