<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="diseno.css">
</head>
<body>

<div class="wrapper">

    <aside class="sidebar">

        <!-- Logo -->
        <div class="sidebar-logo">
            <div class="logo-icon">
                <!-- Ícono de libro -->
                 <svg viewBox="0 -960 960 960" fill="#currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h480q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640h-80v280l-100-60-100 60v-280H240v640Zm0 0v-640 640Zm200-360 100-60 100 60-100-60-100 60Z"/></svg>       
            </div>
            <span>SIBEM</span>
        </div>

        <!-- Botones de navegación -->
        <nav class="sidebar-nav">

            <!-- active = página actual resaltada -->
            <button class="nav-btn active">
                <svg fill="currentColor"viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/></svg>    
                    
                Inicio
            </button>

            <button class="nav-btn">
                <svg fill="currentColor" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/></svg>          
                Préstamos
            </button>

            <button class="nav-btn">
                <svg fill="currentColor" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg>
                Usuarios
            </button>

            <button class="nav-btn">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
                Estadísticas
            </button>

        </nav>

        <!-- Usuario al fondo del sidebar -->
        <div class="sidebar-footer">
            <div class="user-row">
                <div class="avatar">A</div>
                <div>
                    <div class="user-name">Administrador</div>
                    <div class="user-role">Perfil</div>
                </div>
                <!-- Botón de cerrar sesión -->
                <button class="logout-btn" title="Cerrar sesión">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                    </svg>
                </button>
            </div>
        </div>

    </aside>

    <!-- ÁREA PRINCIPAL - Derecha -->
    <main class="main-area">

        <!-- Barra superior con logo del instituto -->
        <div class="topbar">
            <img src="../img/Logo.png" alt="Logo ITSCC" height=50>
            <span class="inst-name">Instituto Tecnológico Superior de Ciudad Constitución</span>
        </div>

        <!-- Contenido principal -->
        <div class="content-area">

            <!-- ── Buscador y filtros ── -->
            <div class="toolbar">

                <div class="search-box">
                    <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    <input type="text" placeholder="Buscar libro..." id="buscador">
                </div>

                <select class="filter-select" id="filtroCategoria">
                    <option value="">Todas las categorías</option>
                    <option value="ingenieria">Ingeniería</option>
                    <option value="ciencias">Ciencias</option>
                    <option value="matematicas">Matemáticas</option>
                </select>

                <select class="filter-select" id="filtroEstado">
                    <option value="">Todos los estados</option>
                    <option value="disponible">Disponible</option>
                    <option value="prestado">Prestado</option>
                    <option value="prestado">Reserva</option>
                </select>

                <button class="add-btn" onclick="document.getElementById('formAgregar').classList.toggle('d-none')">
                    + Agregar libro
                </button>
            </div>

            <!-- ── Formulario oculto (d-none) ── -->
            <!-- Empieza oculto, el botón de arriba lo muestra -->
            <div id="formAgregar" class="d-none bg-white rounded p-4 shadow-sm mb-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">Agregar Libro</h5>
                    <!-- Botón X cierra el formulario -->
                    <button type="button" class="btn-close"
                            onclick="document.getElementById('formAgregar').classList.add('d-none')">
                    </button>
                </div>

                <form>
                    <!-- FILA 1 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Título del libro">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Autor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Autor del libro">
                        </div>
                    </div>

                    <!-- FILA 2 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Año de publicación <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Año de publicación">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Editorial <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Editorial del libro">
                        </div>
                    </div>

                    <!-- FILA 3 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">ISBN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="ISBN del libro">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Edición <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Número de edición">
                        </div>
                    </div>

                    <!-- FILA 4 -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ejemplares <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Número de ejemplares">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Categoría <span class="text-danger">*</span></label>
                            <select class="form-select">
                                <option value="">Seleccione la categoría</option>
                                <option value="ingenieria">Ingeniería</option>
                                <option value="ciencias">Ciencias</option>
                                <option value="matematicas">Matemáticas</option>
                            </select>
                        </div>
                    </div>

                    <!-- BOTONES -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success px-4">Agregar Libro</button>
                        <button type="button" class="btn btn-danger px-4"
                                onclick="document.getElementById('formAgregar').classList.add('d-none')">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
            <!-- fin formAgregar -->

        </div>
    </main>

</div>        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>