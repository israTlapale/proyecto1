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

// Obtener el ID del registro de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_registro = $_GET['id'];

    // Consulta SQL para obtener los detalles del registro por ID
    $sql = "SELECT * FROM sire_registros WHERE id = $id_registro";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        // Mostrar los detalles del registro
        $fila = $resultado->fetch_assoc();
        echo "<h1>Detalles del Registro</h1>";
        echo "Nombre: " . $fila['nombre'] . "<br>";
        echo "CUR: " . $fila['cur'] . "<br>";
        echo "Fecha de Admisión: " . $fila['fecha_admision'] . "<br>";
        echo "Área de Recepción: " . $fila['area_recepcion'] . "<br>";
        echo "Área de Registro: " . $fila['area_registro'] . "<br>";
    } else {
        echo "No se encontró el registro especificado.";
    }
} else {
    echo "ID de registro no válido.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
