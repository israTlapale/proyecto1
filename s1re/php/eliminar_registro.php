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

// Verificar si se proporcionó un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_registro = $_GET['id'];

    // Consulta SQL para eliminar el registro por ID
    $eliminar_sql = "DELETE FROM sire_registros WHERE id = ?";
    $stmt = $conexion->prepare($eliminar_sql);
    $stmt->bind_param("i", $id_registro);

    if ($stmt->execute()) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de registro no válido.";
}



// Cerrar la conexión a la base de datos
$conexion->close();

// Imprimir el enlace para volver al panel de administrador
echo '<a href="../panel-admin.php">Volver al panel de administrador</a>';
