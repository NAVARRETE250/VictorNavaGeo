<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de superficies</title>
    <link rel="stylesheet" href="geo.css">
    <script defer src="geo.js"></script>

</head>
<body>
    <header>

        <img src="img/icono.png" title="login" alt="Pulsa para hacer login" class="imagen-log" id="menu-toggle" style="margin-left: 10px;">
        
        <!-- Menú desplegable -->
        <div class="menusss" id="dropdown-menu" aria-expanded="false" aria-label="Menú de usuario">
            <?php if (isset($_SESSION['nom'])): ?>
                <p style="color: black;">Hola, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong>. ¡Bienvenido de nuevo!</p>
                <a href="geo.php">Bases</a>
                <a href="area.php">area</a>
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
       <!-- Sección para conversión de áreas -->
<section id="beneficios" class="content">
    <div class="benefit-box">
        <div class="benefit-text">
            <h3>Conversor de Superficies</h3>
            <p>
    La <strong>superficie</strong> es una medida de la extensión externa de un objeto. En geometría, se puede referir tanto a figuras planas (como el área de un círculo) como a objetos tridimensionales (como la superficie total de un cubo o una esfera). Se mide en unidades cuadradas, como metros cuadrados (m²), centímetros cuadrados (cm²), etc.
</p>
<ul>
    <li>La superficie de un objeto plano se calcula igual que su área. Por ejemplo, la superficie de un cuadrado es lado × lado.</li>
    <li>La superficie de un objeto tridimensional incluye todas sus caras. Por ejemplo, la superficie de un cubo es 6 × (lado × lado).</li>
    <li>Para una esfera, la superficie se calcula como 4 × π × radio².</li>
</ul>
<p>
    Las unidades de superficie son las mismas que las de área, ya que ambas miden extensiones bidimensionales.
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

<p>
    En resumen:
</p>
<ul>
    <li>El área y la superficie comparten las mismas unidades (cuadradas), pero la superficie puede aplicarse también a objetos tridimensionales.</li>
    <li>El volumen, en cambio, mide el espacio interior y usa unidades cúbicas.</li>
</ul>
            <div>
                <input type="number" id="valor-area" placeholder="Ingresa un valor">
                <select id="unidad-origen-area">
                    <option value="km2">Kilómetros² (km²)</option>
                    <option value="hm2">Hectómetros² (hm²)</option>
                    <option value="dam2">Decámetros² (dam²)</option>
                    <option value="m2">Metros² (m²)</option>
                    <option value="dm2">Decímetros² (dm²)</option>
                    <option value="cm2">Centímetros² (cm²)</option>
                    <option value="mm2">Milímetros² (mm²)</option>
                </select>
                <span>→</span>
                <select id="unidad-destino-area">
                    <option value="km2">Kilómetros² (km²)</option>
                    <option value="hm2">Hectómetros² (hm²)</option>
                    <option value="dam2">Decámetros² (dam²)</option>
                    <option value="m2">Metros² (m²)</option>
                    <option value="dm2">Decímetros² (dm²)</option>
                    <option value="cm2">Centímetros² (cm²)</option>
                    <option value="mm2">Milímetros² (mm²)</option>
                </select>
                <button onclick="convertirMedidasArea()">Convertir</button>
            </div>
            <p id="resultado-conversion-area"></p>
        </div>
        <img class="benefit-image" src="img/conversor2.jpg" alt="Escala de Conversiones de Unidades de Área">
    </div>

<!-- Cuadrado -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/cuadrado.png" alt="Cuadrado">
        <div class="benefit-text">
            <h3>Cuadrado</h3>
            <p><strong>Perímetro:</strong> $4 \cdot \text{lado}$</p>
            <p><strong>Ejemplo:</strong> Si el lado es $5 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $4 \cdot 5 = 20 \, \text{cm}$</li>
            </ul>
            <div>
                <label for="lado-cuadrado">Lado (en cm):</label>
                <input type="number" id="lado-cuadrado" placeholder="Ingresa el lado">
                <button onclick="calcularPerimetroCuadrado()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-cuadrado"></p>
        </div>
    </div>
</div>

