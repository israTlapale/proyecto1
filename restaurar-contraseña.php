<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRE</title>
    <link rel="preload" href="css/normalize.css" as="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link rel="preload" href="css/login.css" as="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="contenedor-logo">
            <img src="imagenes/logo.png" alt="Logo SIRE">
        </div>
    </header>
    <main>
        <section>
            <div class="formulario-contenedor">
                <div class="titulo-contenedor">
                    <h2><b>Restaurar contraseña</b></h2>
                </div>
                <form class="formulario" id="miFormulario">
                    <div class="titulo-campo">
                        <label for="usuario">Código de usuario</label>
                    </div>
                    <div class="contenedor-campo">
                        <span class="icono-contenedor">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 icono">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input class="dato" type="text" name="usuario" id="usuario" placeholder="Código de usuario">
                    </div>


                    <div class="iniciar-contenedor">
                        <input class="iniciar-sesion" type="submit" value="Confirmar">
                    </div>
                </form>
                <div class="restaurar-contraseña">
                    <a href="index.php">Cancelar</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="pie-pagina">
            <p>Fecha Mod.: 15/08/2023 Versión: 1.16.0 Ambiente: Production</p>
        </div>
    </footer>


    <script src="validacion.js"></script>
</body>

</html>