<?php

$this->title = 'Mapa Interactivo (Usuarios)';
?>

<div class="site-mapauser">
    <h2>Mapa Interactivo</h2>
    <p>Haz clic en un punto para ver información.</p>

    <div class="mapa-container" id="contenedor">
        <img id="mapa" src="<?= Yii::$app->request->baseUrl ?>/img/mapa.jpeg" alt="Mapa del Zoológico">
    </div>

    <div id="tarjeta-info" class="tarjeta">
        <h3 id="tarjeta-titulo">Nombre del Animal</h3>
        <div id="tarjeta-contenido"></div>
        <button onclick="cerrarTarjeta()">Cerrar</button>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('<?= Yii::$app->urlManager->createUrl(["site/obtener-puntos"]) ?>')
            .then(response => response.json())
            .then(data => {
                data.forEach(punto => {
                    agregarPuntoAlMapa(punto.x, punto.y, punto.nombre, punto.descripcion);
                });
            })
            .catch(error => console.error('Error al cargar puntos:', error));
    });

    function agregarPuntoAlMapa(x, y, nombre, descripcion) {
        var contenedor = document.getElementById("contenedor");

        var punto = document.createElement("div");
        punto.className = "punto-rojo";
        punto.style.left = x + "%";
        punto.style.top = y + "%";

        punto.addEventListener("click", function() {
            mostrarTarjeta(nombre, descripcion);
        });

        contenedor.appendChild(punto);
    }

    function mostrarTarjeta(nombre, descripcion) {
        var tarjeta = document.getElementById("tarjeta-info");
        var titulo = document.getElementById("tarjeta-titulo");
        var contenido = document.getElementById("tarjeta-contenido");

        titulo.textContent = nombre;
        contenido.innerHTML = `
            <img src="<?= Yii::$app->request->baseUrl ?>/img/tigre.jpeg" alt="Tigre de Bengala" class="tarjeta-img">
            <p><strong>Edad:</strong> 12 años</p>
            <p><strong>Peso:</strong> 95.3 kg</p>
            <p><strong>Filo:</strong> Chordata</p>
            <p><strong>Clase:</strong> Mammalia</p>
            <p><strong>Orden:</strong> Carnivora</p>
            <p><strong>Familia:</strong> Felidae</p>
            <p><strong>Género:</strong> Panthera</p>
            <p><strong>Especie:</strong> Tigre de Bengala</p>
            <p><strong>Hábitat:</strong> Selva tropical</p>
        `;

        tarjeta.style.display = "block";
    }

    function cerrarTarjeta() {
        document.getElementById("tarjeta-info").style.display = "none";
    }
</script>

<style>
    .mapa-container {
        position: relative;
        display: inline-block;
        border: 2px solid #357a38;
        background-color: white;
    }

    .mapa-container img {
        width: 100%;
        max-width: 734px;
    }

    .punto-rojo {
        position: absolute;
        width: 15px;
        height: 15px;
        background-color: red;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .tarjeta {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        display: none;
        width: 320px;
        text-align: left;
        border: 2px solid #85c785;
    }

    .tarjeta-img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .tarjeta button {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
    }
</style>
