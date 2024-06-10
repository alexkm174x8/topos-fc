<?php
session_start();
if (isset($_SESSION['user_name'])) {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acceso Administración</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="access">
<div class="imagen_navbar">
    <img src="images/topos_logo.png" alt="Logo de topos FC">
</div>
<form action="login.php" method="post">
    <h2>Acceso de Administradores</h2>
    <?php if(isset($_GET["error"])){?>
        <p class="error"><?php echo $_GET["error"];?></p>
    <?php }?>
    <label>Usuario</label>
    <input type="text" name="uname" placeholder="Ingresa tu usuario aquí"><br>

    <label>Clave</label>
    <input type="password" name="password" placeholder="Ingresa tu clave aquí"><br>

    <button type="submit">Login</button>
</form>
</body>
</html>
