<?php

/** @var yii\web\View $this */

$this->title = 'Mapa Interactivo - Zoológico';
?>

<style>
        html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Evita scroll horizontal */
    width: 100%;
}

.site-mapa {
    width: 100%;
    max-width: 100vw; /* Asegura que no sobrepase el ancho de la pantalla */
    overflow: hidden; /* Evita desbordamiento horizontal */
}

.map-container {
    width: 100%;
    height: 80vh;
    max-width: 1400px;
    background: #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block; /* Elimina espacios extra */
}

    </style>
</head>
<body>
    <div class="site-mapa">
        <header>
            <h1>Bienvenido al Mapa Interactivo</h1>
        </header>
        <main>
            <section class="map-container">
                <iframe src="https://view.genial.ly/67b414f0bcc59c21b06d0699/embed" frameborder="0" allowfullscreen></iframe>
            </section>
        </main>
    </div>



<br><br><br>