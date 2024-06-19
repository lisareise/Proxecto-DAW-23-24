<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/e221cb5c78.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="stylesheet" href="src/styles/header.css" />
    <link rel="stylesheet" href="src/styles/landing.css" />
    <script src="src/js/header.js" defer></script>
    <title>Landing Page NutriSmart</title>
  </head>

  <body>
    <?php include("./partials/header.php") ?>
    <main>
      <swiper-container>
        <swiper-slide>
          <div class="slide-container">
            <div>
              <h1>¡Revoluciona tu gestión de pacientes!</h1>
              <p>
                Olvídate de las hojas de cálculo y los cuadernos desorganizados.
                Nuestra plataforma te permite gestionar de forma eficiente a tus
                pacientes, almacenar sus datos de forma segura, realizar
                seguimientos personalizados y ofrecer una atención integral.
              </p>
            </div>
          </div>

          <img src="./src/images/nutricion1.jpg" alt="" />
        </swiper-slide>
        <swiper-slide>
          <div class="slide-container">
            <div>
              <h2>
                Únete a la comunidad de nutricionistas
                modernizandos.
              </h2>
              <p>
                Disfruta de una plataforma intuitiva y fácil de usar, diseñada
                por y para expertos en nutrición. Accede a recursos exclusivos,
                recibe asistencia técnica personalizada y forma parte de una
                comunidad vibrante de profesionales.
              </p>
            </div>
          </div>

          <img src="./src/images/nutricion2.jpg" alt="" />
        </swiper-slide>
        <swiper-slide>
          <div class="slide-container">
            <div>
              <h2>La salud es nuestra prioridad.</h2>
              <p>
                Para nosotros es importante que tus pacientes se sientan
                atendidos y confiados de que están en buenas manos.
              </p>
            </div>
          </div>

          <img src="./src/images/nutricion3.jpg" alt="" />
        </swiper-slide>
      </swiper-container>
      <section class="section--nogap-down light" style="margin-bottom: 0">
        <article class="container">
          <div class="dual">
            <img
              class="img-cover"
              src="./src/images/img1-landing.png"
              alt="¿Por qué elegir nuestra plataforma?"
            />
            <div>
              <h2>¿Por qué elegir nuestra plataforma?</h2>
              <p>
                te ofrecemos una solución completa para gestionar tu práctica de
                forma eficiente, mejorar la calidad de tu servicio y aumentar
                tus ingresos. Ahorra tiempo y esfuerzo simplificando la gestión
                de pacientes. Te ofrecemos herramientas para ofrecerle a tus
                pacientes una atención personalizada, permitiéndote que les
                realices un seguimiento detallado de tus pacientes. Podrás
                comunicarte con tus clientes de manera efectiva, acceder a
                recursos exclusivos y formar parte de una comunidad vibrante de
                otros profesionales donde podrás compartir experiencias,
                intercambiar ideas y establecer contactos profesionales.
              </p>
            </div>


          </div>
        </article>
      </section>
      <section style="margin-bottom: 0">
        <article class="container servicios">
          <div class="servicio">
            <div class="servicio__icon">
              <i class="fa-solid fa-list-check"></i>
            </div>
            <h3>Potencia tu práctica nutricional</h3>
            <p>
              Te ofrecemos una solución completa para gestionar de forma
              eficiente a tus pacientes, para una atención nutricional integral
              y de alta calidad.
            </p>
          </div>
          <div class="servicio">
            <div class="servicio__icon">
              <i class="fa-solid fa-file-circle-check"></i>
            </div>
            <h3>Accede a recursos exclusivos</h3>
            <p>
              Disfruta de una amplia biblioteca de recursos educativos,
              incluyendo plantillas de planes nutricionales, material
              informativo para pacientes y las últimas investigaciones en el
              campo de la nutrición.
            </p>
          </div>
          <div class="servicio">
            <div class="servicio__icon">
              <i class="fa-solid fa-stopwatch"></i>
            </div>
            <h3>Optimiza tu tiempo</h3>
            <p>
              Olvídate de las tareas administrativas tediosas y enfócate en lo
              que realmente importa: ayudar a tus pacientes a alcanzar sus metas
              de salud.
            </p>
          </div>
        </article>
      </section>
      <section class="banda--contacto dark">
        <article class="container">
          <h2>
            ¿Tienes alguna pregunta o quieres saber más sobre cómo nuestra
            plataforma puede ayudarte a potenciar tu práctica de nutrición?
          </h2>
          <div class="contacto">
            <p>
              No dudes en contactarnos. Nuestro equipo de expertos estará
              encantado de atenderte y brindarte toda la información que
              necesitas.
            </p>

            <a class="button" href="./contacto.php"
              ><span>Contacta</span>
              <i class="fa-sharp fa-solid fa-arrow-right"></i
            ></a>
          </div>
        </article>
      </section>
    </main>
    <?php include("./partials/footer.php") ?>
  </body>
</html>
