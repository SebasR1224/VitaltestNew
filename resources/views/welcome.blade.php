<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>vitaltest - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.gif" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    </head>
    <body>

        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
              <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:vitaltest@gmail.com">vitaltest@gmail.com</a></i>
              <i class="bi bi-phone d-flex align-items-center ms-4"><span>+57 548 12 67</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
          </div>
        </section>

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
          <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
              <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>
              <a href="index.html">vital<span>test</span></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->


            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
                <li><a class="nav-link scrollto" href="#about">Acerca de</a></li>
                <li><a class="nav-link scrollto" href="#modules">Módulos</a></li>
                <li><a class="nav-link scrollto" href="#services">Funcionalidades</a></li>
                <li><a class="nav-link scrollto" href="#ventajas">Ventajas</a></li>
                <li><a class="nav-link scrollto" href="#team">Equipo</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
                @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/home') }}" class="nav-link scrollto">Acceder</a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="nav-link scrollto">Iniciar Sesión</a></li>
                        @if (Route::has('register'))
                        <li> <a href="{{ route('register') }}" class="nav-link scrollto">Registrarse</a></li>
                        @endif
                    @endauth
                @endif
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
          </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
          <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Bienvenido a
              <span class="vital">vital</span><span class="test">test</span>
            </h1>
            <h2>La nueva tecnología que proteje  tu salud</h2>
            <div class="d-flex">
              <a href="#about" class="btn-get-started scrollto">Empezar</a>
            </div>
          </div>
        </section>
        <!-- End Hero -->
        <div class="espacio">

        </div>
        <main id="main">
          <!-- ======= About Section ======= -->
          <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Acerca de</h2>
                <h3>Descubre más sobre <span>el software</span></h3>
                <p>Vitaltest aplicativo que piensa en la comodidad de sus beneficiarios y en las necesidades de cada uno en el área de la salud.</p>
              </div>

              <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                  <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                  <h3>Soluciones para el malestar de sus clientes.</h3>
                  <p class="fst-italic">
                    El equipo de desarrolladores identificó las necesidades que se presentan en el sector de la salud y pensando en las comodidades de los usuarios comenzó el análisis y producción de Vitaltest, un sistema que permite conocer la solución con medicamentos de cualquier malestar general que presenten los beneficiarios de aluna entidad pública o privada salud.
                  </p>
                  <p> </p>
                  <p>
                    Para asegurar la mejor experiencia para los clientes se tuvieron en cuenta estas características que identifican el sistema como uno de los mejores.
                  </p>
                  <ul>
                    <li>
                      <i class="bi bi-puzzle"></i>
                      <div>
                        <h5>Fácil</h5>
                        <p>La interfaz del aplicativo es muy intuitiva y fácil de usar.</p>
                      </div>
                    </li>
                    <li>
                      <i class="bi bi-stopwatch"></i>
                      <div>
                        <h5>Rápido</h5>
                        <p>La velocidad de respuesta tanto del test medico como de los demás módulos no superan los 5 segundos.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </section>
          <!-- End About Section -->
          <section id="modules" class="services">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Módulos</h2>
                <h3>Revisa los módulos de <span>vitaltest</span></h3>
                <p>Vitaltest ofrece 3 modulos totalmente funcionales que reflejan caracteristicas unicas ademas de inferaz fácil, agil y segura</p>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-bookmark-heart"></i></div>
                    <h4><a href="">Test médico</a></h4>
                    <p>
                        Del lado del farmacéutico podemos llenar ilimitadas
                        recomendaciones que se asocian al test médico que realiza
                        la persona para que la respuesta de este sea dada por expertos.
                    </p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-people"></i></div>
                    <h4><a href="">Usuarios</a></h4>
                    <p>
                        El módulo de usuarios, permite realizar un buen manejo de la información
                        de cada persona para preservar la privacidad de los datos.
                    </p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-bag-plus"></i></div>
                    <h4><a href="">Medicamentos</a></h4>
                    <p>
                        Es posible mantener actualizado el catalogo
                        teniendo en cuenta el cambio de datos, ademas
                        dichos medicamentos estan relacionado con el
                        test médico para mostrar una solucion con estos
                        en caso de ser posible.
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </section>

          <!-- ======= Services Section ======= -->
          <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Funcionalidades</h2>
                <h3>Software con funcionalidades <span>innovadoras</span></h3>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-lightbulb"></i></div>
                    <h4><a href="">Test médico</a></h4>
                    <p>
                        Del lado de cliente, se puede entrar a este
                        módulo y completar una serie de preguntas que
                        se relacionan con el malestar del cliente para
                        identificar su solución.
                    </p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-chat-square-text"></i></div>
                    <h4><a href="">Chat con profesionales</a></h4>
                    <p>
                        Para garantizar la conformidad de las personas, habilitamos un
                        espacio para hablar con profesionales de la salud que pueden
                        servir como refuerzo al test médico
                    </p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-cart3"></i></div>
                    <h4><a href="">Consulta de médicamentos</a></h4>
                    <p>
                        Los clientes tendran a la mano un catalogo de medicamentos con sus
                        respectivos precios actualizados teniendo en cuenta todo tipo de descuento.
                    </p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-reception-3"></i></div>
                    <h4><a href="">Reporte de enfermedades</a></h4>
                    <p>
                        Identificando los resultados del test se pueden identificar las enfermedades
                        que pueden encontrarse en el sector y la de mayor peligro.
                    </p>
                  </div>
                </div>

              </div>

            </div>
          </section>

                <!-- ======= Featured Services Section ======= -->
                <section id="ventajas" class="featured-services">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>Ventajas</h2>
                            <h3>Grandes <span> ventajas</span> ofrece vitaltest</h3>
                            <p>Conoce sobre las virtudes que tiene el sistema</p>
                          </div>

                      <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-shield-check"></i></div>
                            <h4 class="title"><a href="">Confiabilidad</a></h4>
                            <p class="description">Vitaltest controla todo módulo con permisos de rol para garantizar que la información suministrada allí esté dada por profesionales, además cada campo está controlado para ingresar información real y con especificaciones exactas.  </p>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-stars"></i></div>
                            <h4 class="title"><a href="">Eficacia</a></h4>
                            <p class="description">Los resultados de cada módulo están pensados para mostrar información lo más optima y cómoda para el usuario.</p>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bi bi-speedometer"></i></div>
                            <h4 class="title"><a href="">Rapidez</a></h4>
                            <p class="description">Software que asegura una velocidad de respuesta que no supera los 10 segundos, evidentemte garantiza comodidad para todo tipo de usuario.</p>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bi bi-lock"></i></div>
                            <h4 class="title"><a href="">Privacidad</a></h4>
                            <p class="description">La información solicitada allí es con el fin de ofrecer numerosas soluciones a todo tipo de personas, no se utilizará para otros fines corruptos que alteren la privacidad de la información personal de cada usuario. </p>
                          </div>
                        </div>

                      </div>

                    </div>
                  </section>
                  <!-- End Featured Services Section -->
          <!-- ======= Team Section ======= -->
          <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Equipo</h2>
                <h3><span>Personal</span> de trabajo</h3>
                <p>Conoce a los jóvenes emprendedores  que trabajan en el desarrollo del software</p>
              </div>

              <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Sebastián Rodríguez</h4>
                      <span>Lider de proyecto</span>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="member">
                    <div class="member-img">
                      <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Sara Ariza</h4>
                      <span>Programador frontend</span>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="member">
                    <div class="member-img">
                      <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Brandon Smith</h4>
                      <span>Diseñador web</span>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                  <div class="member">
                    <div class="member-img">
                      <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Samuel Esteban</h4>
                      <span>Modelador de SQL</span>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </section><!-- End Team Section -->

          <!-- ======= Contact Section ======= -->
          <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Contacto</h2>
                <h3><span>Contáctanos</span></h3>
                <p>vitaltest tiene en cuenta la opinión de los clientes, en caso de tener alguna inquietud o solicitud, llene el formulario de contacto</p>              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                  <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Nuestra dirección</h3>
                    <p>C. 19A #96c-40, Bogotá</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Envíenos un correo electrónico</h3>
                    <p>vitaltest@gmail.com </p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Llámanos</h3>
                    <p>+57 548 12 67</p>
                  </div>
                </div>

              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63626.34057371896!2d-74.13219359941405!3d4.65700875248867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c89a133caa7%3A0x90d1ccacac893246!2sSENA%20Centro%20de%20Gesti%C3%B3n%20de%20Mercados%2C%20Log%C3%ADstica%20y%20Tecnolog%C3%ADas%20de%20la%20Informaci%C3%B3n%20-%20Fontib%C3%B3n!5e0!3m2!1ses!2sco!4v1631102062158!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div class="col-lg-6">
                  <form action="{{route('contactanos.send')}}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                      <div class="col form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                      </div>
                      <div class="col form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Tema" required>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message">
                      </div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Enviar menasaje</button></div>
                  </form>
                </div>

              </div>

            </div>
          </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">


          <div class="footer-top">
            <div class="container ">
              <div class="row">

                <div class="col-lg-4 col-md-4 footer-contact">
                  <h3>vital<span>test</span></h3>
                </div>
                <div class="col-lg-4 col-md-4 footer-contact">
                    <p>
                        <strong>Teléfono:</strong> +57 548 12 67<br>
                        <strong>Correo:</strong> vitaltest@gmail.com<br>
                    </p>
                  </div>
                <div class="col-lg-4 col-md-4 footer-contact">
                    <p>
                        <strong>©vitaltes 2021 </strong>– Todos los derechos reservados
                    </p>
                </div>
              </div>
            </div>
          </div>

        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

      </body>
</html>
