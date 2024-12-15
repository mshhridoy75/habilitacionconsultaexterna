<?php
include 'conexion.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Validar entradas
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, usuario, pass, rol FROM usuario WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    // Check if the query returned any rows
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbId, $dbUsuario, $dbPassword, $rol);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $dbPassword)) {
            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);
            
            // Store the logged-in user's id and username
            $_SESSION['usuario'] = $dbUsuario;  // Storing the username in session
            $_SESSION['usuario_id'] = $dbId;    // Store the user ID

            // Now `$actual` can be `$_SESSION['usuario_id']`
            $actual = $_SESSION['usuario_id'];

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
    // Handle exceptions
    showError("Error: " . $e->getMessage());
}

// Function to show error messages
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
