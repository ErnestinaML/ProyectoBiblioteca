<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="diseno.css">
</head>
<body>

<div class="wrapper">

    <!-- ══ SIDEBAR ══ -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo">
                <svg viewBox="0 -960 960 960" fill="currentColor" width="20" height="20">
                    <path d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h480q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640h-80v280l-100-60-100 60v-280H240v640Zm0 0v-640 640Zm200-360 100-60 100 60-100-60-100 60Z"/>
                </svg>
            </div>
            <span>SIBEM</span>
        </div>

        <nav class="sidebar-nav">
            <a href="home.php" class="nav-btn text-decoration-none">
                <svg fill="currentColor" viewBox="0 0 16 16" width="17" height="17">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>
                Inicio
            </a>

            <a href="#" class="nav-btn text-decoration-none">
                <svg fill="currentColor" viewBox="0 0 16 16" width="17" height="17">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/>
                </svg>
                Préstamos
            </a>

            <a href="#" class="nav-btn text-decoration-none">
                <svg fill="currentColor" viewBox="0 0 16 16" width="17" height="17">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                </svg>
                Usuarios
            </a>

            <a href="#" class="nav-btn text-decoration-none">
                <svg fill="currentColor" viewBox="0 0 16 16" width="17" height="17">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
                Estadísticas
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="d-flex align-items-center gap-2 p-2">
                <div class="avatar">A</div>
                <div>
                    <div class="user-name">Administrador</div>
                    <div class="user-role">Perfil</div>
                </div>
                <button class="logout-btn ms-auto" title="Cerrar sesión">
                    <svg fill="currentColor" viewBox="0 0 16 16" width="15" height="15">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                </button>
            </div>
        </div>
    </aside>

    <!-- ══ ÁREA PRINCIPAL ══ -->
    <main class="main-area">

        <div class="topbar">
            <img src="Logo.png" alt="Logo ITS" height="38">
            <span class="inst-name">Instituto Tecnológico Superior de Ciudad Constitución</span>
        </div>

        <div class="content-area">
            <div class="bg-white rounded p-4 shadow-sm">

                <h5 class="mb-4 fw-semibold">Agregar Libro</h5>

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
                        <a href="home.php" class="btn btn-danger px-4">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>