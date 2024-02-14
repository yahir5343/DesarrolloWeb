<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="bootstrap.css">

    <style>
        .login-container {
            width: 350px;  /* Adjust width as needed */
            margin: 50px auto; /* Center horizontally and top margin */
            padding: 20px;
            border: 1px solid #ccc; /* Optional styling */
            border-radius: 5px;    /* Optional styling */
        }
    </style>
</head>
<body>
    <div class="container">  <div class="login-container"> 
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="post">
                <div class="mb-2">
                    <label for="username" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
