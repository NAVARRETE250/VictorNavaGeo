<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Áreas</title>
    <link rel="stylesheet" href="geo.css">
    <script defer src="geo.js"></script>

</head>
<body>
    <header>
        <h1 style="color:black">CALCULAR ÁREAS</h1>

        <img src="img/icono.png" title="login" alt="Pulsa para hacer login" class="imagen-log" id="menu-toggle" style="margin-left: 10px;">
        
        <!-- Menú desplegable -->
        <div class="menusss" id="dropdown-menu" aria-expanded="false" aria-label="Menú de usuario">
            <?php if (isset($_SESSION['nom'])): ?>
                <p style="color: black;">Hola, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong>. ¡Bienvenido de nuevo!</p>
                <a href="geo.php">Bases</a>
                <a href="superficies.php">Perímetro</a>
                <a href="volumen.php">Volumen</a>
                <a href="logout.php" style="color:blue" ><u>Cerrar sesión</u></a>
            <?php else: ?>
                <a href="login.php">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </header>
    <main>

    <div class="container">
        <!-- Primera caja -->
        <section id="beneficios" class="content">
            <div class="benefit-box">
                <img class="benefit-image" src="img/pi.jpg" alt="Imagen del número PI">
                <div class="benefit-text">
                    <h3>¿Qué es π (PI)?</h3>
                    <p>El número PI (π) es una constante matemática que representa la relación entre la circunferencia de un círculo y su diámetro...</p>
                </div>
            </div>
        </section>

        <!-- Segunda caja -->
        <section id="beneficios" class="content">
            <div class="benefit-box">
                <div class="benefit-text">
                <h3>Conversor de Áreas</h3>

                <p>
    El <strong>área</strong> es una medida de la superficie que ocupa una figura geométrica en un plano bidimensional. Se mide en unidades cuadradas, como metros cuadrados (m²), centímetros cuadrados (cm²), etc. Por ejemplo:
</p>
<ul>
    <li>El área de un cuadrado se calcula multiplicando su lado por sí mismo: Área = lado × lado.</li>
    <li>El área de un círculo depende de su radio: Área = π × radio².</li>
</ul>
<p>
    Las unidades de área aumentan o disminuyen multiplicando o dividiendo por 100 al cambiar de una unidad a otra (por ejemplo, 1 m² = 10,000 cm²).
</p>
                <p>
                </div>
                </div>
                <div class="benefit-box">
                <div class="benefit-text">

    Aunque el <strong>área</strong>, el <strong>volumen</strong> y la <strong>superficie</strong> están relacionados, hay importantes diferencias:
</p>
<ul>
    <li><strong>Área:</strong> Mide la extensión superficial de una figura plana. Se expresa en unidades cuadradas (m², cm²).</li>
    <li><strong>Volumen:</strong> Mide el espacio ocupado por un objeto tridimensional. Se expresa en unidades cúbicas (m³, cm³).</li>
    <li><strong>Superficie:</strong> Mide la extensión externa de un objeto, ya sea plano o tridimensional. Se expresa en unidades cuadradas (m², cm²).</li>
</ul>

                </div>
                </div>
                <div class="benefit-box">
                <div class="benefit-text">

                
    En resumen:
</p>
<ul>
    <li>El área y la superficie comparten las mismas unidades (cuadradas), pero la superficie puede aplicarse también a objetos tridimensionales.</li>
    <li>El volumen, en cambio, mide el espacio interior y usa unidades cúbicas.</li>
</ul>
                    <div>
                        <input type="number" id="valor" placeholder="Ingresa un valor">
                        <select id="unidad-origen">
                    <option value="km">Kilómetros (km)</option>
                    <option value="hm">Hectómetros (hm)</option>
                    <option value="dam">Decámetros (dam)</option>
                    <option value="m">Metros (m)</option>
                    <option value="dm">Decímetros (dm)</option>
                    <option value="cm">Centímetros (cm)</option>
                    <option value="mm">Milímetros (mm)</option>
                </select>
                <span>→</span>
                <select id="unidad-destino">
                    <option value="km">Kilómetros (km)</option>
                    <option value="hm">Hectómetros (hm)</option>
                    <option value="dam">Decámetros (dam)</option>
                    <option value="m">Metros (m)</option>
                    <option value="dm">Decímetros (dm)</option>
                    <option value="cm">Centímetros (cm)</option>
                    <option value="mm">Milímetros (mm)</option>
            
                        </select>
                        <button onclick="convertirMedidas()">Convertir</button>
                    </div>
                    <p id="resultado-conversion"></p>
                </div>
                <img class="benefit-image" src="img/conversor.png" alt="Escala de Conversiones de Unidades de Longitud">
            </div>
        </section>

