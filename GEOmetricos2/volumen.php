<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Volumenes</title>
    <link rel="stylesheet" href="geo.css">
    <script defer src="geo.js"></script>

</head>
<body>
    <header>
        <h1 style="color:black">CALCULAR VOLUMENES</h1>

        <img src="img/icono.png" title="login" alt="Pulsa para hacer login" class="imagen-log" id="menu-toggle" style="margin-left: 10px;">
        
        <!-- Menú desplegable -->
        <div class="menusss" id="dropdown-menu" aria-expanded="false" aria-label="Menú de usuario">
            <?php if (isset($_SESSION['nom'])): ?>
                <p style="color: black;">Hola, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong>. ¡Bienvenido de nuevo!</p>
                <a href="geo.php">Bases</a>
                <a href="area.php">area</a>
                <a href="superficies.php">superficie</a>
                <a href="logout.php" style="color:blue" ><u>Cerrar sesión</u></a>
            <?php else: ?>
                <a href="login.php">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </header>
    

    
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
                <h3>Conversor de Volúmenes</h3>
                <p>El <strong>volumen</strong> es una medida del espacio que ocupa un objeto tridimensional. Se mide en unidades cúbicas, como metros cúbicos (m³), centímetros cúbicos (cm³), etc. Por ejemplo:</p>
                <ul>
                    <li>El volumen de un cubo se calcula multiplicando su lado tres veces: Volumen = lado × lado × lado.</li>
                    <li>El volumen de una esfera depende de su radio: Volumen = (4/3) × π × radio³.</li>
                </ul>
                <p>
                    Las unidades de volumen aumentan o disminuyen multiplicando o dividiendo por 1,000 al cambiar de una unidad a otra (por ejemplo, 1 m³ = 1,000,000 cm³).
                </p></p>
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
                    <input type="number" id="valor-volumen" placeholder="Ingresa un valor">
                    <select id="unidad-origen-volumen">
                        <option value="km3">Kilómetros³ (km³)</option>
                        <option value="hm3">Hectómetros³ (hm³)</option>
                        <option value="dam3">Decámetros³ (dam³)</option>
                        <option value="m3">Metros³ (m³)</option>
                        <option value="dm3">Decímetros³ (dm³)</option>
                        <option value="cm3">Centímetros³ (cm³)</option>
                        <option value="mm3">Milímetros³ (mm³)</option>
                    </select>
                    <span>→</span>
                    <select id="unidad-destino-volumen">
                        <option value="km3">Kilómetros³ (km³)</option>
                        <option value="hm3">Hectómetros³ (hm³)</option>
                        <option value="dam3">Decámetros³ (dam³)</option>
                        <option value="m3">Metros³ (m³)</option>
                        <option value="dm3">Decímetros³ (dm³)</option>
                        <option value="cm3">Centímetros³ (cm³)</option>
                        <option value="mm3">Milímetros³ (mm³)</option>
                    </select>
                    <button onclick="convertirMedidasVolumen()">Convertir</button>
                </div>
                <p id="resultado-conversion-volumen"></p>
            </div>
            <img class="benefit-image" src="img/conversor3.png" alt="Escala de Conversiones de Unidades de Volumen">
                        </div>
                        <div class="benefit-box">
    <img class="benefit-image" src="img/cubo.png" alt="Imagen del número PI">
    <div class="benefit-text">
        <h3>Volumen de un Cubo</h3>
        <p>
            El <strong>volumen</strong> de un cubo mide el espacio que ocupa en tres dimensiones. Se calcula elevando el lado al cubo:
            <br>
            Volumen = lado × lado × lado.
        </p>
        <p><strong>Ejemplo:</strong> Si el lado es 4 cm, el volumen es 64 cm³.</p>
        <div>
            <label for="lado-volumen">Lado (en cm):</label>
            <input type="number" id="lado-volumen" placeholder="Ingresa el lado">
            <button onclick="calcularVolumen()">Calcular Volumen</button>
        </div>
        <p id="resultado-volumen"></p>
        <div class="imagen-contenedor">
            <!-- Espacio para tu imagen -->
        </div>
    </div>
