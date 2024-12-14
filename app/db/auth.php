<?php

include 'conexion.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


try {
    // Establecer conexión


    // Validar entradas
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT usuario, pass, rol FROM usuario WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    // Check if the query returned any rows
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbUsuario, $dbPassword, $rol);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $dbPassword)) {
            $_SESSION['usuario'] = $dbUsuario;

            // Redirect based on role
            if ($rol === 'administrador') {
                header("Location: ../../principalAdmin.php?usuario=" . urlencode($dbUsuario));
                exit();
            } elseif ($rol === 'odontologo') {
                header("Location: ../../sedeOdontologo.php?usuario=" . urlencode($dbUsuario));
                exit();
            } else {
                showError("Rol desconocido.");
            }
        } else {
            showError("Contraseña incorrecta.");
        }
    } else {
        showError("Usuario no encontrado.");
    }

    // Close connections
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // Manejo de excepciones
    showError($e->getMessage());
}

// Función para mostrar mensaje de error
function showError($message)
{
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>habilitacionconsultaexterna</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../app/css/index.css" type="text/css">
    </head>
    <body class="fondo-dos">
        <div class="succ text-center">
            <div class="col-12">
                <h5>' . htmlspecialchars($message) . '</h5>
            </div>
            <div class="logo-image-big bt">
                <img src="../img/cancel.png" alt="error" class="img-succ">
            </div>
            <div>
                <a class="btn btn-danger col col-md-auto" href="../../index.php">Continuar</a>
            </div>
        </div>
    </body>
    </html>';
}
