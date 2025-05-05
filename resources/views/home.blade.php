<x-app2-layout>
  <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/imagen-principal.png" class="img-fluid animated" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>Asociación de Karate-Do</h1>
            <p>Dedicados a la enseñanza y la práctica del Karate-Do tradicional.</p>
            <div class="d-flex">
              <a href="{{route('register')}}" class="btn-get-started">Únete a Nosotros</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/about.svg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
            <h3>Sobre Nosotros</h3>
            Nuestro dojo se especializa en preparar competidores para torneos de karate, con entrenamiento enfocado en <strong>kata, kumite y condición física de alto rendimiento</strong>. Ofrecemos coaching personalizado, simulacros de competencia y estrategias para destacar en eventos locales, nacionales e internacionales.
            </p>
            <p>  
            ¿Quieres competir? ¡Únete a nuestro equipo y lleva tu karate al siguiente nivel!
            </p>
            <ul>
              <li>
                 <i class="bi bi-trophy"></i> <!-- Icono de trofeo -->
                    <div>
                    <h5>Preparación para torneos</h5>
                    <p>Entrenamiento especializado en reglamentos de competición, puntajes y técnicas efectivas para ganar en torneos de kata y kumite.</p>
              </li>
              <li>
              <i class="bi bi-speedometer2"></i> <!-- Icono de rendimiento -->
                <div>
                <h5>Análisis de desempeño</h5>
                <p>Evaluación técnica y táctica con grabación en video para corregir detalles y maximizar tu potencial competitivo.</p>
                </div>
              </li>
              <li>
              <i class="bi bi-airplane"></i> <!-- Icono de viaje/eventos -->
                <div>
                <h5>Participación en eventos</h5>
                <p>Te acompañamos a competencias y conectamos con organizadores para que tengas oportunidades en circuitos reconocidos.</p>
                </div>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
    <img src="assets/img/features-1.svg" class="img-fluid" alt="">
    </div>
    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
        <h3>Entrenamiento especializado para torneos de alto nivel</h3>
        <p class="fst-italic">
        Programa diseñado para competidores que buscan destacar en circuitos nacionales e internacionales.
        </p>
        <ul>
        <li><i class="bi bi-check"></i><span> Kumite competitivo: Técnicas adaptadas a reglamentos WKF y puntaje electrónico.</span></li>
        <li><i class="bi bi-check"></i> <span>Katas de alto rendimiento: Corrección postural y énfasis en potencia/ritmo para jueces.</span></li>
        <li><i class="bi bi-check"></i> <span>Simulacros de competencia mensuales con árbitros certificados.</span></li>
        </ul>
    </div>
    </div><!-- Features Item -->
      </div>

    </section><!-- /Features Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section dark-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
      <h2 class="titulo-seccion">Eventos</h2>
      <p class="subtitulo-seccion">Competiciones y exhibiciones de Kata y Kumite</p>
      </div><!-- End Section Title -->

      <div class="container">
      <livewire:lista-evento />
        <div class="row gy-4">

        
          </div><!-- Card Item -->

        </div>

      </div>

    </section><!-- /Why Us Section -->


    <!-- Services Section -->
    <section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
    <h2>Nuestros Programas</h2>
    <p>Entrenamiento especializado para todas las edades y niveles competitivos</p>
    </div><!-- End Section Title -->

    <div class="container">

    <div class="row gy-4">

        <!-- Programa Competitivo -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-trophy" style="color: #ffd700;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Karate Competitivo</h3>
            </a>
            <p>Preparación para torneos con entrenamiento en kumite y kata bajo reglamentos WKF. Incluye simulacros mensuales.</p>
        </div>
        </div><!-- End Service Item -->

        <!-- Clases Infantiles -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-people-fill" style="color: #fd7e14;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Karate Infantil</h3>
            </a>
            <p>Programa para niños (4-12 años) que combina disciplina, coordinación y valores a través del karate.</p>
        </div>
        </div><!-- End Service Item -->

        <!-- Defensa Personal -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-shield-shaded" style="color: #20c997;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Defensa Personal</h3>
            </a>
            <p>Técnicas prácticas aplicables a situaciones reales, adaptadas para adultos y adolescentes.</p>
        </div>
        </div><!-- End Service Item -->

        <!-- Estilos de Karate - Shotokan -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-lightning-charge" style="color: #df1529;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Shotokan</h3>
            </a>
            <p>Estilo tradicional enfocado en técnicas poderosas y posiciones bajas. Ideal para desarrollar fuerza y velocidad.</p>
        </div>
        </div><!-- End Service Item -->

        <!-- Estilos de Karate - Goju-Ryu -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-bounding-box-circles" style="color: #6610f2;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Goju-Ryu</h3>
            </a>
            <p>Combina técnicas duras y suaves con énfasis en respiración y combate cercano. Perfecto para trabajo corporal.</p>
        </div>
        </div><!-- End Service Item -->

        <!-- Clases Privadas -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
            <div class="icon">
            <i class="bi bi-person-video3" style="color: #f3268c;"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
            <h3>Entrenamiento Personalizado</h3>
            </a>
            <p>Sesiones 1 a 1 con instructores certificados para objetivos específicos o preparación de exámenes de grado.</p>
        </div>
        </div><!-- End Service Item -->

    </div>

    </div>

    </section><!-- /Services Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contacto</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Dirección</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Numero de contacto</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Correo</h3>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Enviar mensaje</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</x-app2-layout>