<!-- Elipse -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/elipsis.png" alt="Elipse">
        <div class="benefit-text">
            <h3>Elipse</h3>
            <p><strong>Área:</strong> $\pi \cdot a \cdot b$</p>
            <p><strong>Ejemplo:</strong> Si los semiejes son $a = 4 \, \text{cm}$ y $b = 3 \, \text{cm}$:</p>
            <ul>
                <li>Área: $\pi \cdot 4 \cdot 3 = 37.699 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="semieje-a-elipse">Semieje A (en cm):</label>
                <input type="number" id="semieje-a-elipse" placeholder="Ingresa el semieje A">
                <label for="semieje-b-elipse">Semieje B (en cm):</label>
                <input type="number" id="semieje-b-elipse" placeholder="Ingresa el semieje B">
                <button onclick="calcularAreaElipse()">Calcular Área</button>
            </div>
            <p id="resultado-elipse"></p>
        </div>
    </div>
</div>

<!-- Rombo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/rombo.png" alt="Rombo">
        <div class="benefit-text">
            <h3>Rombo</h3>
            <p><strong>Área:</strong> $\frac{1}{2} \cdot d_1 \cdot d_2$</p>
            <p><strong>Ejemplo:</strong> Si las diagonales son $d_1 = 5 \, \text{cm}$ y $d_2 = 3 \, \text{cm}$:</p>
            <ul>
                <li>Área: $\frac{1}{2} \cdot 5 \cdot 3 = 7.5 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="diagonal-1">Diagonal 1 (en cm):</label>
                <input type="number" id="diagonal-1" placeholder="Ingresa la diagonal 1">
                <label for="diagonal-2">Diagonal 2 (en cm):</label>
                <input type="number" id="diagonal-2" placeholder="Ingresa la diagonal 2">
                <button onclick="calcularAreaRombo()">Calcular Área</button>
            </div>
            <p id="resultado-rombo"></p>
        </div>
    </div>
    </div>

    <!-- Rectángulo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/rectangulo.png" alt="Rectángulo">
        <div class="benefit-text">
            <h3>Rectángulo</h3>
            <p><strong>Área:</strong> $\text{largo} \cdot \text{ancho}$</p>
            <p><strong>Ejemplo:</strong> Si el largo es $5 \, \text{cm}$ y el ancho es $3 \, \text{cm}$:</p>
            <ul>
                <li>Área: $5 \cdot 3 = 15 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="largo-rectangulo">Largo (en cm):</label>
                <input type="number" id="largo-rectangulo" placeholder="Ingresa el largo">
                <label for="ancho-rectangulo">Ancho (en cm):</label>
                <input type="number" id="ancho-rectangulo" placeholder="Ingresa el ancho">
                <button onclick="calcularAreaRectangulo()">Calcular Área</button>
            </div>
            <p id="resultado-rectangulo"></p>
        </div>
    </div>
    </div>

    <!-- Triángulo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/triangulo.png" alt="Triángulo">
        <div class="benefit-text">
            <h3>Triángulo</h3>
            <p><strong>Área:</strong> $\frac{1}{2} \cdot \text{base} \cdot \text{altura}$</p>
            <p><strong>Ejemplo:</strong> Si la base es $4 \, \text{cm}$ y la altura es $3 \, \text{cm}$:</p>
            <ul>
                <li>Área: $\frac{1}{2} \cdot 4 \cdot 3 = 6 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="base-triangulo">Base (en cm):</label>
                <input type="number" id="base-triangulo" placeholder="Ingresa la base">
                <label for="altura-triangulo">Altura (en cm):</label>
                <input type="number" id="altura-triangulo" placeholder="Ingresa la altura">
                <button onclick="calcularAreaTriangulo()">Calcular Área</button>
            </div>
            <p id="resultado-triangulo"></p>
        </div>
    </div>
    </div>

    <!-- Círculo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/circulo.png" alt="Círculo">
        <div class="benefit-text">
            <h3>Círculo</h3>
            <p><strong>Área:</strong> $\pi \cdot r^2$</p>
            <p><strong>Ejemplo:</strong> Si el radio es $3 \, \text{cm}$:</p>
            <ul>
                <li>Área: $\pi \cdot (3)^2 = 28.27 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="radio-circulo">Radio (en cm):</label>
                <input type="number" id="radio-circulo" placeholder="Ingresa el radio">
                <button onclick="calcularAreaCirculo()">Calcular Área</button>
            </div>
            <p id="resultado-circulo"></p>
        </div>
    </div>
    </div>

    <!-- Cuadrado -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/cuadrado.png" alt="Cuadrado">
        <div class="benefit-text">
            <h3>Cuadrado</h3>
            <p><strong>Área:</strong> $\text{lado}^2$</p>
            <p><strong>Ejemplo:</strong> Si el lado es $4 \, \text{cm}$:</p>
            <ul>
                <li>Área: $4^2 = 16 \, \text{cm}^2$</li>
            </ul>
            <div>
                <label for="lado-cuadrado">Lado (en cm):</label>
                <input type="number" id="lado-cuadrado" placeholder="Ingresa el lado">
                <button onclick="calcularAreaCuadrado()">Calcular Área</button>
            </div>
            <p id="resultado-cuadrado"></p>
        </div>
    </div>
</div>

    
</main>



 
    <footer>MÁS INFORMACIÓN EN CHATGPT</footer>
</body>
</html>