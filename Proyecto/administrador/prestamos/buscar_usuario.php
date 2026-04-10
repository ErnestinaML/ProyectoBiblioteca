<?php
$conn = new mysqli("localhost", "root", "5775", "biblioteca");

$id = $_GET['id'] ?? '';
if ($id === '') { echo json_encode(['error' => 'ID vacío']); exit; }

$stmt = $conn->prepare("
    SELECT 
        u.nombre, 
        u.correoInst, 
        tp.descripcion  AS tipoPersona,
        rp.diasPrestamo AS diasPrestamo
    FROM Usuario u
    LEFT JOIN RelTipoPersona rtp ON u.idUsuario      = rtp.idUsuario
    LEFT JOIN TipoPersona tp     ON rtp.idTipoPersona = tp.idTipoPersona
    LEFT JOIN ReglasPrestamo rp  ON rtp.idTipoPersona = rp.idTipoPersona
    WHERE u.idUsuario = ?
    LIMIT 1
");
$stmt->bind_param("s", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    echo json_encode([
        'encontrado'   => true,
        'nombre'       => $row['nombre'],
        'correo'       => $row['correoInst'],
        'tipoPersona'  => $row['tipoPersona']  ?? 'Sin tipo asignado',
        'diasPrestamo' => $row['diasPrestamo'] ?? 0
    ]);
} else {
    echo json_encode(['encontrado' => false]);
}

$conn->close();
?>