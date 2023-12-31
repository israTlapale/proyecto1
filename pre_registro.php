<?php
// Conexión a la base de datos (ya deberías tener esto configurado)
$host = '194.195.84.154';
$usuario = 'u918700630_isra';
$contrasena = 'Itg4817862';
$base_de_datos = 'u918700630_sire';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
// Obtener el ID del registro de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_registro = $_GET['id'];

    // Consulta SQL para obtener los detalles del registro por ID
    $sql = "SELECT * FROM sire_registros WHERE id = $id_registro";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        // Obtener los detalles del registro
        $fila = $resultado->fetch_assoc();
        $cur_actual = $fila['cur']; // Guardar el valor del CUR en una variable
    } else {
        echo "No se encontró el registro especificado.";
    }
} else {
    echo "ID de registro no válido.";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRE</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link href="css/normalize.css" rel="stylesheet">
    <link rel="preload" href="css/registros.css" as="style">
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
                    <p class="texto-notificacion">La constancia de trámite con <b>CUR <?php echo $cur_actual; ?></b> es válida</p>
                </div>
                <div class="contenedor-titulo-datos"></div>

                <div class="contenedordatos">
                    <?php


                    if ($conexion->connect_error) {
                        die("Error de conexión a la base de datos: " . $conexion->connect_error);
                    }

                    // Obtener el ID del registro de la URL
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id_registro = $_GET['id'];

                        // Consulta SQL para obtener los detalles del registro por ID
                        $sql = "SELECT * FROM sire_registros WHERE id = $id_registro";
                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows == 1) {
                            // Mostrar los detalles del registro
                            $fila = $resultado->fetch_assoc();

                            echo "<h2>Datos de la constancia</h2><hr>";
                            echo "<div class='detalle-item'><h3>Nombre: </h3></div><div class='respuesta-item'>" . $fila['nombre'] . "</div>";
                            echo "<div class='detalle-item'><h3>CUR: </h3></div><div class='respuesta-item'>" . $fila['cur'] . "</div>";
                            echo "<div class='detalle-item'><h3>Fecha de Admisión: </h3></div><div class='respuesta-item'>" . $fila['fecha_admision'] . "</div>";
                            echo "<div class='detalle-item'><h3>Área de Recepción: </h3></div><div class='respuesta-item'>" . $fila['area_recepcion'] . "</div>";
                            echo "<div class='detalle-item'><h3>Área de Registro: </h3></div><div class='respuesta-item'>" . $fila['area_registro'] . "</div>";
                        } else {
                            echo "No se encontró el registro especificado.";
                        }
                    } else {
                        echo "ID de registro no válido.";
                    }

                    // Cerrar la conexión a la base de datos
                    $conexion->close();
                    ?>
                </div>
                <hr>
                <div class="idioma">
                    <p class="idioma-texto">Idioma:*</p>
                    <select name="" id="Idioma">
                        <option value="español">Español</option>
                    </select>
                </div>
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