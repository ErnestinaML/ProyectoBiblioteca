<?php
$conn = new mysqli("localhost", "root", "5775", "biblioteca");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar que llegaron los campos obligatorios
$idUsuario      = trim($_POST['idUsuario']      ?? '');
$idEjemplar     = trim($_POST['idEjemplar']     ?? '');
$fechaPrestamo  = trim($_POST['fechaPrestamo']  ?? '');
$fechaDevolucion= trim($_POST['fechaDevolucion']?? '');

if (!$idUsuario || !$idEjemplar || !$fechaPrestamo || !$fechaDevolucion) {
    header("Location: prestamos.php?error=campos_vacios");
    exit;
}

// Verificar que el ejemplar sigue disponible
$check = $conn->prepare("SELECT estado FROM Ejemplar WHERE idEjemplar = ?");
$check->bind_param("i", $idEjemplar);
$check->execute();
$ejemplar = $check->get_result()->fetch_assoc();

if (!$ejemplar || $ejemplar['estado'] !== 'disponible') {
    header("Location: prestamos.php?error=no_disponible");
    exit;
}

// Obtener correo del usuario
$uq = $conn->prepare("SELECT correoInst FROM Usuario WHERE idUsuario = ?");
$uq->bind_param("s", $idUsuario);
$uq->execute();
$usuario = $uq->get_result()->fetch_assoc();
$correoInst = $usuario['correoInst'] ?? '';

// Insertar el préstamo
$stmt = $conn->prepare("
    INSERT INTO Prestamo (idUsuario, correoInst, idEjemplar, fechaPrestamo, fechaDevolucion, estado)
    VALUES (?, ?, ?, ?, ?, 'activo')
");
$stmt->bind_param("ssiss", $idUsuario, $correoInst, $idEjemplar, $fechaPrestamo, $fechaDevolucion);

if (!$stmt->execute()) {
    header("Location: prestamos.php?error=insert_fallido");
    exit;
}

// Marcar el ejemplar como prestado
$upd = $conn->prepare("UPDATE Ejemplar SET estado = 'prestado' WHERE idEjemplar = ?");
$upd->bind_param("i", $idEjemplar);
$upd->execute();

$conn->close();
header("Location: prestamos.php?exito=1");
exit;