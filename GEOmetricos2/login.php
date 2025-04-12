<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'lsv');

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si es una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom']);
    $password = $_POST['password'];

    // Usar prepared statements para prevenir inyección SQL
    $stmt = $conn->prepare("SELECT password FROM usuari WHERE nom = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Usuario o contraseña incorrectos.";
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['nom'] = $nom;
            session_regenerate_id(true);
            header("Location: geo.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }

    // Mensaje genérico para no dar pistas a atacantes
    echo "Usuario o contraseña incorrectos.";

    // Cerrar la conexión
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="geo.css">

</head>
<body>
    <h1>Formulario de Login</h1>
    <form action="login.php" method="POST">
        <label for="nom">Usuario:</label>
        <input type="text" name="nom" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <br>
    <!-- Botón para registrar nuevos usuarios -->
    <a href="register.php">
        <button>Registrarse</button>
    </a>
</body>
</html>
