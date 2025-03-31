<?php

$this->title = 'Mapa Interactivo (Admin)';
?>

<!-- Añade los enlaces de Bootstrap aquí -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?= Yii::getAlias('@web') ?>/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="site-mapazoo">
    <h2>Mapa Interactivo (Admin)</h2>
    <p>Haz clic en el mapa para agregar puntos.</p>

    <div class="mapa-container" id="contenedor">
        <img id="mapa" src="<?= Yii::$app->request->baseUrl ?>/img/mapa.jpeg" alt="Mapa del Parque" onclick="abrirModalIngreso(event)">
    </div>

    <div id="tarjeta-info" class="tarjeta">
        <h3 id="tarjeta-titulo"></h3>
        <p id="tarjeta-descripcion"></p>
        <button class="btn-verde" id="btn-ver-animales" onclick="verAnimales()">Ver Animales</button>
        <button class="btn-rojo" onclick="cerrarTarjeta()">Cerrar</button>
    </div>
</div>

<!-- Modal de Ingreso de Zonas -->
<div id="modal-ingreso" class="modal">
    <div class="modal-contenido">
        <h3>Agregar Zona</h3>
        <form id="form-zona" action="<?= Yii::$app->urlManager->createUrl(["site/guardar-punto"]) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
            <input type="hidden" id="coord-x" name="x">
            <input type="hidden" id="coord-y" name="y">
            
            <div class="formulario">
                <label for="nombre-zona">Nombre:</label>
                <input type="text" id="nombre-zona" name="nombre" placeholder="Ingrese el nombre" required>

                <label for="descripcion-zona">Descripción:</label>
                <textarea id="descripcion-zona" name="descripcion" placeholder="Ingrese una descripción" required></textarea>

                <label for="imagen-zona">Imagen:</label>
                <input type="file" id="imagen-zona" name="imagen" accept="image/*" required>

                <label for="tiene-animales">¿Tiene Animales?</label>
                <input type="checkbox" id="tiene-animales" name="tiene_animales" value="1">

                <button type="submit" class="btn-verde">Guardar</button>
                <button type="button" class="btn-rojo" onclick="cerrarModal()">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para mostrar los animales -->
<div id="modalAnimales" class="modal fade" tabindex="-1" aria-labelledby="modalAnimalesLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAnimalesLabel">Animales en esta Zona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div id="contenidoAnimales" class="animales-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>


function cerrarModal() {
    document.getElementById("modal-ingreso").style.display = "none";
}

function agregarPuntoAlMapa(x, y, nombre, descripcion, imagen, tieneAnimales, puntoId) {
    console.log("puntoId en agregarPuntoAlMapa:", puntoId);

    var contenedor = document.getElementById("contenedor");
    var punto = document.createElement("div");
    punto.className = "punto-rojo";
    punto.style.left = x + "%";
    punto.style.top = y + "%";

    punto.addEventListener("click", function() {
        console.log("puntoId en click:", puntoId);
        mostrarTarjeta(nombre, descripcion, imagen, tieneAnimales, puntoId);
    });

    contenedor.appendChild(punto);
}

function mostrarTarjeta(nombre, descripcion, imagen, tieneAnimales, puntoId) {
    console.log("puntoId en mostrarTarjeta:", puntoId);
    console.log("imprime val de tieneanimales");
    console.log(tieneAnimales);
    const tarjetaContenido = document.getElementById("tarjeta-info");
    tarjetaContenido.innerHTML = 
        `<h3>${nombre}</h3>
        <p>${descripcion}</p>
        ${imagen ? `<img src="<?= Yii::$app->request->baseUrl ?>/${imagen}" alt="${nombre}" style="width: 100%; border-radius: 8px; margin-top: 10px;">` : ''}
        <br><br>
        ${tieneAnimales == 1 ? 
            `<button class="btn btn-verde ver-animales" onclick="verAnimales(${puntoId || 0})">
                Ver Animales
            </button>
            <br><br>` : ''
        }
        <button class="btn-rojo" onclick="cerrarTarjeta()">Cerrar</button>`;

    tarjetaContenido.style.display = "block";
}

function verAnimales(punto_id) {
    console.log("Consultando animales para punto_id:", punto_id);

    $.ajax({
        url: '<?= Yii::$app->urlManager->createUrl(["animal/animales-por-zona"]) ?>',
        type: 'GET',
        data: { punto_id: punto_id },
        success: function(data) {
            console.log("URL llamada:", this.url + "?punto_id=" + punto_id);
            console.log("Respuesta de animales:", data);
            $('#contenidoAnimales').html(data);
            $('#modalAnimales').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los animales: ', error);
            alert('Error al cargar los animales');
        }
    });
}

