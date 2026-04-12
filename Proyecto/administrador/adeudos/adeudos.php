<?php

$aw_conn = new mysqli("localhost", "root", "5775", "biblioteca");
if ($aw_conn->connect_error) {
    echo '<p class="text-danger">Error BD: ' . $aw_conn->connect_error . '</p>';
    return;
}
$aw_conn->set_charset("utf8mb4");

// ── Métrica 1: usuarios con multas pendientes 
$res1 = $aw_conn->query("
    SELECT COUNT(DISTINCT p.idUsuario) AS total
    FROM Multa mu
    JOIN Prestamo p ON mu.idPrestamo = p.idPrestamo
    WHERE mu.pagada = 'no'
");
$aw_usuarios = $res1 ? (int)$res1->fetch_assoc()['total'] : 0;

// ── Métrica 2: tasa de incumplimiento 
$res2 = $aw_conn->query("
    SELECT
        SUM(CASE WHEN estado = 'vencido' THEN 1 ELSE 0 END) AS vencidos,
        COUNT(*) AS total
    FROM Prestamo
");
if ($res2) {
    $tmp = $res2->fetch_assoc();
    $aw_tasa = ($tmp['total'] > 0)
        ? round(($tmp['vencidos'] / $tmp['total']) * 100) . '%'
        : '0%';
} else {
    $aw_tasa = '0%';
}

// ── Métrica 3: suma de multas pendientes 
$res3 = $aw_conn->query("
    SELECT COALESCE(SUM(monto), 0) AS total
    FROM Multa
    WHERE pagada = 'no'
");
$aw_multas = $res3 ? '$' . number_format($res3->fetch_assoc()['total'], 2) : '$0.00';

// ── Tabla de adeudos 
$res4 = $aw_conn->query("
    SELECT
        mu.idMulta,
        u.nombre             AS usuario,
        u.correoInst         AS correo,
        tp.descripcion       AS tipo,
        mat.titulo           AS libro,
        p.fechaPrestamo,
        p.fechaDevolucion,
        mu.monto,
        mu.pagada
    FROM Multa mu
    JOIN Prestamo        p   ON mu.idPrestamo      = p.idPrestamo
    JOIN Usuario         u   ON p.idUsuario        = u.idUsuario
    JOIN Ejemplar        ej  ON p.idEjemplar       = ej.idEjemplar
    JOIN Material        mat ON ej.idMaterial      = mat.idMaterial
    JOIN RelTipoPersona  rtp ON u.idUsuario        = rtp.idUsuario
    JOIN TipoPersona     tp  ON rtp.idTipoPersona  = tp.idTipoPersona
    ORDER BY mu.pagada ASC, mu.monto DESC
");

$aw_filas = [];
if ($res4) {
    while ($fila = $res4->fetch_assoc()) {
        $aw_filas[] = $fila;
    }
}

$aw_conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="diseno.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="diseno_adeudos.css">

</head>
<body>
    
<!-- ── Tarjetas métricas ── -->
<div class="aw-metricas">

    <div class="aw-card">
        <div class="aw-icon rojo">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2zm0 12c-5.33 0-8 2.67-8 4v1h16v-1c0-1.33-2.67-4-8-4z"/>
            </svg>
        </div>
        <div>
            <div class="aw-card-label">Usuarios con adeudos</div>
            <div class="aw-card-valor"><?= $aw_usuarios ?></div>
        </div>
    </div>

    <div class="aw-card">
        <div class="aw-icon ambar">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
            </svg>
        </div>
        <div>
            <div class="aw-card-label">Tasa de incumplimiento</div>
            <div class="aw-card-valor"><?= $aw_tasa ?></div>
        </div>
    </div>

    <div class="aw-card">
        <div class="aw-icon verde">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
            </svg>
        </div>
        <div>
            <div class="aw-card-label">Multas totales pendientes</div>
            <div class="aw-card-valor"><?= $aw_multas ?></div>
        </div>
    </div>

</div>

<!-- ── Panel tabla ── -->
<div class="aw-panel">

    <div class="aw-panel-title">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="#4a7c2e">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 7V3.5L18.5 9H13zm-3 8H7v-2h3v2zm7 0h-5v-2h5v2zm0-4H7v-2h10v2z"/>
        </svg>
        Adeudos generales
    </div>

    <div class="aw-filtros">
        <div class="aw-sw">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M15.5 14h-.79l-.28-.27A6.5 6.5 0 1 0 14 15.5l.27.28v.79l5 5L20.49 19l-5-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
            <input type="text" id="aw_bus" placeholder="Buscar usuario" oninput="awFiltrar()">
        </div>
        <select class="aw-sel" id="aw_est" onchange="awFiltrar()">
            <option value="">Todos los estados</option>
            <option value="pendiente">Pendiente</option>
            <option value="pagado">Pagado</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="aw-table">
            <thead>
                <tr>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/></svg> #</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg> Usuario</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg> Correo</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg> Tipo</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg> Libro</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg> F. préstamo</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg> F. devolución</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg> Multa</th>
                    <th><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg> Estado</th>
                </tr>
            </thead>
            <tbody id="aw_tbody">
            <?php if (empty($aw_filas)): ?>
                <tr>
                    <td colspan="9" class="aw-empty">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="opacity:.3;display:block;margin:0 auto 6px;">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 7V3.5L18.5 9H13zm-5 8H6v-2h2v2zm8 0H8v-2h8v2zm0-4H6v-2h10v2z"/>
                        </svg>
                        No hay adeudos registrados.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($aw_filas as $i => $f):
                    $pagado     = $f['pagada'] === 'si';
                    $badgeCls   = $pagado ? 'pagado'    : 'pendiente';
                    $badgeTxt   = $pagado ? 'Pagado'    : 'Pendiente';
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($f['usuario']) ?></td>
                    <td style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"
                        title="<?= htmlspecialchars($f['correo']) ?>">
                        <?= htmlspecialchars($f['correo']) ?>
                    </td>
                    <td><?= htmlspecialchars($f['tipo']) ?></td>
                    <td><?= htmlspecialchars($f['libro']) ?></td>
                    <td><?= date('d/m/Y', strtotime($f['fechaPrestamo'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($f['fechaDevolucion'])) ?></td>
                    <td>$<?= number_format((float)$f['monto'], 2) ?></td>
                    <td><span class="aw-badge <?= $badgeCls ?>"><?= $badgeTxt ?></span></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
function awFiltrar() {
    const txt  = document.getElementById('aw_bus').value.toLowerCase();
    const est  = document.getElementById('aw_est').value.toLowerCase();
    document.querySelectorAll('#aw_tbody tr').forEach(function(tr) {
        var texto = tr.textContent.toLowerCase();
        var badge = (tr.querySelector('.aw-badge') || {}).textContent;
        badge = badge ? badge.trim().toLowerCase() : '';
        var okT = texto.includes(txt);
        var okE = !est || badge === est;
        tr.style.display = (okT && okE) ? '' : 'none';
    });
}
</script>
</body>
</html>
