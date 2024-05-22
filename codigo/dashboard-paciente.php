<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
    <script src="./src/js/header.js" defer></script>
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
    <link rel="stylesheet" href="src/styles/paciente/dashboard.css">
    <title>Dashboard del paciente</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <img class="nav__logo" src="./src/images/logo-nutrismart.png" alt="NutriSmart" />
                <ul class="nav-menu">
                    <li class="nav__item">
                        <a class="nav__link" href="./landing.html">Inicio</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="./noticias.html">Noticias</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="./contacto.html">Contacto</a>
                    </li>
                    <li class="nav__item login-nav">
                        <a class="nav__link" href="./login.html">Iniciar sesión</a>
                    </li>
                </ul>
                <a href="login.html" class="login"><i class="fa-regular fa-user"></i></a>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <aside class="menu__secundario">
            <div class="perfil">
                <img src="src/images/fotoPerfilNutricionista.jpg" alt="foto de perfil" />
                <span class="nombre-usuario" style="display: block">@<?php echo $_SESSION['usuario']?></span>
            </div>
            <ul class="menu--items">
                <li class="perfil__movil"><i class="fa-solid fa-user"></i></li>
                <li class="selected" ><a href="dashboard-nutri.html"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a>
                </li>
                <li><a href="ficheros.html"><i class="fa-solid fa-file-invoice"></i>
                        <span>ficheros</span></a></li>
                <li><a href="pesaje.html"><i class="fa-solid fa-weight-hanging"></i> <span>pesaje</span></a></a></li>
                <li><a href="notificaciones.html"><i class="fa-solid fa-envelope"></i> <span>notificaciones</span></a></li>
            </ul>
        </aside>
        <section>
            <article class="content">
                <div class="datos">
                    <table>
                        <thead>
                            <th rowspan="2">datos personales</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Altura</td>
                                <td>160 cm</td>
                            </tr>
                            <tr>
                                <td>Fecha de nacimiento</td>
                                <td>14 mar 2003</td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td>calle Balea 20b, O Grove</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>nombre@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td>648 053 711</td>
                            </tr>
                        </tbody>
                    </table>
                    <button>Editar datos</button>
                </div>
                <div class="ficheros">
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <th colspan="2">preview de ficheros</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                                <tr>
                                    <td>fichero 1</td>
                                    <td>4 dic 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="grafica">
                    <p>evolución de peso</p>
                    <img src="src/images/ej-grafica-peso.webp" alt="">
                </div>
            </article>
        </section>
    </main>
    <footer>
        <article class="container__footer">
          <div class="legal">
            <p>Aviso legal</p>
            <p>Política de privacidad y uso de cookies</p>
          </div>
          <span></span>
          <div class="social">
            <p><i class="fa-solid fa-feather-pointed"></i> Lisa Reise</p>
            <div>
              <p><i class="fa-brands fa-instagram"></i></p>
              <p><i class="fa-brands fa-x-twitter"></i></p>
            </div>
          </div>
        </article>
      </footer>
</body>

</html>