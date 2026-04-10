<!-- MODAL - Agregar Préstamo -->
<div class="modal fade" id="modalAgregarPrestamo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-semibold">Agregar Préstamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="procesar_prestamo.php">

                    <fieldset class="border rounded p-3 mb-3">
                        <legend class="float-none w-auto px-2 fs-6 text-muted">Datos del Usuario</legend>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Número de Usuario <span class="text-danger">*</span>
                                </label>
                                <!-- Usuario: agrega onkeydown -->
                                <input type="text" id="inputIdUsuario" name="idUsuario"
                                    class="form-control" placeholder="RFC o No. Control"
                                    onblur="buscarUsuario()" onkeydown="if(event.key==='Enter'){event.preventDefault();buscarUsuario();}" required>

                                <small id="msgUsuario" class="text-danger d-none">Usuario no encontrado</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tipo de usuario</label>
                                <input type="text" id="inputTipoUsuario"
                                       class="form-control" placeholder="Se llena automáticamente" readonly>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nombre</label>
                                <input type="text" id="inputNombre"
                                       class="form-control" placeholder="Se llena automáticamente" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Correo</label>
                                <input type="text" id="inputCorreo"
                                       class="form-control" placeholder="Se llena automáticamente" readonly>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border rounded p-3 mb-3">
                        <legend class="float-none w-auto px-2 fs-6 text-muted">Datos del préstamo</legend>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Código del Ejemplar <span class="text-danger">*</span>
                                </label>
                                <!-- Ejemplar: agrega onkeydown -->
                                <input type="text" id="inputCodigo" name="codigoEjemplar"
                                    class="form-control" placeholder="Código del ejemplar"
                                    onblur="buscarEjemplar()"
                                    onkeydown="if(event.key==='Enter'){event.preventDefault();buscarEjemplar();}"
                                    required>
                                <small id="msgEjemplar" class="text-danger d-none">Ejemplar no disponible</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Título del libro</label>
                                <input type="text" id="inputTitulo"
                                       class="form-control" placeholder="Se llena automáticamente" readonly>
                            </div>
                        </div>
                        <input type="hidden" id="inputIdEjemplar" name="idEjemplar">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Fecha de préstamo</label>
                                <input type="date" name="fechaPrestamo" id="inputFechaPrestamo"
                                       class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Fecha de devolución <span class="text-danger">*</span>
                                </label>
                                <input type="date" name="fechaDevolucion" class="form-control" required>
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success px-4">Agregar Préstamo</button>
                        <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>