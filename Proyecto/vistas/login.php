<?php
session_start();

// Incluir conexión a BD
require_once '../../bd/conexion.php';

// Recibir datos del formulario de login
$correo   = trim($_POST['email']    ?? '');
$password = $_POST['password'] ?? '';

// ---- 1. Verificar que el correo exista en la BD ----
$stmt = $connect->prepare("SELECT idUsuario, nombre, password, activo FROM Usuario WHERE correoInst = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado->num_rows === 0){
    // Correo no existe en el sistema
    header("Location: ../../login.php?error=1");
    exit();
}

$usuario = $resultado->fetch_assoc();

// ---- 2. Verificar si la cuenta está activa ----
if($usuario['activo'] === 'no'){
    header("Location: ../../login.php?error=4");
    exit();
}

// ---- 3. Verificar si ya tiene contraseña (si no, mandarlo a registrarse) ----
if(empty($usuario['password'])){
    header("Location: ../../registro_paso1.php?error=3");
    exit();
}

// ---- 4. Verificar la contraseña con password_verify ----
// password_verify compara la contraseña ingresada contra el hash guardado en BD
if(!password_verify($password, $usuario['password'])){
    // Contraseña incorrecta
    header("Location: ../../login.php?error=1");
    exit();
}

// ---- 5. Login exitoso — guardar datos en sesión ----
$_SESSION['idUsuario'] = $usuario['idUsuario'];
$_SESSION['nombre']    = $usuario['nombre'];
$_SESSION['correo']    = $correo;

// ---- 6. Obtener el tipo de persona para redirigir al panel correcto ----
$stmtTipo = $connect->prepare("
    SELECT tp.descripcion 
    FROM RelTipoPersona rtp
    JOIN TipoPersona tp ON rtp.idTipoPersona = tp.idTipoPersona
    WHERE rtp.idUsuario = ?
    LIMIT 1
");
$stmtTipo->bind_param("s", $usuario['idUsuario']);
$stmtTipo->execute();
$resTipo = $stmtTipo->get_result();
$tipo    = $resTipo->fetch_assoc();

$_SESSION['tipoUsuario'] = $tipo['descripcion'] ?? 'Alumno';

// Redirigir según tipo de usuario
switch($_SESSION['tipoUsuario']){
    case 'Docente':
        header("Location: ../../vistas/docente.php");
        break;
    case 'Administrativo':
        header("Location: ../../vistas/admin.php");
        break;
    default: // Alumno, Servicio Social, etc.
        header("Location: ../../vistas/alumno.php");
        break;
}
exit();
?>