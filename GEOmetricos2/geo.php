<?php 
session_start(); // Iniciar la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEOMÉTRICOS</title>
    <link rel="stylesheet" href="geo.css">
    <script defer src="geo.js"></script>
</head>
<body>
    <header>
        <h1 style="color:black">LOS GEOMÉTRICOS</h1>
        
        <!-- Icono de usuario -->
        <img src="img/icono.png" title="login" alt="Pulsa para hacer login" class="imagen-log" id="menu-toggle" style="margin-left: 10px;">
        
        <!-- Menú desplegable -->
        <div class="menusss" id="dropdown-menu" aria-expanded="false" aria-label="Menú de usuario">
            <?php if (isset($_SESSION['nom'])): ?>
                <p style="color: black;">Hola, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong>. ¡Bienvenido de nuevo!</p>
                <a href="area.php">Área</a>
                <a href="superficies.php">Perímetro</a>
                <a href="volumen.php">Volumen</a>
                <a href="logout.php" style="color:blue"><u>Cerrar sesión</u></a>
            <?php else: ?>
                <a href="login.php">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </header>


        <!-- Contenido condicional -->
        <?php if (isset($_SESSION['nom'])): ?>
            <div class="container">
    <div class="formitas">
        <div class="tarjetas" id="tarjetas"></div> <!-- Contenedor para las tarjetas -->
        <div class="detalles" id="detalles">
            <p id="figuraNom"></p>
            <img id="figuraImage" src="" alt="">
            <p id="perimetro"></p>
            <p id="area"></p>
            <p id="volumen"></p>
        </div>
    </div>
</div>
        <?php else: ?>
            <p style="text-align: center; color: red;">Debes iniciar sesión para ver el contenido.</p>
        <?php endif; ?>
    </div>
    


    <footer>MÁS INFORMACIÓN EN CHATGPT</footer>
</body>
</html>