<?php
require_once 'database.php';

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

$conn = Database::connect();

if (isset($_GET['equipo'])) {
    $equipo = $conn->quote($_GET['equipo']);
    $sql = "SELECT * FROM TOPOS_Equipo WHERE nombre=$equipo";
    $result = $conn->query($sql);
    if ($result && $result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
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

    if ($result && $result->rowCount() > 0) {
        $marcador = $result->fetch(PDO::FETCH_ASSOC);
    }
    echo json_encode($marcador);
} elseif (isset($_GET['estadisticas_liga'])) {
    $sql = "SELECT partidos_totales, goles_totales FROM topos_liga WHERE idLiga = $idLiga";
    $result = $conn->query($sql);
    $estadisticas = [];

    if ($result && $result->rowCount() > 0) {
        $estadisticas = $result->fetch(PDO::FETCH_ASSOC);
    }
    echo json_encode($estadisticas);
} elseif (isset($_GET['ganador_ultimo_partido'])) {
    $sql = "SELECT equipo_casa, equipo_visita, marcador_casa, marcador_visita, fecha FROM TOPOS_Partido
            WHERE idLiga = $idLiga ORDER BY fecha DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->rowCount() > 0) {
        $partido = $result->fetch(PDO::FETCH_ASSOC);

        $equipo_ganador = null;
        if ($partido['marcador_casa'] > $partido['marcador_visita']) {
            $equipo_ganador = $partido['equipo_casa'];
        } elseif ($partido['marcador_visita'] > $partido['marcador_casa']) {
            $equipo_ganador = $partido['equipo_visita'];
        }

        if ($equipo_ganador) {
            $sql_logo = "SELECT logo FROM TOPOS_Equipo WHERE idEquipo = $equipo_ganador";
            $result_logo = $conn->query($sql_logo);
            if ($result_logo && $result_logo->rowCount() > 0) {
                $logo = $result_logo->fetch(PDO::FETCH_ASSOC)['logo'];
                $response = [
                    'logo_ganador' => $logo,
                    'fecha' => $partido['fecha']
                ];
                echo json_encode($response);
            } else {
                echo json_encode(['error' => 'Logo no encontrado']);
            }
        } else {
            echo json_encode(['error' => 'No hay ganador']);
        }
    } else {
        echo json_encode(['error' => 'No hay partidos']);
    }
} else {
    $sql = "SELECT nombre, logo FROM TOPOS_Equipo WHERE idLiga = $idLiga";
    $result = $conn->query($sql);
    $equipos = [];
    if ($result && $result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $equipos[] = $row;
        }
    }
    echo json_encode($equipos);
}

Database::disconnect();
?>
