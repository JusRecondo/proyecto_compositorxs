<?php 
require_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyecto_compositorxs</title>

    <link rel="stylesheet" href="css/styles.css">
    <script src="js/main.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cousine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>proyecto_compositorxs</h1>

        <nav>
            <ul id="menuPrincipal">
                <li class="menu-item">
                    <a href="#fichasCompositorxs">Compositorxs</a>
                </li>
                <li class="menu-item">
                    <a href="#buscar">Buscar</a>
                </li>
                <li class="menu-item">
                    <a href="#contacto">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
            <?php 
                if ( ! empty ( $_GET['gracias'] ) &&
                $_GET['gracias'] === 'ok' ) {
                    ?>

                <section id="gracias">
                    <h2>Gracias por colaborar!</h2>
                    <p>Vamos a evaluar tu propuesta.</p>
                </section>
                 
                <?php 
                }
            ?>

        <section id="fichasCompositorxs">
            <?php 
                $compositorxs = traer_info_compositorxs();
                echo imprimir_ficha_compositorx( $compositorxs );
            ?>           
        </section>
        
        <section id="buscar">
            <h2>Buscar</h2>
            <form id="formBusqueda">
                <label>
                    <input type="text" name="search" id="busquedaCompositorx" required>

                    <input type="submit" value="buscar">
                </label>
            </form>
            <article id="resultadoBusqueda">

            </article>
        </section>

        <section id="contacto">
            <h2>¿Querés que agreguemos a alguien?</h2>

            <p>Envianos la información de le compositorx</p>

            <form action="contacto.php" method="POST">
                <label>Nombre:
                    <input type="text" name="nombre" required>
                </label>

                <label>Breve bio (máx. 2000 caracteres)
                    <textarea name="bio" maxlength="2000"
                    required></textarea>
                </label>

                <label>Foto (enlace)
                    <input type="url" name="pic" required>
                </label>

                <label>Tu mail:
                    <input type="email" name="email" required>
                </label>

                <input type="submit" value="enviar">
            </form>
        </section>
    </main>
    <footer>
        <a href="" target="_blank">proyecto_compositorxs 2021</a>
    </footer>    
</body>
</html>