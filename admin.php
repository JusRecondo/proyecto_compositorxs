
<?php

session_start(); 
if ( $_SESSION['logged-in'] !== TRUE ) {
    header( 'Location: login.php' );
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
    <script src="js/main.js"></script>

</head>
<body>
    <header>
        <a href="index.php">
            <h1>proyecto_compositorxs</h1>
        </a>

        <nav>
            <button id="openMenuBtn">
                <div class="burger-line-x"></div>
                <div class="burger-line-y"></div>
            </button>
            <ul id="menuAdmin">
                <li class="menu-item">
                    <a href="index.php">Inicio</a>
                </li>
                <li class="menu-item active">
                    <a href="#cargarCompositorx">Cargar</a>
                </li>
                <li class="menu-item">
                    <a href="#editarCompositorx">Editar</a>
                </li>
                <li class="menu-item">
                    <a href="logout.php" class="enlace-login">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <?php 
            if ( ! empty ( $_GET['ok'] ) ) {
                if ( $_GET['ok'] === 'true' ) {
                ?>

                    <section class="aviso">
                        <h2>Carga/edición exitosa!</h2>
                        <a href="admin.php"> > Cargar otrx </a>
                        <a href="logout.php"> > Salir </a>
                    </section>  

                    <?php 
                } else if ( $_GET['ok'] === 'false' ) {
                ?>
                    <section class="aviso">
                        <h2>Hubo un problema al cargar, intentá de nuevo.</h2>
                    </section>                
                <?php 
                }
            }
        ?>
        <section id="cargarCompositorx">
            <h2>Ingresar datos de compositorx</h2>

            <form action="data-insert.php" method="POST">
                <label>Nombre compositorx:
                    <input type="text" name="nombre" required>
                </label>

                <label>Breve bio: (máx. 2000 caracteres)
                    <textarea name="bio" maxlength="2000"
                    required></textarea>
                </label>

                <label>Foto: (enlace) 
                    <input type="url" name="pic" required>
                </label>

                <input type="submit" value="cargar">
            </form>
        </section>

        <section id="editarCompositorx">
            <h2>Buscar y editar/eliminar</h2>

            <form id="formBusqueda">
                <label>
                    <input type="text" name="search" id="busquedaCompositorx" required>

                    <input type="submit" value="buscar">
                </label>
            </form>
            <article id="resultadoBusqueda">

            </article>

            <form id="formEdit" class="hidden" action="data-update.php" method="POST">
                <h3 id="formEditTitulo">Editar compositorx</h3>
                <input type="hidden" name="id-editar">

                <label>Editar nombre:
                    <input type="text" name="nombre-modificado">
                </label>

                <label>Editar bio: (máx. 2000 caracteres)
                    <textarea name="bio-modificada" maxlength="2000"
                    ></textarea>
                </label>

                <label>Editar foto: (enlace) 
                    <input type="url" name="pic-modificada">
                </label>

                <input type="submit" value="guardar">
            </form>
            <details>
                <summary id="eliminarFicha" class="hidden">Eliminar ficha</summary>
                <a href="" id="confirmar">Confirmar</a>
            </details>
        </section>
    </main>
    <footer>
        <a href="https://github.com/JusRecondo/proyecto_compositorxs" target="_blank">gitHub proyecto_compositorxs 2021</a>
    </footer>  
</body>
</html>