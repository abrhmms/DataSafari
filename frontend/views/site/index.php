<?php

/** @var yii\web\View $this */

$this->title = 'Mi Aplicación Yii'; // Esto funciona porque $this es el contexto de la vista
?>

<script src="<?= Yii::getAlias('@web') ?>/lib/owlcarousel/owl.carousel.min.js"></script>

<div class="site-index">
  <!-- Header Start -->
  <div id="inicio" class="container-fluid bg-dark p-0 mb-5">
    <div class="row g-0 flex-column-reverse flex-lg-row">
      <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="header-bg h-100 d-flex flex-column justify-content-center p-5">
          <!-- Título "Parque del Pueblo" -->
          <h1 class="display-4 text-light mb-4" style="font-size: 4rem; font-weight: bold;">
            Parque del Pueblo
          </h1>
          <!-- Texto descriptivo -->
          <p class="lead text-light mb-0" style="font-size: 1.5rem;">
            Disfruta de una hermosa experiencia junto a tus seres queridos en nuestras instalaciones.
          </p>
        </div>
      </div>
      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
        <div class="owl-carousel header-carousel">
          <div class="owl-carousel-item">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/freepik__enhance__57344.jpg" alt="Imagen">
          </div>
          <div class="owl-carousel-item">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/freepik__enhance__64400.jpg" alt="Imagen">
          </div>
          <div class="owl-carousel-item">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/freepik__enhance__57343.jpg" alt="Imagen">
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Header End -->



  <!-- About Start -->
  <div id="sobre-nosotros" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <p><span class="text-primary me-2">#</span>Bienvenido al Parque del Pueblo</p>
          <h1 class="display-5 mb-4">
            ¿Por que deberias visitarnos?
            <span class="text-primary">Parque del Pueblo</span>
          </h1>
          <p class="mb-4">
            El parque es el único en su tipo en la zona oriente del Estado de México, cuenta con un museo de historia
            natural, un kiosco,
            área educativa, espacios para talleres educativos, un lago, teatro al aire libre y el zoológico.
          </p>
          <h5 class="mb-3">
            <i class="far fa-check-circle text-primary me-3"></i>Visitas guiadas al parque y al zoológico
          </h5>
          <h5 class="mb-3">
            <i class="far fa-check-circle text-primary me-3"></i>Teatro al aire libre
          </h5>
          <h5 class="mb-3">
            <i class="far fa-check-circle text-primary me-3"></i>Espacios para talleres educativos
          </h5>
          <h5 class="mb-3">
            <i class="far fa-check-circle text-primary me-3"></i>Los mejores animales del mundo
          </h5>
          <a class="btn btn-primary py-3 px-5 mt-3" href="">Conoce mas</a>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="img-border">
            <img class="img-fluid" src="img/about.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Facts Start -->
  <div class="container-xxl bg-primary facts my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 text-center">
      <!-- Título centrado -->
      <h1 class="text-white mb-4">Diversidad y Conservación en Nuestro Zoológico: Hogar de 300 Animales de 180 Especies
      </h1>

      <!-- Texto centrado -->
      <p class="text-white lead">
        En nuestro zoológico, habitan actualmente alrededor de 300 ejemplares de 180 especies diferentes. Entre ellos se
        encuentran leones, tigres de Bengala, monos, pumas, venados cola blanca, tortugas, avestruces, leopardos,
        cocodrilos, peces y diversos animales de granja como caballos, chivos y gansos, entre otros.
      </p>
    </div>
  </div>
  <!-- Facts End -->

  <!-- Service Start -->
  <div id="servicios" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-6">
          <p><span class="text-primary me-2">#</span>Nuestros Servicios</p>
          <h1 class="display-5 mb-0">
            Servicios Especiales para
            <span class="text-primary">Visitantes </span>del Parque del Pueblo
          </h1>
        </div>
        <div class="col-lg-6">
          <div class="bg-primary h-100 d-flex align-items-center py-4 px-4 px-sm-5">
            <i class="fa fa-3x fa-mobile-alt text-white"></i>
            <div class="ms-4">
              <p class="text-white mb-0">Llama para más información</p>
              <h2 class="text-white mb-0">+52 55-11-08-32-04</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row gy-5 gx-4">
        <!-- Visitas Guiadas -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <i class="fa fa-3x fa-map-signs text-primary mb-3"></i>
          <h5 class="mb-3">Visitas Guiadas</h5>
          <span>Disfruta de visitas guiadas al parque y al zoológico para una experiencia educativa y divertida.</span>
        </div>
        <!-- Museo de Historia Natural -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
          <i class="fa fa-3x fa-landmark text-primary mb-3"></i>
          <h5 class="mb-3">Museo de Historia Natural</h5>
          <span>Explora nuestro museo y descubre la fascinante historia natural de las especies que habitan en el
            zoológico.</span>
        </div>
        <!-- Kiosco para Espectáculos -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
          <i class="fa fa-3x fa-theater-masks text-primary mb-3"></i>
          <h5 class="mb-3">Kiosco para Espectáculos</h5>
          <span>Disfruta de espectáculos al aire libre en nuestro kiosco, perfecto para toda la familia.</span>
        </div>
        <!-- Granja Interactiva -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
          <i class="fa fa-3x fa-tractor text-primary mb-3"></i>
          <h5 class="mb-3">Granja Interactiva</h5>
          <span>Interactúa con animales de granja en un espacio diseñado para el aprendizaje y la diversión.</span>
        </div>
        <!-- Lago -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <i class="fa fa-3x fa-water text-primary mb-3"></i>
          <h5 class="mb-3">Lago</h5>
          <span>Relájate junto a nuestro lago, un espacio perfecto para disfrutar de la naturaleza.</span>
        </div>
        <!-- Teatro al Aire Libre -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
          <i class="fa fa-3x fa-theater-masks text-primary mb-3"></i>
          <h5 class="mb-3">Teatro al Aire Libre</h5>
          <span>Disfruta de presentaciones y eventos culturales en nuestro teatro al aire libre.</span>
        </div>
        <!-- Área Educativa -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
          <i class="fa fa-3x fa-book-open text-primary mb-3"></i>
          <h5 class="mb-3">Área Educativa</h5>
          <span>Participa en actividades educativas diseñadas para aprender sobre la conservación y la vida
            silvestre.</span>
        </div>
        <!-- Talleres Educativos -->
        <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
          <i class="fa fa-3x fa-chalkboard-teacher text-primary mb-3"></i>
          <h5 class="mb-3">Talleres Educativos</h5>
          <span>Asiste a talleres interactivos que fomentan el conocimiento y el respeto por la naturaleza.</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Service End -->


  <!-- Visiting Hours Start -->
  <div id="horario" class="container-xxl bg-primary visiting-hours my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <!-- Horarios de Visita -->
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
          <h1 class="display-6 text-white mb-5">Horario de Visitas</h1>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span>Lunes</span>
              <span>Día de Descanso</span>
            </li>
            <li class="list-group-item">
              <span>Martes</span>
              <span>8:00 AM - 6:00 PM</span>
            </li>
            <li class="list-group-item">
              <span>Miércoles</span>
              <span>8:00 AM - 6:00 PM</span>
            </li>
            <li class="list-group-item">
              <span>Jueves</span>
              <span>8:00 AM - 6:00 PM</span>
            </li>
            <li class="list-group-item">
              <span>Viernes</span>
              <span>8:00 AM - 6:00 PM</span>
            </li>
            <li class="list-group-item">
              <span>Sábado</span>
              <span>9:00 AM - 7:00 PM</span>
            </li>
            <li class="list-group-item">
              <span>Domingo</span>
              <span>9:00 AM - 5:00 PM</span>
            </li>
          </ul>
        </div>
        <!-- Información de Contacto -->
        <div class="col-md-6 text-light wow fadeIn" data-wow-delay="0.5s">
          <h1 class="display-6 text-white mb-5" style="color: white;">Información de Contacto</h1>
          <table class="table" style="color: white;">
            <tbody>
              <tr>
                <td style="color: white;">Parque</td>
                <td style="color: white;">C. Gta. de Colon 391, Villada, 57718 Cdad. Nezahualcóyotl, Méx.</td>
              </tr>
              <tr>
                <td style="color: white;">Soporte</td>
                <td style="color: white;">
                  <p class="mb-2" style="color: white;">+52 55 1108 3204</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <!-- Visiting Hours End -->
  <div id="ubicacion" class="container-xxl py-5">
    <div class="container">
      <!-- Texto arriba del mapa, lado izquierdo -->
      <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-6">
          <p><span class="text-primary me-2">#</span>Ubicación</p>
          <h1 class="display-5 mb-0">
            Encuéntranos en el
            <span class="text-primary">Parque del Pueblo</span>
          </h1>
        </div>
      </div>
      <!-- Mapa de Google Maps -->
      <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
        <div class="col-lg-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.045037417389!2d-99.0053599!3d19.3944352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1e329bb79ed55%3A0xe1bc8d220a9fab1!2sZool%C3%B3gico%20Parque%20del%20Pueblo!5e0!3m2!1ses!2smx!4v1696899999999!5m2!1ses!2smx"
            width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br>