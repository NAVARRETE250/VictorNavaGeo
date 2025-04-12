<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'lsv');
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Limpiar y validar datos
    $nom = trim($_POST['nom']);
    $password = trim($_POST['password']);
    $mail = !empty(trim($_POST['mail'])) ? trim($_POST['mail']) : NULL; // Si está vacío, guarda NULL
    $telf = !empty(trim($_POST['telf'])) ? trim($_POST['telf']) : NULL;

    // Validar campos obligatorios
    if (empty($nom) || empty($password)) {
        die("Error: Usuario y contraseña son obligatorios.");
    }

    // Verificar si el correo ya existe (solo si no es NULL)
    if ($mail !== NULL) {
        $check_sql = "SELECT id FROM usuari WHERE mail = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            die("Error: Este correo electrónico ya está registrado.");
        }
        $stmt->close();
    }

    // Cifrar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la base de datos (manejando NULL)
    $sql = "INSERT INTO usuari (nom, password, mail, telf) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nom, $hashedPassword, $mail, $telf);

    if ($stmt->execute()) {
        echo "Usuario registrado con éxito. <a href='login.php'>Inicia sesión aquí</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="geo.css">

</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="register.php" method="POST">


        <label for="nom">Usuario:</label>
        <input type="text" name="nom" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="mail">mail:</label>
        <input type="text" name="mail" ><br>

        <label for="telf">telf:</label>
        <input type="num" name="telf" ><br>



        <input type="submit" value="Registrarse">
        

    </form>
</body>
</html>