</div>

<div class="benefit-box">
    <img class="benefit-image" src="img/esfera.png" alt="Esfera">
    <div class="benefit-text">
        <h3>Esfera (Círculo en 3D)</h3>
        <p><strong>Volumen:</strong> 4/3 π r³</p>
        <p><strong>Ejemplo:</strong> Si el radio es 3 cm:</p>
        <ul>
            <li>Volumen: 4/3 π (3)³ = 113.1 cm³</li>
        </ul>
        <div>
            <label for="radio-esfera">Radio (en cm):</label>
            <input type="number" id="radio-esfera" placeholder="Ingresa el radio">
            <button onclick="calcularVolumenEsfera()">Calcular Volumen</button>
        </div>
        <p id="resultado-esfera"></p>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/cilindro.png" alt="Cilindro">
        <div class="benefit-text">
            <h3>Cilindro (Círculo en 3D)</h3>
            <p><strong>Volumen:</strong> π r² h</p>
            <p><strong>Ejemplo:</strong> Si el radio es 2 cm y la altura es 5 cm:</p>
            <ul>
                <li>Volumen: π (2)² (5) = 62.83 cm³</li>
            </ul>
            <div>
                <label for="radio-cilindro">Radio (en cm):</label>
                <input type="number" id="radio-cilindro" placeholder="Ingresa el radio">
                <label for="altura-cilindro">Altura (en cm):</label>
                <input type="number" id="altura-cilindro" placeholder="Ingresa la altura">
                <button onclick="calcularVolumenCilindro()">Calcular Volumen</button>
            </div>
            <p id="resultado-cilindro"></p>
        </div>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/cono.png" alt="Cono">
        <div class="benefit-text">
            <h3>Cono (Círculo en 3D)</h3>
            <p><strong>Volumen:</strong> 1/3 π r² h</p>
            <p><strong>Ejemplo:</strong> Si el radio es 3 cm y la altura es 7 cm:</p>
            <ul>
                <li>Volumen: 1/3 π (3)² (7) = 65.97 cm³</li>
            </ul>
            <div>
                <label for="radio-cono">Radio (en cm):</label>
                <input type="number" id="radio-cono" placeholder="Ingresa el radio">
                <label for="altura-cono">Altura (en cm):</label>
                <input type="number" id="altura-cono" placeholder="Ingresa la altura">
                <button onclick="calcularVolumenCono()">Calcular Volumen</button>
            </div>
            <p id="resultado-cono"></p>
        </div>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/rectangulo3d.png" alt="Prisma Rectangular">
        <div class="benefit-text">
            <h3>Prisma Rectangular (Rectángulo en 3D)</h3>
            <p><strong>Volumen:</strong> a × b × h</p>
            <p><strong>Ejemplo:</strong> Si los lados son 2 cm, 3 cm y la altura es 4 cm:</p>
            <ul>
                <li>Volumen: 2 × 3 × 4 = 24 cm³</li>
            </ul>
            <div>
                <label for="lado-a-prisma">Lado A (en cm):</label>
                <input type="number" id="lado-a-prisma" placeholder="Ingresa el lado A">
                <label for="lado-b-prisma">Lado B (en cm):</label>
                <input type="number" id="lado-b-prisma" placeholder="Ingresa el lado B">
                <label for="altura-prisma">Altura (en cm):</label>
                <input type="number" id="altura-prisma" placeholder="Ingresa la altura">
                <button onclick="calcularVolumenPrismaRectangular()">Calcular Volumen</button>
            </div>
            <p id="resultado-prisma-rectangular"></p>
        </div>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/piramide.png" alt="Prisma Triangular">
        <div class="benefit-text">
            <h3>Prisma Triangular (Triángulo en 3D)</h3>
            <p><strong>Volumen:</strong> Área de la base × Altura del prisma</p>
            <p><strong>Área de la base (triángulo):</strong> 1/2 × base × altura</p>
            <p><strong>Ejemplo:</strong> Si la base del triángulo es 4 cm, su altura es 3 cm y la altura del prisma es 10 cm:</p>
            <ul>
                <li>Área de la base: 1/2 × 4 × 3 = 6 cm²</li>
                <li>Volumen: 6 × 10 = 60 cm³</li>
            </ul>
            <div>
                <label for="base-triangulo">Base del triángulo (en cm):</label>
                <input type="number" id="base-triangulo" placeholder="Ingresa la base">
                <label for="altura-triangulo">Altura del triángulo (en cm):</label>
                <input type="number" id="altura-triangulo" placeholder="Ingresa la altura">
                <label for="altura-prisma">Altura del prisma (en cm):</label>
                <input type="number" id="altura-prisma" placeholder="Ingresa la altura del prisma">
                <button onclick="calcularVolumenPrismaTriangular()">Calcular Volumen</button>
            </div>
            <p id="resultado-prisma-triangular"></p>
        </div>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/ovalo3d.png" alt="Elipsoide">
        <div class="benefit-text">
            <h3>Elipsoide (Óvalo en 3D)</h3>
            <p><strong>Volumen:</strong> 4/3 π a b c</p>
            <p><strong>Ejemplo:</strong> Si los semiejes son 2 cm, 3 cm y 4 cm:</p>
            <ul>
                <li>Volumen: 4/3 π (2)(3)(4) = 100.53 cm³</li>
            </ul>
            <div>
                <label for="semieje-a-elipsoide">Semieje A (en cm):</label>
                <input type="number" id="semieje-a-elipsoide" placeholder="Ingresa el semieje A">
                <label for="semieje-b-elipsoide">Semieje B (en cm):</label>
                <input type="number" id="semieje-b-elipsoide" placeholder="Ingresa el semieje B">
                <label for="semieje-c-elipsoide">Semieje C (en cm):</label>
                <input type="number" id="semieje-c-elipsoide" placeholder="Ingresa el semieje C">
                <button onclick="calcularVolumenElipsoide()">Calcular Volumen</button>
            </div>
            <p id="resultado-elipsoide"></p>
        </div>
    </div>
