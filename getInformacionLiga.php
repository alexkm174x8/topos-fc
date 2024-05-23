<?php
if (isset($_POST['leagueChosen'])) {
    include 'database.php';
    $pdo = Database::connect();
    
    $modality = $_POST['leagueChosen'];
    $response = '';

    if ($modality == "LVDorada") {
        $response .= '<div class="row">
                        <p><a href="createEquipos.php" class="btn btn-success">Agregar un equipo</a></p>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Numero de Equipo</th>
                                    <th>Nombre de Equipo</th>
                                    <th>Inscritos en</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
        
        $sql = "SELECT idequipo AS 'Numero de equipo', equipo AS 'Nombre de Equipo', creacion AS 'Inscritos en' FROM CRUD_Equipo";
        foreach ($pdo->query($sql) as $row) {
            $response .= '<tr>';
            $response .= '<td>'. $row['Numero de equipo'] . '</td>';
            $response .= '<td>'. $row['Nombre de Equipo'] . '</td>';
            $response .= '<td>'. $row['Inscritos en'] . '</td>';
            $response .= '<td width=250>';
            $response .= '<a class="btn" href="jugadores.php?id='.$row['Numero de equipo'].'">Detalles</a>';
            $response .= '&nbsp;';
            $response .= '<a class="btn btn-danger" href="delete.php?id='.$row['Numero de equipo'].'">Eliminar</a>';
            $response .= '</td>';
            $response .= '</tr>';
        }
        $response .= '</tbody></table></div>';

    } elseif ($modality == "LVEstrella") {
        $response .= '<table>
                        <tr>
                            <td><table class="info_cont"><tr><td><img src="images/usuario.png" alt="Imagen equipo 1" class="ima_equipo"></td></tr><tr><td><input type="text" placeholder="Equipo 1" class="fill"/></td></tr></table></td>
                            <td rowspan="2" class="write"><input type="text" placeholder="Puntaje Equipo 1"/></td>
                            <td rowspan="2" class="write"><input type="text" placeholder="Puntaje Equipo 2"/></td>
                            <td><table class="info_cont" id="left_team"><tr><td><img src="images/usuario.png" alt="Imagen equipo 2" class="ima_equipo"></td></tr><tr><td><input type="text" placeholder="Equipo 2" class="fill"/></td></tr></table></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr><td colspan="4"><button type="button" class="button-colors" onclick="statsPosted()">Publicar partido.</button></td></tr>
                    </table>';
    } elseif ($modality == "LFTalpa") {
        $response .= '<table>
                        <tr>
                            <td><table class="info_cont"><tr><td><img src="images/usuario.png" alt="Imagen equipo 1" class="ima_equipo"></td></tr><tr><td><input type="text" placeholder="Equipo 1" class="fill"/></td></tr></table></td>
                            <td rowspan="2" class="write"><input type="text" placeholder="Puntaje Equipo 1"/></td>
                            <td rowspan="2" class="write"><input type="text" placeholder="Puntaje Equipo 2"/></td>
                            <td><table class="info_cont" id="left_team"><tr><td><img src="images/usuario.png" alt="Imagen equipo 2" class="ima_equipo"></td></tr><tr><td><input type="text" placeholder="Equipo 2" class="fill"/></td></tr></table></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr><td colspan="4"><button type="button" class="button-colors" onclick="statsPosted()">Publicar partido.</button></td></tr>
                    </table>';
    }

    Database::disconnect();
    echo $response;
}
?>