<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRE</title>
    <link rel="preload" href="css/normalize.css" as="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link rel="preload" href="css/registros.css" as="stylesheet">
    <link href="css/registros.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="contenedor-logo">
            <img src="imagenes/logo.png" alt="Logo SIRE">
        </div>
    </header>

    <main>
        <section>
            <div class="contenedor">
                <div class="notificacion">
                    <p class="texto-notificacion">La constancia de trámite con CUR 328447 es válida</p>
                </div>
                <hr>
                <a href="panel-admin.php">Regresar.</a>
                <form action="php/insertar.php" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required><br><br>

                    <label for="cur">CUR:</label>
                    <input type="text" name="cur" id="cur" required><br><br>

                    <label for="fecha_admision">Fecha de admisión:</label>
                    <input type="date" name="fecha_admision" id="fecha_admision" required><br><br>

                    <label for="area_recepcion">Área de recepción:</label>
                    <input type="text" name="area_recepcion" id="area_recepcion" required><br><br>

                    <label for="area_registro">Área de registro:</label>
                    <input type="text" name="area_registro" id="area_registro" required><br><br>

                    <input type="submit" value="Registrar">
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>Ingrese los datos del nuevo registro.</p>
    </footer>
</body>

</html>