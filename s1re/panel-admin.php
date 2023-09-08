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
            <a href="nuevo-registro.php">Crear Registro.</a>
            <div><?php
                    // Conexión a la base de datos (ya deberías tener esto configurado)
                    $host = '194.195.84.154';
                    $usuario = 'u918700630_isra';
                    $contrasena = 'Itg4817862';
                    $base_de_datos = 'u918700630_sire';

                    $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

                    if ($conexion->connect_error) {
                        die("Error de conexión a la base de datos: " . $conexion->connect_error);
                    }

                    // Consulta SQL para seleccionar todos los registros de la tabla
                    $sql = "SELECT * FROM sire_registros";
                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        echo "<ul>";
                        while ($fila = $resultado->fetch_assoc()) {
                            $id_registro = $fila['id']; // Suponiendo que haya una columna 'id' en tu tabla
                            echo "<li>Nombre: {$fila['nombre']} - CUR: {$fila['cur']} - <a href='ver_registro.php?id=$id_registro'>Ver Detalles</a> - <a href='editar_registro.php?id=$id_registro'>Editar</a> - <a href='php/eliminar_registro.php?id=$id_registro'>Eliminar</a>

                            </li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "No se encontraron registros en la tabla.";
                    }

                    // Cerrar la conexión a la base de datos
                    $conexion->close();
                    ?>

            </div>


        </section>
    </main>

    <footer>
        <div class="pie-pagina">
            <p>Versión: 1.15.1 b-ad400293 Ambiente: Production</p>
        </div>
    </footer>



</body>

</html>