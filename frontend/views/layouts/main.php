<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>

<!-- Favicon -->
<link href="<?= Yii::getAlias('@web') ?>/img/favicon.ico" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet" />

<!-- Icon Font Stylesheets -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Libraries Stylesheets -->
<link href="<?= Yii::getAlias('@web') ?>/lib/animate/animate.min.css" rel="stylesheet" />
<link href="<?= Yii::getAlias('@web') ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
<link href="<?= Yii::getAlias('@web') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="<?= Yii::getAlias('@web') ?>/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?= Yii::getAlias('@web') ?>/css/bootstrap.min.css" rel="stylesheet" />

<!-- Custom Stylesheet -->
<link rel="stylesheet" href="<?= Yii::getAlias('@web') ?>/css/style.css" />


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Navbar personalizado -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand p-0">
            <img class="img-fluid me-3" src="<?= Yii::$app->request->baseUrl ?>/img/icon/icon-10.png" alt="Icon" />
            <h1 class="m-0 text-primary">DataSafari</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="<?= Yii::$app->homeUrl ?>" class="nav-item nav-link active">
                    <i class="fa fa-home me-2"></i>Inicio
                </a>
                <a href="#sobre-nosotros" class="nav-item nav-link">
                    <i class="fa fa-info-circle me-2"></i>Sobre Nosotros
                </a>
                <a href="#servicios" class="nav-item nav-link">
                    <i class="fa fa-tree me-2"></i>Servicios
                </a>
                <a href="#horario" class="nav-item nav-link">
                    <i class="fa fa-clock me-2"></i>Horario
                </a>
                <a href="#ubicacion" class="nav-item nav-link">
                    <i class="fa fa-map-marker-alt me-2"></i>Ubicación
                    
                </a>
                <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-list me-2"></i>Mas..
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/mapa']) ?>" class="dropdown-item">Mapa Interactivo</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/catalogo']) ?>" class="dropdown-item">Animales</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/mapa-user']) ?>" class="dropdown-item">Mapa 2</a></li>

                        </ul>
                    </div>
            </div>
            <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['index.php/site/login']) ?>" class="btn btn-primary me-3">
                    <i class="fa fa-sign-in-alt me-2"></i>Iniciar Sesión
                </a>
            <?php else: ?>
                <?= Html::beginForm(['index.php/site/logout'], 'post', ['class' => 'd-flex']) ?>
                    <?= Html::submitButton(
                        'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-primary']
                    ) ?>
                <?= Html::endForm() ?>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="container-fluid footer bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
<div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-light mb-4">Contacto</h5>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>C. Gta. de Colon 391, Villada, 57718 Cdad. Nezahualcóyotl, Méx.
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>+52 55 1108 3204
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/parquedelpueblonezaoficial">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-light mb-4">Enlaces Rápidos</h5>
                <a href="#inicio" class="nav-item nav-link active">
                    <i class="fa fa-home me-2"></i>Inicio
                </a>
                <a href="#sobre-nosotros" class="nav-item nav-link">
                    <i class="fa fa-info-circle me-2"></i>Sobre Nosotros
                </a>
                <a href="#servicios" class="nav-item nav-link">
                    <i class="fa fa-tree me-2"></i>Servicios
                </a>
                <a href="#horario" class="nav-item nav-link">
                    <i class="fa fa-clock me-2"></i>Horario
                </a>
                <a href="#ubicacion" class="nav-item nav-link">
                    <i class="fa fa-map-marker-alt me-2"></i>Ubicación
                </a>
            </div>
        </div>
        <div class="container">
            <div class="copyright text-center py-4">
                <p class="mb-0">
                    &copy; <a class="border-bottom" href="#">Parque del Pueblo</a>, Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>
</footer>
    

<?php $this->endBody() ?>
<!-- Owl Carousel JS -->
<script src="<?= Yii::getAlias('@web') ?>/lib/owlcarousel/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"], // Iconos personalizados
        dots: true
    });
});

</script>

</body>
</html>
<?php $this->endPage();
