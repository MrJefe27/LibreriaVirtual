<?php

  require 'database.php';
  $db = new Database();
  $con2 = $db->conectar();

  //Consulta para seleccionar los datos de los autores
  $sql2 = $con2->prepare("SELECT a.id_autor, 
                         concat(a.nombre,' ',a.apellido) as nombre, a.pais, b.biografia
                         FROM `autores` a 
                         LEFT JOIN biografias b on a.id_autor = b.id_autor 
                         ORDER BY 2;
                        ");
  $sql2->execute();

  $resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC)

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trainers - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Libreria</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Inicio</a></li>
          <li><a href="about.html">Sobre Nosotros</a></li>
          <li><a href="courses.php">Libros</a></li>
          <li><a href="trainers.php">Autores</a></li>
          <li><a href="contact.php">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="courses.php" class="get-started-btn">Comprar</a>

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>SECCION DE AUTORES</h2>
        <p>Bienvenido a nuestra sección de autores, un rincón literario donde la imaginación y la creatividad se entrelazan para dar vida a las más cautivadoras historias. Aquí encontrarás una selección exquisita de escritores de renombre y jóvenes talentos, cuyas plumastransportarán tu mente a mundos desconocidos y emociones inexploradas. Desde clásicos intemporales hasta voces contemporáneas, sumérgete en la diversidad de estilos y géneros que hacen de la literatura un universo infinito de posibilidades. ¡Descubre a tus nuevos compañeros de aventuras literarias en este espacio dedicado a los creadores de palabras y sueños! </p>
      </div>
    </div><!-- End Breadcrumbs -->

     <!-- ======= Trainers Section ======= -->
     <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <!-- INICIO foreach -->
            <?php foreach($resultado2 as $row) {?>

              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                <?php 
                
                $id = $row['id_autor'];
                $imagen2 = "assets/img/autors/".$id.".jpg";

                if (!file_exists($imagen2)) {
                  $imagen2 = "assets/img/no-photo.png";
                }

                ?>
                  <center>
                    <img src="<?php echo $imagen2 ?>" class="img-fluid" alt="..." style="width: auto; height: 360px;">
                  </center>
                  <div class="member-content">
                    <h4><?php echo $row['nombre']; ?></h4>
                    <span><?php echo $row['pais']; ?></span>
                    <p>
                    <?php echo $row['biografia']; ?>
                    </p>
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Mentor</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Telefono:</strong> +1 5589 55488 55<br>
              <strong>Correo electrónico:</strong> cpeguero@test.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Enlaces</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html">Sobre Nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terminos de Servicios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politicas de Privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestros Servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Desarrollo Web</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Administracion de productos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Publicidad</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Diseño Grafico</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Suscribase a nuestro Newsletter</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Suscribirse">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. Todos los derechos reservados.
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>