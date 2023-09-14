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
    <link href="css/panel-admin.css" rel="stylesheet">
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
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>CUR</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                        while ($fila = $resultado->fetch_assoc()) {
                            $id_registro = $fila['id']; // Suponiendo que haya una columna 'id' en tu tabla
                            echo "<tr>";
                            echo "<td>{$fila['nombre']}</td>";
                            echo "<td>{$fila['cur']}</td>";
                            echo "<td>
                <a href='pre_registro.php?id=$id_registro' class='boton verde'>Vista-Usuario</a> -
                <a href='editar_registro.php?id=$id_registro'class='boton amarillo'>Editar</a> -
                <a href='php/eliminar_registro.php?id=$id_registro' class='boton rojo'>Eliminar</a>
                <br></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se encontraron registros en la tabla.";
                    }

                    // Cerrar la conexión a la base de datos
                    $conexion->close();
                    ?>

                </tbody>
            </table>


        </section>
    </main>

    <footer>
        <div class="pie-pagina">
            <p>Versión: 1.15.1 b-ad400293 Ambiente: Production</p>
        </div>
    </footer>



</body>

</html>