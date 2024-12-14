<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion == '') {
    echo 'Usted no tiene autorizacion';
    die();
}

// Fetch user information (replace with your database logic)
$user_info = [
    'username' => $varsesion,
    'role' => 'Odontologo', // Example data; fetch from DB
    'email' => 'example@example.com', // Example data; fetch from DB
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle account updates (e.g., password change)
    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = $_POST['new_password'];
        // Update password in the database (replace with your DB logic)
        echo '<script>alert("Contraseña actualizada exitosamente.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Cuenta</title>
    <link rel="stylesheet" href="./app/css/bootstrap.min.css">
    <link rel="stylesheet" href="./app/css/paper-dashboard.css?v=2.0.1">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Gestionar Cuenta</h2>

        <!-- Display user information -->
        <div class="card mt-3">
            <div class="card-header">Información de Usuario</div>
            <div class="card-body">
                <p><strong>Usuario:</strong> <?php echo htmlspecialchars($user_info['username']); ?></p>
                <p><strong>Rol:</strong> <?php echo htmlspecialchars($user_info['role']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user_info['email']); ?></p>
            </div>
        </div>

        <!-- Form to update password -->
        <div class="card mt-3">
            <div class="card-header">Actualizar Contraseña</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="new_password">Nueva Contraseña:</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>

        <!-- Logout link -->
        <div class="mt-3 text-center">
            <a href="app/db/auth/sessiondie.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>

    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
</body>
</html>