<!-- Rectángulo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/rectangulo.png" alt="Rectángulo">
        <div class="benefit-text">
            <h3>Rectángulo</h3>
            <p><strong>Perímetro:</strong> $2 \cdot (\text{largo} + \text{ancho})$</p>
            <p><strong>Ejemplo:</strong> Si el largo es $6 \, \text{cm}$ y el ancho es $4 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $2 \cdot (6 + 4) = 20 \, \text{cm}$</li>
            </ul>
            <div>
                <label for="largo-rectangulo">Largo (en cm):</label>
                <input type="number" id="largo-rectangulo" placeholder="Ingresa el largo">
                <label for="ancho-rectangulo">Ancho (en cm):</label>
                <input type="number" id="ancho-rectangulo" placeholder="Ingresa el ancho">
                <button onclick="calcularPerimetroRectangulo()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-rectangulo"></p>
        </div>
    </div>
</div>

<!-- Triángulo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/triangulo.png" alt="Triángulo">
        <div class="benefit-text">
            <h3>Triángulo</h3>
            <p><strong>Perímetro:</strong> $\text{lado}_1 + \text{lado}_2 + \text{lado}_3$</p>
            <p><strong>Ejemplo:</strong> Si los lados son $3 \, \text{cm}$, $4 \, \text{cm}$ y $5 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $3 + 4 + 5 = 12 \, \text{cm}$</li>
            </ul>
            <div>
                <label for="lado1-triangulo">Lado 1 (en cm):</label>
                <input type="number" id="lado1-triangulo" placeholder="Ingresa el lado 1">
                <label for="lado2-triangulo">Lado 2 (en cm):</label>
                <input type="number" id="lado2-triangulo" placeholder="Ingresa el lado 2">
                <label for="lado3-triangulo">Lado 3 (en cm):</label>
                <input type="number" id="lado3-triangulo" placeholder="Ingresa el lado 3">
                <button onclick="calcularPerimetroTriangulo()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-triangulo"></p>
        </div>
    </div>
</div>

<!-- Círculo -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/circulo.png" alt="Círculo">
        <div class="benefit-text">
            <h3>Círculo</h3>
            <p><strong>Perímetro (circunferencia):</strong> $2 \cdot \pi \cdot r$</p>
            <p><strong>Ejemplo:</strong> Si el radio es $3 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $2 \cdot \pi \cdot 3 = 18.85 \, \text{cm}$</li>
            </ul>
            <div>
                <label for="radio-circulo">Radio (en cm):</label>
                <input type="number" id="radio-circulo" placeholder="Ingresa el radio">
                <button onclick="calcularPerimetroCirculo()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-circulo"></p>
        </div>
    </div>
</div>

<!-- Elipse -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/elipsis.png" alt="Elipse">
        <div class="benefit-text">
            <h3>Elipse</h3>
            <p><strong>Perímetro (aproximado):</strong> $\pi \cdot \left( 3(a + b) - \sqrt{(3a + b)(a + 3b)} \right)$</p>
            <p><strong>Ejemplo:</strong> Si los semiejes son $a = 4 \, \text{cm}$ y $b = 3 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $37.699 \, \text{cm}$ (aproximado)</li>
            </ul>
            <div>
                <label for="semieje-a-elipse">Semieje A (en cm):</label>
                <input type="number" id="semieje-a-elipse" placeholder="Ingresa el semieje A">
                <label for="semieje-b-elipse">Semieje B (en cm):</label>
                <input type="number" id="semieje-b-elipse" placeholder="Ingresa el semieje B">
                <button onclick="calcularPerimetroElipse()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-elipse"></p>
        </div>
    </div>
</div>

<!-- Pentágono Regular -->
<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/pentagono.png" alt="Pentágono Regular">
        <div class="benefit-text">
            <h3>Pentágono Regular</h3>
            <p><strong>Perímetro:</strong> $5 \cdot \text{lado}$</p>
            <p><strong>Ejemplo:</strong> Si el lado es $4 \, \text{cm}$:</p>
            <ul>
                <li>Perímetro: $5 \cdot 4 = 20 \, \text{cm}$</li>
            </ul>
            <div>
                <label for="lado-pentagono">Lado (en cm):</label>
                <input type="number" id="lado-pentagono" placeholder="Ingresa el lado">
                <button onclick="calcularPerimetroPentagono()">Calcular Perímetro</button>
            </div>
            <p id="resultado-perimetro-pentagono"></p>
        </div>
    </div>
</div>















</div>

    </div>
</main>
 
    <footer>MÁS INFORMACIÓN EN CHATGPT</footer>
</body>
</html>