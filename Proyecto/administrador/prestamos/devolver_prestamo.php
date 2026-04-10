<?php
$conn = new mysqli("localhost", "root", "5775", "biblioteca");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idPrestamo = trim($_POST['idPrestamo'] ?? '');

if (!$idPrestamo) {
    header("Location: prestamos.php?error=campos_vacios");
    exit;
}

// Obtener el idEjemplar del préstamo
$stmt = $conn->prepare("SELECT idEjemplar FROM Prestamo WHERE idPrestamo = ?");
$stmt->bind_param("i", $idPrestamo);
$stmt->execute();
$prestamo = $stmt->get_result()->fetch_assoc();

if (!$prestamo) {
    header("Location: prestamos.php?error=no_encontrado");
    exit;
}

$idEjemplar = $prestamo['idEjemplar'];

// Marcar préstamo como devuelto
$upd1 = $conn->prepare("UPDATE Prestamo SET estado = 'devuelto' WHERE idPrestamo = ?");
$upd1->bind_param("i", $idPrestamo);
$upd1->execute();

// Marcar ejemplar como disponible
$upd2 = $conn->prepare("UPDATE Ejemplar SET estado = 'disponible' WHERE idEjemplar = ?");
$upd2->bind_param("i", $idEjemplar);
$upd2->execute();

$conn->close();
header("Location: prestamos.php?exito=1");
exit;