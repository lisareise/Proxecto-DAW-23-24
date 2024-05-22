<?php
$sessionName = 'Nutrismart';
session_start();
    /* require('dashboard-nutri.php'); */
    $conexion = new mysqli('localhost', 'root', '', 'nutrismart');
    /* if ($conexion->connect_errno) {
      die("Falló la conexión: %s\n" . $conexion->connect_error);
    } else {
      echo "La conexión se ha realizado correctamente.<br>";
    } */
    $hayDatos= isset($_POST["usuario"]);
    $hayUser =false;

    if ($hayDatos) {

      $login = $_POST["usuario"];
      $pass = $_POST["pass"];

      $checkPaciente = "SELECT user_paciente FROM paciente WHERE user_paciente ='$login' 
            AND pass_paciente = '$pass'";

      $comprobacionPaciente = $conexion->query($checkPaciente);

      if ($comprobacionPaciente->num_rows == 1) {

        /* echo "usuario paciente encontrado"; */

        $hayUser=true;

        $_SESSION['usuario'] = $login;     

        header("Location: http://localhost/TFC/codigo/dashboard-paciente.php");
      
      } else {

        $checkNutri = "SELECT user_nutri FROM nutricionista WHERE user_nutri ='$login' 
              AND pass_nutri = '$pass'";

        $comprobacionNutri = $conexion->query($checkNutri);

        if ($comprobacionNutri->num_rows == 1) {

          /* echo "usuario nutricionista encontrado"; */
  
          $hayUser=true;
    
          $_SESSION['usuario'] = $login;
            header("Location: http://localhost/TFC/codigo/dashboard-nutri.php"); 
                    
          /* $_SESSION['usuario'] = $login; */            
        }        
      }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
  <script src="./src/js/header.js" defer></script>
  <link rel="stylesheet" href="src/styles/main.css" />
  <link rel="stylesheet" href="src/styles/login.css" />
  <title>Inicia sesión en NutriSmart</title>
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
    <section>
      <article class="container dual">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">         
          <div class="login__form">
            <h1>Inicia sesión</h1>
            <?php
          if($hayDatos && !$hayUser) {
            ?>
            <p style="color:red; font-size:0.9rem;margin-bottom:1rem;">usuario o contraseña incorrectos</p>
          <?php  
          }
          ?>
            <p>
              <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" />
            </p>                 
            <p>
              <label for="pass">Contraseña</label>
              <input type="password" name="pass" id="pass" />
            </p>
            <input type="submit" name="submit" id="submit" value="Iniciar sesión" />
        </form>
        </div>

        <img class="img-cover" src="src/images/login.png" alt="imagen de inicio de sesion" />
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