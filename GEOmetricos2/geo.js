const formasGeometricas = [
    {
        "id": 1,
        "nombre": "Cuadrado",
        "perimetro": "4 * lado",
        "area": "lado * lado",
        "volumen": "lado³ (como cubo)",
        "image": "img/cuadrado.png"
    },
    {
        "id": 2,
        "nombre": "Círculo",
        "perimetro": "2 * π * radio",
        "area": "π * radio²",
        "volumen": "(4/3) * π * radio³ (como esfera)",
        "image": "img/circulo.png"
    },
    {
        "id": 3,
        "nombre": "Triángulo",
        "perimetro": "lado1 + lado2 + lado3",
        "area": "(base * altura) / 2",
        "volumen": "Área * profundidad (como prisma triangular)",
        "image": "img/triangulo.png"
    },
    {
        "id": 4,
        "nombre": "Rectángulo",
        "perimetro": "2 * (largo + ancho)",
        "area": "largo * ancho",
        "volumen": "largo * ancho * altura (como prisma rectangular)",
        "image": "img/rectangulo.png"
    },
    {
        "id": 5,
        "nombre": "Rombo",
        "perimetro": "4 * lado",
        "area": "(diagonal_mayor * diagonal_menor) / 2",
        "volumen": "Área * grosor (como loseta romboidal)",
        "image": "img/rombo.png"
    },
    {
        "id": 6,
        "nombre": "Óvalo",
        "perimetro": "Aproximación compleja",
        "area": "π * semieje_mayor * semieje_menor",
        "volumen": "Área * altura (como pastilla ovalada)",
        "image": "img/ovalo.png   "
    },
    {
        "id": 7,
        "nombre": "Triángulo Rectángulo",
        "perimetro": "lado1 + lado2 + hipotenusa",
        "area": "(base * altura) / 2",
        "volumen": "Área * longitud (como escuadra 3D)",
        "image": "img/triangulo.png"
    },

    {
        "id": 11,
        "nombre": "Hexágono",
        "perimetro": "6 * lado",
        "area": "(3 * √3 * lado²) / 2 (regular)",
        "volumen": "Área * altura (como prisma hexagonal)",
        "image": "img/hexagono.png"
    },
    {
        "id": 12,
        "nombre": "Pentágono",
        "perimetro": "5 * lado",
        "area": "(5 * lado²) / (4 * tan(π/5)) (regular)",
        "volumen": "Área * altura (como prisma pentagonal)",
        "image": "img/pentagono.png"
    },
];

// Elementos del DOM
const tarjetasDiv = document.getElementById('tarjetas');
const detallesDiv = document.getElementById('detalles');
const figuraNom = document.getElementById('figuraNom');
const figuraImage = document.getElementById('figuraImage');
const perimetro = document.getElementById('perimetro');
const area = document.getElementById('area');
const volumen = document.getElementById('volumen');

// Función para renderizar las figuras
function renderFiguras(filtradas = formasGeometricas) {
    console.log("renderFiguras() se está ejecutando"); // Mensaje de depuración
    if (!tarjetasDiv) {
        console.error("El elemento 'tarjetas' no existe en el DOM");
        return;
    }

    tarjetasDiv.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevas tarjetas
    filtradas.forEach(figura => {
        const card = document.createElement('div');
        card.classList.add('figura-card');
        card.innerHTML = `
            <img src="${figura.image}" alt="${figura.nombre}">
            <h3>${figura.nombre}</h3>
            <p>ID: ${figura.id}</p>`;
        card.addEventListener('click', () => {
            figuraNom.textContent = figura.nombre;
            figuraImage.src = figura.image;
            perimetro.textContent = `Perímetro: ${figura.perimetro}`;
            area.textContent = `Área: ${figura.area}`;
            volumen.textContent = `Volumen: ${figura.volumen}`;
            detallesDiv.style.display = 'block'; // Mostrar los detalles
        });
        tarjetasDiv.appendChild(card);
    });
}

// Llamar a la función directamente
renderFiguras();
// Código del menú desplegable
let botonMenu = document.querySelector(".imagen-log");
let menu = document.querySelector(".menusss");