function cerrarTarjeta() {
    const tarjetaContenido = document.getElementById("tarjeta-info");
    tarjetaContenido.style.display = "none";
    tarjetaContenido.innerHTML = '';
}

// 2. Ejecutar código después de que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    $.ajax({
        url: '<?= Yii::$app->urlManager->createUrl(["site/obtener-puntos"]) ?>',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            data.forEach(punto => {
                agregarPuntoAlMapa(punto.x, punto.y, punto.nombre, punto.descripcion, punto.imagen, punto.tiene_animales, punto.id);
            });
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar puntos:', error);
        }
    });
    
    document.getElementById("tarjeta-info").style.display = "none";
    
    // Manejar el envío del formulario
    document.getElementById('form-zona').addEventListener('submit', function(e) {
        // No necesitamos hacer nada especial aquí, el formulario se enviará normalmente
        // La página se recargará después del envío
    });
});
</script>


<style>
    /* 🔹 Estilos Generales */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #F9F9F9;
        color: #333;
        text-align: center;
        padding: 20px;
    }

    h2 {
        color: #2E7D32;
        font-size: 26px;
        font-weight: bold;
    }

    p {
        color: #666;
        font-size: 16px;
    }

    /* 🔹 Contenedor del Mapa */
    .mapa-container {
        position: relative;
        display: inline-block;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background-color: white;
    }

    .mapa-container img {
        width: 100%;
        max-width: 734px;
        border-radius: 10px;
    }

    /* 🔹 Puntos en el Mapa */
    .punto-rojo {
        position: absolute;
        width: 22px;
        height: 22px;
        background-color: #2E7D32;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
        border: 2px solid white;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }

    /* 🔹 Tarjetas y Modales */
/* 🔹 Mantiene el estilo de las tarjetas */
.tarjeta {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 340px; /* Si las tarjetas tenían un tamaño diferente, ajusta aquí */
}

/* 🔹 Estilos generales para los modales */
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    display: none;
    text-align: center;
}

/* 🔹 Modal de ingreso de zonas */
#modal-ingreso {
    width: 340px;
}

/* 🔹 Modal de animales */
#modalAnimales {
    width: 840px;
}

#modalAnimales .modal-footer {
    display: flex;
    justify-content: space-between; /* Centra el botón */
    align-items: center; /* Centra el botón verticalmente */
    padding: 10px; /* Añade espacio alrededor del pie del modal */
}

#modalAnimales .modal-footer .btn-secondary {
    background-color: #E53935; /* Rojo bonito */
    color: white; /* Color de texto blanco */
    padding: 14px 30px; /* Botón más grande (más alto y ancho) */
    border-radius: 12px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(229, 57, 53, 0.3); /* Sombra suave */
    font-size: 18px; /* Tamaño de fuente más grande */
    font-weight: bold; /* Texto en negrita */
    transition: all 0.3s ease; /* Transición suave */
    white-space: nowrap; /* Evita que el texto se divida si es largo */
}

#modalAnimales .modal-footer .btn-secondary:hover {
    background-color: #D32F2F; /* Rojo más oscuro al hacer hover */
    box-shadow: 0 6px 12px rgba(229, 57, 53, 0.5); /* Sombra más fuerte al hacer hover */
}









    .tarjeta h3,
    .modal h3 {
        color: #2E7D32;
        font-size: 22px;
        font-weight: bold;
    }

    /* 🔹 Formulario en el Modal */
    .formulario {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .formulario label {
        font-weight: bold;
        color: #2E7D32;
    }

    .formulario input,
    .formulario textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .formulario textarea {
        height: 80px;
        resize: none;
    }

    /* 🔹 Botones Mejorados */
    .btn-verde,
    .btn-rojo {
        padding: 12px 16px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        display: inline-block;
        width: 100%;
    }

    .btn-verde {
        background: linear-gradient(135deg, #2E7D32, #66BB6A);
        color: white;
        box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
    }

    .btn-verde:hover {
        background: linear-gradient(135deg, #1B5E20, #43A047);
    }

    .btn-rojo {
        background: linear-gradient(135deg, #E53935, #FF7043);
        color: white;
        box-shadow: 0 4px 8px rgba(229, 57, 53, 0.3);
    }

    .btn-rojo:hover {
        background: linear-gradient(135deg, #C62828, #F4511E);
    }

    .btn-ver-animales {
        background-color: #4CAF50;
        /* Verde elegante */
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 10px rgba(76, 175, 80, 0.3);
        /* Sombra suave */
    }

    .btn-ver-animales:hover {
        background-color: #45a049;
        /* Un poco más oscuro al pasar el mouse */
        box-shadow: 0px 6px 12px rgba(76, 175, 80, 0.5);
        /* Aumenta el sombreado */
    }

    #tarjeta-info {
    display: none; /* 🔹 Oculta la tarjeta al cargar la página */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 340px;
}


</style>