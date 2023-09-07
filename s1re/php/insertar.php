<?php
// Conexión a la base de datos
$host = '194.195.84.154';
$usuario = 'u918700630_isra';
$contrasena = 'Itg4817862';
$base_de_datos = 'u918700630_sire';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$cur = $_POST['cur'];
$fecha_admision = $_POST['fecha_admision'];
$area_recepcion = $_POST['area_recepcion'];
$area_registro = $_POST['area_registro'];

// Preparar la consulta SQL
$sql = "INSERT INTO sire_registros (nombre, cur, fecha_admision, area_recepcion, area_registro) VALUES (?, ?, ?, ?, ?)";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("sssss", $nombre, $cur, $fecha_admision, $area_recepcion, $area_registro);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
        echo '<a href="../panel-admin.php">Ir a pagina Pincipal</a>';
        echo '<a href="../nuevo-registro.php">Crear Registro</a>';
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
