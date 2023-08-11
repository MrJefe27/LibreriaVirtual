<?php

  require 'database.php';
  $db = new Database();
  $con = $db->conectar();
  $con2 = $db->conectar();

  //Consulta para seleccionar el listado de libros y autores
  $sql = $con->prepare("SELECT t.id_titulo, t.titulo, t.tipo,
                        CASE WHEN t.precio IS NULL THEN '$ 0' 
                        ELSE CONCAT('$ ',t.precio) END AS precio, 
                        t.notas, CONCAT(a.nombre,' ',a.apellido) as autor 
                        FROM titulos t 
                        INNER JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo 
                        INNER JOIN autores a ON ta.id_autor = a.id_autor 
                        WHERE CONTRATO IN (0,1);
                      ");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

  //Consulta para seleccionar los datos de los autores
  $sql2 = $con->prepare("SELECT a.id_autor, 
                         concat(a.nombre,' ',a.apellido) as nombre, a.pais, b.biografia
                         FROM `autores` a 
                         INNER JOIN biografias b on a.id_autor = b.id_autor 
                         ORDER BY 2  LIMIT 6;
                        ");
  $sql2->execute();

  $resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC)

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Libreria Virtual</title>
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

  <!-- ======= Sección de inicio ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Aprendiendo hoy,<br>Liderando mañana</h1>
      <h2>
        Leer es una actividad enriquecedora que ofrece numerosos beneficios para nuestra mente y bienestar. Al sumergirnos en las páginas de un libro, expandimos nuestro conocimiento, ampliamos nuestro vocabulario y estimulamos nuestra imaginación.</h2>
      <a href="courses.php" class="btn-get-started">Comenzar</a>
    </div>
  </section><!-- Fin del Héroe -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Sobre Nosotros</h3>
            <p class="fst-italic">
              Bienvenido a nuestra librería, un espacio apasionante para los amantes de la lectura y el conocimiento. Nos enorgullecemos de ofrecer una amplia selección de libros que abarcan diversos géneros y temas, desde clásicos literarios hasta las últimas novedades editoriales. Nuestra misión es fomentar la cultura y el hábito de la lectura, brindando un ambiente acogedor donde cada visita se convierte en una experiencia única. Nuestro equipo de entusiastas bibliotecarios está siempre dispuesto a recomendar títulos y compartir su amor por las letras. ¡Ven y descubre un mundo de historias y aprendizaje en nuestra librería!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div id="rows" class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1756" data-purecounter-duration="1" class="purecounter"></span>
            <p>Estudiantes</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
            <p>Libros</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1" class="purecounter"></span>
            <p>Autores</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="18102" data-purecounter-duration="1" class="purecounter"></span>
            <p>Lecturas</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Libros</h2>
          <p>Libros Populares</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!-- INICIO foreach -->
          <?php foreach($resultado as $row) {?>
            <!-- start book item -->
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch padd">
              <div class="course-item" style="margin-top:15px;">
                <?php 
                
                $id = $row['id_titulo'];
                $imagen = "assets/img/books/".$id.".jpg";

                if (!file_exists($imagen)) {
                  $imagen = "assets/img/no-photo.png";
                }

                ?>
                <center>
                  <img src="<?php echo $imagen ?>" class="img-fluid" alt="..." style="width: auto; height: 360px;">
                </center>
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?php echo $row['tipo']; ?></h4>
                    <p class="price"><?php echo $row['precio']; ?></p>
                  </div>

                  <h3><a href="#"><?php echo $row['titulo']; ?></a></h3>
                  <p><?php echo $row['notas']; ?></p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                      <span>Autor: <?php echo $row['autor']; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- End Course Item-->
          <?php } ?>
        </div>

      </div>
    </section><!-- End Popular Courses Section -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>