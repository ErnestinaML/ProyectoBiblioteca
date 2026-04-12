<?php
$error = $_GET['error'] ?? '';
if($error === '1'){
    echo '<div class="alert alert-danger text-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>Error: usuario o contraseña incorrectos.
          </div>';
}
if($error === '2'){
    echo '<div class="alert alert-warning text-center" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>Error: no iniciaste sesión.
          </div>';
}
if($error === '3'){
    echo '<div class="alert alert-warning text-center" role="alert">
            <i class="bi bi-shield-exclamation me-2"></i>Error: no tienes permisos para acceder a esta página.
          </div>';
}
if($error === '4'){
    echo '<div class="alert alert-warning text-center" role="alert">
            <i class="bi bi-person-x-fill me-2"></i>Tu cuenta está desactivada. Contacta al administrador.
          </div>';
}
$exito = $_GET["exito"] ?? "";
if($exito === "1"){
    echo "<div class='alert alert-success text-center' role='alert'>
            <i class='bi bi-check-circle-fill me-2'></i>¡Contraseña creada exitosamente! Ya puedes iniciar sesión.
          </div>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEM - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Proyecto/login/diseno_login.css">
</head>

<body class="d-flex align-items-center justify-content-center">

<main class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-9 col-xl-8">

            <!-- Wrapper con position relative para el canvas -->
            <div style="position:relative;" id="cardWrapper">

                <!-- Canvas de las 4 luces encima de todo -->
                <canvas id="lucesCanvas" style="position:absolute;top:0;left:0;pointer-events:none;z-index:200;border-radius:12px;"></canvas>

                <div class="card border-0 shadow-sm" id="loginCard">
                <div class="card-body p-4">
                    <div class="row align-items-center g-3">

                        <!-- COLUMNA IZQUIERDA: imagen de la computadora SIBEM -->
                        <div class="col-12 col-md-6">
                            <div class="panel-decorativo">
                                <!--
                                    ✅ Cambia la ruta por donde tengas el SVG o PNG.
                                    Si lo pusiste en la misma carpeta: src="login/computadora_sibem.svg"
                                -->
                                <img id="imgComputadora"
                                     src="../Proyecto/login/computadora_sibem.svg"
                                     alt="Sistema SIBEM en computadora">
                            </div>
                        </div>

                        <!-- COLUMNA DERECHA: formulario -->
                        <div class="col-12 col-md-6 px-md-4">

                            <!-- Cada elemento tiene clase reveal-item + data-step para el orden de aparición -->
                            <h4 class="text-center fw-bold mb-3 reveal-item" data-step="1">
                                Welcome back to SIBEM
                            </h4>

                            <div class="text-center mb-4 reveal-item" data-step="2">
                                <img src="administrador/img/Logo.png"
                                     alt="Logo ITS Ciudad Constitución"
                                     style="max-height: 80px;"
                                     onerror="this.style.display='none'">
                            </div>

                            <form action="../php/php_login/login.php" method="post">

                                <div class="mb-3 reveal-item" data-step="3">
                                    <div class="input-group">
                                        <input type="email"
                                               class="form-control input-sibem"
                                               id="email" name="email"
                                               placeholder="Email" required>
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope-fill text-secondary"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-2 reveal-item" data-step="4">
                                    <div class="input-group">
                                        <input type="password"
                                               class="form-control input-sibem"
                                               id="password" name="password"
                                               placeholder="Password" required>
                                        <button class="input-group-text border-0"
                                                type="button" id="togglePassword"
                                                style="cursor:pointer;">
                                            <i class="bi bi-eye-fill text-secondary" id="iconoOjo"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3 reveal-item" data-step="5">
                                    <a href="recuperar.php" class="link-olvido">¿Olvidó su contraseña?</a>
                                </div>

                                <div class="d-flex justify-content-end mb-3 reveal-item" data-step="6">
                                    <button type="submit" class="btn btn-login px-4">Login</button>
                                </div>

                                <div class="text-center reveal-item" data-step="7">
                                    <a href="vistas/registro_paso1.php"
                                       class="text-dark fw-semibold text-decoration-none">
                                        Registrarse
                                    </a>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- fin card -->
            </div><!-- fin cardWrapper -->

        </div>
    </div>
</main>

<script>
// ── Mostrar/ocultar contraseña (sin cambios) ──────────────────────────────
const togglePassword = document.getElementById('togglePassword');
const campoPassword  = document.getElementById('password');
const iconoOjo       = document.getElementById('iconoOjo');
togglePassword.addEventListener('click', function () {
    if (campoPassword.type === 'password') {
        campoPassword.type = 'text';
        iconoOjo.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        campoPassword.type = 'password';
        iconoOjo.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
});

// ══════════════════════════════════════════════════════════════════════════
// ANIMACIÓN: 4 luces girando → revelan componentes → aparece imagen
// ══════════════════════════════════════════════════════════════════════════
const canvas = document.getElementById('lucesCanvas');
const ctx    = canvas.getContext('2d');
const card   = document.getElementById('cardWrapper'); // mide el wrapper, no la card

let W, H, cx, cy, rx, ry;

function medirCard() {
    const r  = card.getBoundingClientRect();
    W  = canvas.width  = r.width;
    H  = canvas.height = r.height;
    canvas.style.width  = W + 'px';
    canvas.style.height = H + 'px';
    cx = W / 2;
    cy = H / 2;
    rx = W / 2 + 18;
    ry = H / 2 + 18;
}
medirCard();
window.addEventListener('resize', medirCard);

// Elementos a revelar ordenados por data-step
const items = Array.from(document.querySelectorAll('.reveal-item'))
                   .sort((a,b) => +a.dataset.step - +b.dataset.step);
const imgPC = document.getElementById('imgComputadora');

// 4 luces, cada una separada 90° (π/2)
const NUM_LUCES = 4;
const COLORES = [
    { r:80,  g:220, b:140 },   // verde claro
    { r:200, g:230, b:80  },   // amarillo-verde
    { r:60,  g:180, b:255 },   // azul claro
    { r:255, g:200, b:80  },   // dorado
];

// Velocidad angular (radianes por frame) — más pequeño = más lento
const VEL = 0.012;

// Cuántas vueltas completas hace antes de empezar a revelar
const VUELTAS_ANTES = 1.5;
const ANGULO_TOTAL_ANTES = VUELTAS_ANTES * Math.PI * 2;

// Ángulo acumulado
let angulo = 0;
let animando = true;

// Cuándo revelar cada item (en ángulo total recorrido)
// Los 7 items se revelan distribuidos durante la 2ª y 3ª vuelta
const ANGULO_INICIO_REVEAL = ANGULO_TOTAL_ANTES;
const ANGULO_FIN_REVEAL    = ANGULO_TOTAL_ANTES + Math.PI * 2 * 1.5;
const pasoReveal = (ANGULO_FIN_REVEAL - ANGULO_INICIO_REVEAL) / (items.length + 1);

let itemsRevelados = 0;
let imgMostrada    = false;
let fadeOutAlpha   = 1;    // para desvanecer el canvas al final
let fadeOutActivo  = false;

function posLuz(i, ang) {
    // Elipse alrededor de la card
    const a = ang + i * (Math.PI * 2 / NUM_LUCES);
    return {
        x: cx + rx * Math.cos(a),
        y: cy + ry * Math.sin(a)
    };
}

function dibujarLuz(x, y, color, alpha) {
    // Halo exterior
    const g1 = ctx.createRadialGradient(x, y, 0, x, y, 28);
    g1.addColorStop(0,   `rgba(${color.r},${color.g},${color.b},${alpha * 0.4})`);
    g1.addColorStop(0.5, `rgba(${color.r},${color.g},${color.b},${alpha * 0.15})`);
    g1.addColorStop(1,   'transparent');
    ctx.fillStyle = g1;
    ctx.beginPath(); ctx.arc(x, y, 28, 0, Math.PI*2); ctx.fill();

    // Núcleo brillante
    const g2 = ctx.createRadialGradient(x, y, 0, x, y, 8);
    g2.addColorStop(0, `rgba(255,255,255,${alpha * 0.95})`);
    g2.addColorStop(0.4, `rgba(${color.r},${color.g},${color.b},${alpha * 0.9})`);
    g2.addColorStop(1, 'transparent');
    ctx.fillStyle = g2;
    ctx.beginPath(); ctx.arc(x, y, 8, 0, Math.PI*2); ctx.fill();
}

function dibujarEstela(i, ang, alpha) {
    // Estela de cada luz (últimos 40° hacia atrás)
    const color = COLORES[i];
    const pasos = 30;
    for (let s = 0; s < pasos; s++) {
        const t   = s / pasos;
        const a   = ang + i * (Math.PI * 2 / NUM_LUCES) - t * 0.7;
        const pos = {
            x: cx + rx * Math.cos(a),
            y: cy + ry * Math.sin(a)
        };
        const fade = (1 - t) * 0.35 * alpha;
        ctx.fillStyle = `rgba(${color.r},${color.g},${color.b},${fade})`;
        ctx.beginPath();
        ctx.arc(pos.x, pos.y, 4 * (1-t*0.6), 0, Math.PI*2);
        ctx.fill();
    }
}

function loop() {
    if (!animando) return;

    ctx.clearRect(0, 0, W, H);

    if (!fadeOutActivo) {
        angulo += VEL;

        // Dibujar las 4 luces
        for (let i = 0; i < NUM_LUCES; i++) {
            dibujarEstela(i, angulo, 1);
            const p = posLuz(i, angulo);
            dibujarLuz(p.x, p.y, COLORES[i], 1);
        }

        // Revelar items según ángulo alcanzado
        if (angulo >= ANGULO_INICIO_REVEAL) {
            const avance = angulo - ANGULO_INICIO_REVEAL;
            const debeRevelar = Math.floor(avance / pasoReveal);
            while (itemsRevelados < debeRevelar && itemsRevelados < items.length) {
                items[itemsRevelados].classList.add('visible');
                itemsRevelados++;
            }
        }

        // Al terminar todas las vueltas → mostrar imagen y empezar fade out
        if (angulo >= ANGULO_FIN_REVEAL + Math.PI * 0.5 && !imgMostrada) {
            imgMostrada = true;
            // Revelar todos por si alguno quedó
            items.forEach(el => el.classList.add('visible'));
            imgPC.classList.add('visible');
            fadeOutActivo = true;
        }

    } else {
        // Desvanecer el canvas de luces suavemente
        fadeOutAlpha -= 0.018;
        if (fadeOutAlpha <= 0) {
            ctx.clearRect(0, 0, W, H);
            animando = false;
            return;
        }
        for (let i = 0; i < NUM_LUCES; i++) {
            dibujarEstela(i, angulo, fadeOutAlpha);
            const p = posLuz(i, angulo);
            dibujarLuz(p.x, p.y, COLORES[i], fadeOutAlpha);
        }
        angulo += VEL * 0.5; // sigue girando más lento mientras se desvanece
    }

    requestAnimationFrame(loop);
}

// Arrancar
window.addEventListener('load', () => {
    medirCard();
    requestAnimationFrame(loop);
});
</script>

</body>
</html>