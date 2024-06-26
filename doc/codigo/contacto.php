<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/e221cb5c78.js"
      crossorigin="anonymous"
    ></script>
    <script src="./src/js/header.js" defer></script>
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="stylesheet" href="src/styles/header.css" />
    <link rel="stylesheet" href="src/styles/contacto.css" />
    <title>Contacta con los especialistas de NutriSmart</title>
  </head>
  <body>
    <?php include("./partials/header.php")?>
    <main>
      <section>
        <article class="container texto">
          <h1>Contacta con nosotros</h1>
          <p>
            Si necesitas más información o asesoramiento, no dudes en ponerte en
            contacto con nosotros.
          </p>
          <p>¡Te ayudaremos a resolver todas tus preguntas!</p>
        </article>
      </section>
      <section>
        <article class="container">
          <div class="form__title">
            <h2>Formulario de contacto</h2>
            <div class="formulario">
              <form action="" method="post">
                <div class="form__fields">
                  <div class="form__datos">
                    <p>
                      <label for="nombre_contacto">Nombre completo</label>
                      <input
                        type="text"
                        name="nombre_contacto"
                        id="nombre_contacto"
                      />
                    </p>
                    <p>
                      <label for="telefono_contacto">Teléfono</label>
                      <input
                        type="number"
                        name="telefono_contacto"
                        id="telefono_contacto"
                      />
                    </p>
                    <p>
                      <label for="email_contacto">E-mail</label>
                      <input
                        type="email"
                        name="email_contacto"
                        id="email_contacto"
                      />
                    </p>
                  </div>
                  <p>
                    <label for="mensaje_contacto">Mensaje</label>
                    <textarea id="mensaje_contacto" name="mensaje_contacto">
                    </textarea>
                  </p>
                </div>
                <input
                  type="submit"
                  name="enviar_contacto"
                  id="enviar_contacto"
                  value="Enviar"
                />
              </form>
              <ul class="info">
                <div>
                  <li><h3 class="list__title">Horario</h3></li>
                <ul>
                  <li>lunes a viernes de 9:00am - 20:00pm</li>
                </ul>
                </div>
                <div>
                  <li class="list__title"><h3>Soporte</h3></li>
                <ul class="contact">
                  <li><i class="fa-solid fa-phone"></i> 648 053 711</li>
                  <li>
                    <i class="fa-solid fa-envelope"></i> lisa.reise14@gmail.com
                  </li>
                </ul>
                </div>
                <div>
                   <li class="list__title"><h3>Redes sociales</h3></li>
                <ul class="media">
                  <li><i class="fa-brands fa-square-instagram"></i></li>
                  <li><i class="fa-brands fa-square-x-twitter"></i></li>
                </ul>
                </div>
               
              </ul>
            </div>
        </article>
      </section>
    </main>
    <?php include("./partials/footer.php") ?>
  </body>
</html>