if (botonMenu && menu) {
    // Mostrar el menú temporalmente al cargar la página
    window.onload = function () {
        menu.style.display = "block"; // Mostrar el menú
        setTimeout(() => {
            menu.style.display = "none"; // Ocultar el menú después de 2 segundos
        }, 2000);
    };

    // Mostrar/ocultar el menú al pasar el ratón
    function mostrarMenu() {
        menu.style.display = "block";
    }

    function ocultarMenu() {
        menu.style.display = "none";
    }

    botonMenu.addEventListener("mouseenter", mostrarMenu);
    menu.addEventListener("mouseenter", mostrarMenu);

    botonMenu.addEventListener("mouseleave", ocultarMenu);
    menu.addEventListener("mouseleave", ocultarMenu);

    // Alternar el menú al hacer clic en el botón
    botonMenu.addEventListener("click", function (event) {
        if (menu.style.display === "block") {
            ocultarMenu();
        } else {
            mostrarMenu();
        }
        event.stopPropagation();
    });

    // Cerrar el menú al hacer clic fuera de él
    document.addEventListener("click", function () {
        ocultarMenu();
    });

    // Evitar que el menú se cierre al hacer clic dentro de él
    menu.addEventListener("click", function (event) {
        event.stopPropagation();
    });
} else {
    console.error("El botón del menú o el menú no existen en el DOM");
}

// Función para convertir medidas
// Función para convertir medidas


function convertirMedidas() {
    // Obtener los valores del formulario
    const valor = parseFloat(document.getElementById('valor').value);
    const unidadOrigen = document.getElementById('unidad-origen').value;
    const unidadDestino = document.getElementById('unidad-destino').value;

    // Validar que el valor sea un número
    if (isNaN(valor)) {
        document.getElementById('resultado-conversion').textContent = "Por favor, ingresa un valor válido.";
        return;
    }

    // Tabla de conversión
    const unidades = {
        km: 1,
        hm: 10,
        dam: 100,
        m: 1000,
        dm: 10000,
        cm: 100000,
        mm: 1000000,
    };

    // Convertir el valor a metros como referencia
    const valorEnMetros = valor * unidades[unidadOrigen];

    // Convertir los metros a la unidad destino
    const resultado = valorEnMetros / unidades[unidadDestino];

    // Mostrar el resultado
    document.getElementById('resultado-conversion').textContent = `Resultado: ${resultado} ${unidadDestino}`;
}

// Conversor de Áreas
function convertirMedidasArea() {
    const valor = parseFloat(document.getElementById('valor-area').value);
    const unidadOrigen = document.getElementById('unidad-origen-area').value;
    const unidadDestino = document.getElementById('unidad-destino-area').value;

    if (isNaN(valor)) {
        document.getElementById('resultado-conversion-area').textContent = "Por favor, ingresa un valor válido.";
        return;
    }

    // Tabla de conversión para áreas
    const unidadesArea = {
        km2: 1,
        hm2: 100,
        dam2: 10000,
        m2: 1000000,
        dm2: 100000000,
        cm2: 10000000000,
        mm2: 1000000000000,
    };

    // Convertir el valor a metros cuadrados como referencia
    const valorEnMetrosCuadrados = valor * unidadesArea[unidadOrigen];

    // Convertir los metros cuadrados a la unidad destino
    const resultado = valorEnMetrosCuadrados / unidadesArea[unidadDestino];

    // Mostrar el resultado
    document.getElementById('resultado-conversion-area').textContent = `Resultado: ${resultado} ${unidadDestino}`;
}

