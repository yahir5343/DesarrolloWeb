<?php
// Definir credenciales válidas
$credenciales = [
    "administrador" => "asd",
    "cliente" => "123"
];

// Verificar si se enviaron datos de inicio de sesión
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales
    if(array_key_exists($username, $credenciales) && $credenciales[$username] === $password) {
        // Credenciales válidas, redirigir al usuario a su página correspondiente
        if ($username === "administrador") {
            header('Location: AdminView.php');
            exit;
        } elseif ($username === "cliente") {
            header('Location: productos_cliente.php');
            exit;
        }
    } else {
        // Credenciales incorrectas, redirigir al usuario a una página de error
        header('Location: error.php');
        exit;
    }
} else {
    // Redirigir al formulario de inicio de sesión si no se enviaron datos
    header('Location: index.php');
    exit;
}
?>
