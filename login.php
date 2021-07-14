<?php

session_start(); 
if ( $_SESSION['logged-in'] === TRUE ) {
    header( 'Location: admin.php' );
    die();
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyecto_compositorxs</title>

    <link rel="stylesheet" href="css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cousine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php">
            <h1>proyecto_compositorxs</h1>
        </a>
    </header>

    <main>
        <?php 
            if ( ! empty ( $_GET['user'] ) &&
                    $_GET['user'] === 'invalid' ) {
                        ?>

                <section>
                    <h2>Email o contraseña incorrectos.</h2>
                </section>
                    
                <?php 
            }
        ?>
        <section id="login">
            <h2>Login</h2>

            <form action="process-login.php" method="POST">
                <label>E-Mail:
                    <input type="email" name="email" required>
                </label>

                <label>Contraseña:
                    <input type="password" name="password" required>
                </label>

                <input type="submit" value="enviar">
            </form>
        </section>
    </main>
    <footer>
        <a href="https://github.com/JusRecondo/proyecto_compositorxs" target="_blank">gitHub proyecto_compositorxs 2021</a>
    </footer>    
</body>
</html>