// Conversor de Volúmenes
function convertirMedidasVolumen() {
    const valor = parseFloat(document.getElementById('valor-volumen').value);
    const unidadOrigen = document.getElementById('unidad-origen-volumen').value;
    const unidadDestino = document.getElementById('unidad-destino-volumen').value;

    if (isNaN(valor)) {
        document.getElementById('resultado-conversion-volumen').textContent = "Por favor, ingresa un valor válido.";
        return;
    }

    // Tabla de conversión para volúmenes
    const unidadesVolumen = {
        km3: 1,
        hm3: 1000,
        dam3: 1000000,
        m3: 1000000000,
        dm3: 1000000000000,
        cm3: 1000000000000000,
        mm3: 1000000000000000000,
    };

    // Convertir el valor a metros cúbicos como referencia
    const valorEnMetrosCubicos = valor * unidadesVolumen[unidadOrigen];

    // Convertir los metros cúbicos a la unidad destino
    const resultado = valorEnMetrosCubicos / unidadesVolumen[unidadDestino];

    // Mostrar el resultado
    document.getElementById('resultado-conversion-volumen').textContent = `Resultado: ${resultado} ${unidadDestino}`;
}


function calcularArea() {
    const lado = parseFloat(document.getElementById('lado-area').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-area').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const area = lado * lado;
    document.getElementById('resultado-area').textContent = `Área: ${area} cm²`;
}

function calcularSuperficie() {
    const lado = parseFloat(document.getElementById('lado-superficie').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-superficie').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const superficie = lado * lado;
    document.getElementById('resultado-superficie').textContent = `Superficie: ${superficie} cm²`;
}
function calcularVolumen() {
    const lado = parseFloat(document.getElementById('lado-volumen').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-volumen').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const volumen = lado * lado * lado;
    document.getElementById('resultado-volumen').textContent = `Volumen: ${volumen} cm³`;
}

//////////////////////////////////////////////////////////////////////////
//////          FORMULAS DEL VOLUMEN///////////////////////////////////

// Función para calcular el volumen de un cubo
function calcularVolumen() {
    const lado = parseFloat(document.getElementById('lado-volumen').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-volumen').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const volumen = Math.pow(lado, 3);
    document.getElementById('resultado-volumen').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de una esfera
function calcularVolumenEsfera() {
    const radio = parseFloat(document.getElementById('radio-esfera').value);
    if (isNaN(radio) || radio <= 0) {
        document.getElementById('resultado-esfera').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const volumen = (4 / 3) * Math.PI * Math.pow(radio, 3);
    document.getElementById('resultado-esfera').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un cilindro
function calcularVolumenCilindro() {
    const radio = parseFloat(document.getElementById('radio-cilindro').value);
    const altura = parseFloat(document.getElementById('altura-cilindro').value);
    if (isNaN(radio) || isNaN(altura) || radio <= 0 || altura <= 0) {
        document.getElementById('resultado-cilindro').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const volumen = Math.PI * Math.pow(radio, 2) * altura;
    document.getElementById('resultado-cilindro').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un cono
function calcularVolumenCono() {
    const radio = parseFloat(document.getElementById('radio-cono').value);
    const altura = parseFloat(document.getElementById('altura-cono').value);
    if (isNaN(radio) || isNaN(altura) || radio <= 0 || altura <= 0) {
        document.getElementById('resultado-cono').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const volumen = (1 / 3) * Math.PI * Math.pow(radio, 2) * altura;
    document.getElementById('resultado-cono').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un prisma rectangular
function calcularVolumenPrismaRectangular() {
    const ladoA = parseFloat(document.getElementById('lado-a-prisma').value);
    const ladoB = parseFloat(document.getElementById('lado-b-prisma').value);
    const altura = parseFloat(document.getElementById('altura-prisma').value);
    if (isNaN(ladoA) || isNaN(ladoB) || isNaN(altura) || ladoA <= 0 || ladoB <= 0 || altura <= 0) {
        document.getElementById('resultado-prisma-rectangular').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const volumen = ladoA * ladoB * altura;
    document.getElementById('resultado-prisma-rectangular').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un prisma triangular
function calcularVolumenPrismaTriangular() {
    const base = parseFloat(document.getElementById('base-triangulo').value);
    const alturaTriangulo = parseFloat(document.getElementById('altura-triangulo').value);
    const alturaPrisma = parseFloat(document.getElementById('altura-prisma').value);
    if (isNaN(base) || isNaN(alturaTriangulo) || isNaN(alturaPrisma) || base <= 0 || alturaTriangulo <= 0 || alturaPrisma <= 0) {
        document.getElementById('resultado-prisma-triangular').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const areaBase = (1 / 2) * base * alturaTriangulo;
    const volumen = areaBase * alturaPrisma;
    document.getElementById('resultado-prisma-triangular').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un elipsoide
function calcularVolumenElipsoide() {
    const semiejeA = parseFloat(document.getElementById('semieje-a-elipsoide').value);
    const semiejeB = parseFloat(document.getElementById('semieje-b-elipsoide').value);
    const semiejeC = parseFloat(document.getElementById('semieje-c-elipsoide').value);
    if (isNaN(semiejeA) || isNaN(semiejeB) || isNaN(semiejeC) || semiejeA <= 0 || semiejeB <= 0 || semiejeC <= 0) {
        document.getElementById('resultado-elipsoide').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const volumen = (4 / 3) * Math.PI * semiejeA * semiejeB * semiejeC;
    document.getElementById('resultado-elipsoide').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}

// Función para calcular el volumen de un prisma pentagonal
function calcularVolumenPrismaPentagonal() {
    const lado = parseFloat(document.getElementById('lado-pentagono').value);
    const apotema = parseFloat(document.getElementById('apotema-pentagono').value);
    const alturaPrisma = parseFloat(document.getElementById('altura-prisma-pentagonal').value);
    if (isNaN(lado) || isNaN(apotema) || isNaN(alturaPrisma) || lado <= 0 || apotema <= 0 || alturaPrisma <= 0) {
        document.getElementById('resultado-prisma-pentagonal').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const areaBase = (5 / 2) * lado * apotema;
    const volumen = areaBase * alturaPrisma;
    document.getElementById('resultado-prisma-pentagonal').textContent = `Volumen: ${volumen.toFixed(2)} cm³`;
}



//////////////////////////////////////////////////////////////////////////
//////          FORMULAS DEL AREA      ///////////////////////////////////


// Función para calcular el área de una elipse
function calcularAreaElipse() {
    const semiejeA = parseFloat(document.getElementById('semieje-a-elipse').value);
    const semiejeB = parseFloat(document.getElementById('semieje-b-elipse').value);
    if (isNaN(semiejeA) || isNaN(semiejeB) || semiejeA <= 0 || semiejeB <= 0) {
        document.getElementById('resultado-elipse').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const area = Math.PI * semiejeA * semiejeB;
    document.getElementById('resultado-elipse').textContent = `Área: ${area.toFixed(2)} cm²`;
}

// Función para calcular el área de un rombo
function calcularAreaRombo() {
    const diagonal1 = parseFloat(document.getElementById('diagonal-1').value);
    const diagonal2 = parseFloat(document.getElementById('diagonal-2').value);
    if (isNaN(diagonal1) || isNaN(diagonal2) || diagonal1 <= 0 || diagonal2 <= 0) {
        document.getElementById('resultado-rombo').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const area = 0.5 * diagonal1 * diagonal2;
    document.getElementById('resultado-rombo').textContent = `Área: ${area.toFixed(2)} cm²`;
}

// Función para calcular el área de un rectángulo
function calcularAreaRectangulo() {
    const largo = parseFloat(document.getElementById('largo-rectangulo').value);
    const ancho = parseFloat(document.getElementById('ancho-rectangulo').value);
    if (isNaN(largo) || isNaN(ancho) || largo <= 0 || ancho <= 0) {
        document.getElementById('resultado-rectangulo').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const area = largo * ancho;
    document.getElementById('resultado-rectangulo').textContent = `Área: ${area.toFixed(2)} cm²`;
}

// Función para calcular el área de un triángulo
function calcularAreaTriangulo() {
    const base = parseFloat(document.getElementById('base-triangulo').value);
    const altura = parseFloat(document.getElementById('altura-triangulo').value);
    if (isNaN(base) || isNaN(altura) || base <= 0 || altura <= 0) {
        document.getElementById('resultado-triangulo').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const area = 0.5 * base * altura;
    document.getElementById('resultado-triangulo').textContent = `Área: ${area.toFixed(2)} cm²`;
}

// Función para calcular el área de un círculo
function calcularAreaCirculo() {
    const radio = parseFloat(document.getElementById('radio-circulo').value);
    if (isNaN(radio) || radio <= 0) {
        document.getElementById('resultado-circulo').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const area = Math.PI * Math.pow(radio, 2);
    document.getElementById('resultado-circulo').textContent = `Área: ${area.toFixed(2)} cm²`;
}

// Función para calcular el área de un cuadrado
function calcularAreaCuadrado() {
    const lado = parseFloat(document.getElementById('lado-cuadrado').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-cuadrado').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const area = Math.pow(lado, 2);
    document.getElementById('resultado-cuadrado').textContent = `Área: ${area.toFixed(2)} cm²`;
}


//////////////////////////////////////////////////////////////////////////
//////          FORMULAS DEL SUPERFICIE      /////////////////////////////

// Función para calcular el perímetro de un cuadrado
function calcularPerimetroCuadrado() {
    const lado = parseFloat(document.getElementById('lado-cuadrado').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-perimetro-cuadrado').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const perimetro = 4 * lado;
    document.getElementById('resultado-perimetro-cuadrado').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}

// Función para calcular el perímetro de un rectángulo
function calcularPerimetroRectangulo() {
    const largo = parseFloat(document.getElementById('largo-rectangulo').value);
    const ancho = parseFloat(document.getElementById('ancho-rectangulo').value);
    if (isNaN(largo) || isNaN(ancho) || largo <= 0 || ancho <= 0) {
        document.getElementById('resultado-perimetro-rectangulo').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const perimetro = 2 * (largo + ancho);
    document.getElementById('resultado-perimetro-rectangulo').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}

// Función para calcular el perímetro de un triángulo
function calcularPerimetroTriangulo() {
    const lado1 = parseFloat(document.getElementById('lado1-triangulo').value);
    const lado2 = parseFloat(document.getElementById('lado2-triangulo').value);
    const lado3 = parseFloat(document.getElementById('lado3-triangulo').value);
    if (isNaN(lado1) || isNaN(lado2) || isNaN(lado3) || lado1 <= 0 || lado2 <= 0 || lado3 <= 0) {
        document.getElementById('resultado-perimetro-triangulo').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const perimetro = lado1 + lado2 + lado3;
    document.getElementById('resultado-perimetro-triangulo').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}

// Función para calcular el perímetro (circunferencia) de un círculo
function calcularPerimetroCirculo() {
    const radio = parseFloat(document.getElementById('radio-circulo').value);
    if (isNaN(radio) || radio <= 0) {
        document.getElementById('resultado-perimetro-circulo').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const perimetro = 2 * Math.PI * radio;
    document.getElementById('resultado-perimetro-circulo').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}

// Función para calcular el perímetro aproximado de una elipse
function calcularPerimetroElipse() {
    const semiejeA = parseFloat(document.getElementById('semieje-a-elipse').value);
    const semiejeB = parseFloat(document.getElementById('semieje-b-elipse').value);
    if (isNaN(semiejeA) || isNaN(semiejeB) || semiejeA <= 0 || semiejeB <= 0) {
        document.getElementById('resultado-perimetro-elipse').textContent = "Por favor, ingresa valores válidos.";
        return;
    }
    const perimetro = Math.PI * (3 * (semiejeA + semiejeB) - Math.sqrt((3 * semiejeA + semiejeB) * (semiejeA + 3 * semiejeB)));
    document.getElementById('resultado-perimetro-elipse').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}

// Función para calcular el perímetro de un pentágono regular
function calcularPerimetroPentagono() {
    const lado = parseFloat(document.getElementById('lado-pentagono').value);
    if (isNaN(lado) || lado <= 0) {
        document.getElementById('resultado-perimetro-pentagono').textContent = "Por favor, ingresa un valor válido.";
        return;
    }
    const perimetro = 5 * lado;
    document.getElementById('resultado-perimetro-pentagono').textContent = `Perímetro: ${perimetro.toFixed(2)} cm`;
}