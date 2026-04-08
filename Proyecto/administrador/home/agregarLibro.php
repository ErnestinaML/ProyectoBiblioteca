<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM - Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="add-libro-diseno.css">
</head>
<body>

<div id="formAgregar" class="bg-white rounded p-4 shadow-sm mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-semibold mb-0">Agregar Libro</h5>
        <button type="button" class="btn-close" onclick="cerrarFormulario()"></button>
    </div>

    <form method="POST" action="procesar_libro.php">
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
                <input type="text" name="titulo" class="form-control" placeholder="Título del libro" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Autor <span class="text-danger">*</span></label>
                <input type="text" name="autor" class="form-control" placeholder="Autor del libro" required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Año de publicación <span class="text-danger">*</span></label>
                <input type="number" name="anio" class="form-control" placeholder="Año de publicación" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Editorial <span class="text-danger">*</span></label>
                <input type="text" name="editorial" class="form-control" placeholder="Editorial del libro" required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">ISBN <span class="text-danger">*</span></label>
                <input type="text" name="isbn" class="form-control" placeholder="ISBN del libro" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Edición <span class="text-danger">*</span></label>
                <input type="text" name="edicion" class="form-control" placeholder="Número de edición" required>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Ejemplares <span class="text-danger">*</span></label>
                <input type="number" name="ejemplares" class="form-control" placeholder="Número de ejemplares" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Categoría <span class="text-danger">*</span></label>
                <select name="categoria" class="form-select" required>
                    <option value="">Seleccione la categoría</option>
                    <option value="ingenieria">Ingeniería</option>
                    <option value="ciencias">Ciencias</option>
                    <option value="matematicas">Matemáticas</option>
                </select>
            </div>
        </div>
        
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-success px-4">Agregar Libro</button>
            <button type="button" class="btn btn-danger px-4" onclick="cerrarFormulario()">Cancelar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
function cerrarFormulario() {
    window.location.href = 'inicio.php';
}
</script>

</body>
</html>