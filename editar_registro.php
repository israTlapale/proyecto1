<?php
// Verificar si se proporcionó un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_registro = $_GET['id'];
} else {
    echo "ID de registro no válido.";
    exit; // Detener la ejecución si el ID no es válido
}

$enlace_ver_registro = "http://www.pilotosiree.com/sire/pre_registro.php?id=$id_registro";
// Conexión a la base de datos (ya deberías tener esto configurado)
$host = '194.195.84.154';
$usuario = 'u918700630_isra';
$contrasena = 'Itg4817862';
$base_de_datos = 'u918700630_sire';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Verificar si se proporcionó un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_registro = $_GET['id'];

    // Consulta SQL para obtener los detalles del registro por ID
    $sql = "SELECT * FROM sire_registros WHERE id = $id_registro";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();

        // Procesar el formulario de edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_nuevo = $_POST['nombre'];
            $cur_nuevo = $_POST['cur'];
            $fecha_admision_nueva = $_POST['fecha_admision'];
            $area_recepcion_nueva = $_POST['area_recepcion'];
            $area_registro_nueva = $_POST['area_registro'];

            // Consulta SQL para actualizar el registro
            $actualizar_sql = "UPDATE sire_registros SET nombre = ?, cur = ?, fecha_admision = ?, area_recepcion = ?, area_registro = ? WHERE id = ?";
            $stmt = $conexion->prepare($actualizar_sql);
            $stmt->bind_param("sssssi", $nombre_nuevo, $cur_nuevo, $fecha_admision_nueva, $area_recepcion_nueva, $area_registro_nueva, $id_registro);

            if ($stmt->execute()) {
                echo "Registro actualizado exitosamente.";
            } else {
                echo "Error al actualizar el registro: " . $stmt->error;
            }
        }

        // Mostrar el formulario de edición con los detalles del registro
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
                            <p class="texto-notificacion">La constancia de trámite con CUR "<?php echo $fila['cur']; ?>" es válida</p>

                        </div>
                        <div class="contenedor-titulo-datos"></div>
                        <hr>
                        <div class="contenedor-datos">

                            <h1>Editar Registro</h1>
                            <form method="post">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br><br>

                                <label for="cur">CUR:</label>
                                <input type="text" name="cur" value="<?php echo $fila['cur']; ?>" required><br><br>

                                <label for="fecha_admision">Fecha de admisión:</label>
                                <input type="date" name="fecha_admision" value="<?php echo $fila['fecha_admision']; ?>" required><br><br>

                                <label for="area_recepcion">Área de recepción:</label>
                                <input type="text" name="area_recepcion" value="<?php echo $fila['area_recepcion']; ?>" required><br><br>

                                <label for="area_registro">Área de registro:</label>
                                <input type="text" name="area_registro" value="<?php echo $fila['area_registro']; ?>" required><br><br>

                                <input type="submit" value="Guardar Cambios">
                            </form>
                    <?php
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
                            <h2>Código QR para ver el registro:</h2>
                            <img class="qr" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($enlace_ver_registro); ?>" alt="Código QR">

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