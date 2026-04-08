<?php
// Conexión a la base de datos (ajusta los datos cuando la conectes)
// $conn = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM - Préstamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../home/diseno.css">
    <link rel="stylesheet" href="diseno-prestamo.css">
</head>
<body>

<div class="wrapper">

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">
                <svg viewBox="0 -960 960 960" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h480q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640h-80v280l-100-60-100 60v-280H240v640Zm0 0v-640 640Zm200-360 100-60 100 60-100-60-100 60Z"/></svg>
            </div>
            <span>SIBEM</span>
        </div>

        <nav class="sidebar-nav">
            <button class="nav-btn" onclick="location.href='../home/inicio.php'">
                <svg fill="currentColor" viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/></svg>
                Inicio
            </button>
            <button class="nav-btn active" onclick="location.href='prestamos.php'">
                <svg fill="currentColor" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/></svg>
                Préstamos
            </button>
            <button class="nav-btn" onclick="location.href='../home/inicio.php'">
                <svg fill="currentColor" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg>
                Usuarios
            </button>
            <button class="nav-btn" onclick="location.href='../home/inicio.php'">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
                Estadísticas
            </button>
        </nav>

        <div class="sidebar-footer">
            <div class="user-row">
                <div class="avatar">A</div>
                <div>
                    <div class="user-name">Administrador</div>
                    <div class="user-role">Perfil</div>
                </div>
                <button class="logout-btn" title="Cerrar sesión">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                    </svg>
                </button>
            </div>
        </div>
    </aside>

    <main class="main-area">

        <div class="topbar">
            <img src="../img/Logo.png" alt="Logo ITSCC" height=50>
            <span class="inst-name">Instituto Tecnológico Superior de Ciudad Constitución</span>
        </div>

        <div class="content-area">

            <!-- Tarjetas resumen -->
            <div class="prestamo-cards">

                <div class="prestamo-card">
                    <div>
                        <div class="prestamo-card-label">Préstamos Activos</div>
                        <div class="prestamo-card-num">0</div>
                    </div>
                    <span class="prestamo-card-icon">🕐</span>
                </div>

                <div class="prestamo-card">
                    <div>
                        <div class="prestamo-card-label">Préstamos Vencidos</div>
                        <div class="prestamo-card-num">0</div>
                    </div>
                    <span class="prestamo-card-icon">⚠️</span>
                </div>

                <div class="prestamo-card">
                    <div>
                        <div class="prestamo-card-label">Por vencer</div>
                        <div class="prestamo-card-num">0</div>
                    </div>
                    <span class="prestamo-card-icon">📅</span>
                </div>

                <div class="prestamo-card-btn">
                    <button class="add-btn">+ Agregar Préstamo</button>
                </div>

                <script>
                function cargarFormulario() {
                    fetch('agregarPrestamo.php')
                        .then(res => res.text())
                        .then(html => {
                            document.getElementById('contenedorFormulario').innerHTML = html;
                        });
                }
                </script>

            </div>

            <!-- Tabla -->
            <div class="tabla-prestamos">
                <h5 class="fw-semibold mb-3">Préstamos Activos</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Título</th>
                                <th>Correo</th>
                                <th>Fecha de préstamo</th>
                                <th>Fecha de devolución</th>
                                <th>Estado</th>
                                <th>Tiempo restante</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Cuando conectes la BD, reemplaza esto con:
                            // $result = $conn->query("SELECT * FROM prestamos WHERE estado != 'devuelto'");
                            // while ($row = $result->fetch_assoc()) { ... }
                            ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No hay préstamos registrados
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>