<?php
require_once 'conexion.php';

$objeto_conexion = new conexion();
$conexion = $objeto_conexion->getConexion();
$sql_select = "SELECT * FROM persona WHERE estado = 1";
$resultado = $conexion->query($sql_select);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conexion->error);
}

$personas = array();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div style='margin-bottom: 15px;'>";
        echo "<strong>ID:</strong> " . $fila['id'] . "<br>";
        echo "<strong>Nombre:</strong> " . $fila['nombres'] . "<br>";
        echo "<strong>Apellidos:</strong> " . $fila['apellidos'] . "<br>";
        echo "<strong>DNI:</strong> " . $fila['dni'] . "<br>";
        echo "<strong>Teléfono:</strong> " . $fila['telefono'] . "<br>";
        echo "<strong>Correo:</strong> " . $fila['correo'] . "<br>";
        echo "<strong>Estado:</strong> " . $fila['estado'] . "<br>";
        echo "<strong>Fecha de creación:</strong> " . $fila['fechecreacion'] . "<br>";
        echo "<hr>";
        echo "</div>";

        $personas[] = $fila;
    }
} else {
    echo "<p>No se encontraron registros.</p>";
}

//INSERTAR S
$sql_insert = "INSERT INTO persona (nombres, apellidos, dni, telefono, correo, estado, fechecreacion) 
VALUES ('Jose', 'Perez', '12345678', '987654321', 'joseperez@gmail.com', 1, NOW())";

if ($conexion->query($sql_insert) === TRUE) {
    echo "<p =>Nuevo registro creado exitosamente. ID: " . $conexion->insert_id . "</p>";
} else {
    echo "<p='>Error al insertar: " . $conexion->error . "</p>";
}

// ACTUALIZAR 
$sql_update = "UPDATE persona SET nombres = 'Juan', apellidos = 'Lopez' WHERE id = 1";
if ($conexion->query($sql_update) === TRUE) {
    echo "<p>Registro actualizado exitosamente.</p>";
} else {
    echo "<p>Error al actualizar: " . $conexion->error . "</p>";
}

//  ELIMINAR
$sql_delete = "DELETE FROM persona WHERE id = 1";
if ($conexion->query($sql_delete) === TRUE) {
    echo "<p'>Registro eliminado exitosamente.</p>";
} else {
    echo "<p '>Error al eliminar: " . $conexion->error . "</p>";
}