</div>

<div class="beneficios content">
    <div class="benefit-box">
        <img class="benefit-image" src="img/pentagono3d.png" alt="Prisma Pentagonal">
        <div class="benefit-text">
            <h3>Prisma Pentagonal (Pentágono en 3D)</h3>
            <p><strong>Volumen:</strong> Área de la base × Altura del prisma</p>
            <p><strong>Área de la base (pentágono):</strong> 5/2 × lado × apotema</p>
            <p><strong>Ejemplo:</strong> Si el lado del pentágono es 4 cm, su apotema es 2.75 cm y la altura del prisma es 10 cm:</p>
            <ul>
                <li>Área de la base: 5/2 × 4 × 2.75 = 27.5 cm²</li>
                <li>Volumen: 27.5 × 10 = 275 cm³</li>
            </ul>
            <div>
                <label for="lado-pentagono">Lado del pentágono (en cm):</label>
                <input type="number" id="lado-pentagono" placeholder="Ingresa el lado">
                <label for="apotema-pentagono">Apotema del pentágono (en cm):</label>
                <input type="number" id="apotema-pentagono" placeholder="Ingresa el apotema">
                <label for="altura-prisma-pentagonal">Altura del prisma (en cm):</label>
                <input type="number" id="altura-prisma-pentagonal" placeholder="Ingresa la altura del prisma">
                <button onclick="calcularVolumenPrismaPentagonal()">Calcular Volumen</button>
            </div>
            <p id="resultado-prisma-pentagonal"></p>
        </div>
    </div>
</div>

    </section>
</div>
</main>
 
    <footer>MÁS INFORMACIÓN EN CHATGPT</footer>
</body>
</html>