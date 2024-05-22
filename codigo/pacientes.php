<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');

$sql = "SELECT SUBSTRING_INDEX(nombre_completo,' ',1) AS nombre,
  SUBSTRING_INDEX(SUBSTRING_INDEX(nombre_completo,' ',2),' ',-1) AS apellido
  FROM nutricionista WHERE user_nutri ='$_SESSION[usuario]'";

$result = $conexion->query($sql);
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
  <link rel="stylesheet" href="src/styles/nutricionista/pacientes.css">
  <title>Tus pacientes</title>
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
        <span class="nombre-usuario" style="display: block">@<?php echo $_SESSION['usuario'] ?></span>
      </div>
      <ul class="menu--items">
        <li class="perfil__movil"><i class="fa-solid fa-user"></i></li>
        <li><a href="dashboard-nutri.php"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a></li>
        <li class="selected"><a href="pacientes.php"><i class="fa-solid fa-hospital-user"></i>
            <span>pacientes</span></a></li>
        <li><a href=""><i class="fa-solid fa-calendar-days"></i> <span>citas</span></a></a></li>
      </ul>
    </aside>
    <section>
      <?php
      $idNutri = "SELECT p.nombre_completo, 
            TIMESTAMPDIFF(YEAR,fecha_nac, CURDATE()) - (DATE_FORMAT(CURDATE(),'%m%d') < DATE_FORMAT(fecha_nac,'%m%d')) AS edad,
            p.fecha_nac
            FROM paciente p 
            JOIN nutricionista n ON p.id_nutri = n.num_colegiado 
            WHERE n.user_nutri = '$_SESSION[usuario]'";
      $residNutri = $conexion->query($idNutri);
      ?>
      <article class="content">
        <h1>Tus pacientes</h1>
        <form action="">
          <input type="search" placeholder="Buscar un paciente" id="Buscador">
        </form>
        <div class="table-wrapper">
          <table class="pacientes">
            <thead>
              <th class="nombre">nombre</th>
              <th>edad</th>
              <th class="nacimiento">nacimiento</th>
            </thead>
            <tbody>
              <?php
              if ($residNutri->num_rows > 0) {

                while ($fila = $residNutri->fetch_array()) {

                  echo "<tr>";
                  echo "<td>" . $fila[0] . "</td>";
                  echo "<td>" . $fila[1] . "</td>";
                  echo "<td>" . $fila[2] . "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr>";
                echo "<td colspan='2' style='text-align:center;'>Aún no tiene pacientes</td>";
                echo "</tr>";
              }
              ?>
            </tbody>

          </table>
        </div>
        <div class="botones">
          <button onclick="window.modal.showModal();" class="anhadir" href="nuevo-paciente.html">añadir
            paciente</button>
          <button class="eliminar" href="">eliminar paciente</button>
        </div>
      </article>
    </section>

    <dialog id="modal">
      <h3>Datos del nuevo paciente</h3>
      <form method="post" action="crear-paciente.php">
        <p>
          <?php if (isset($_SESSION['errors']['new_user'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['new_user']; ?></p>
        <?php endif; ?>
        <input type="text" name="new_user" id="new_user" placeholder="nombre completo">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_altura'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_altura']; ?></p>
        <?php endif; ?>
        <input type="text" name="user_altura" id="user_altura" placeholder="altura (cm)">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_peso'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_peso']; ?></p>
        <?php endif; ?>
        <input type="text" name="user_peso" id="user_peso" placeholder="peso (kg)">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_fnac'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_fnac']; ?></p>
        <?php endif; ?>
        <label for="user_fnac">fecha de nacimiento</label>
        <input type="date" name="user_fnac" id="user_fnac">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_email'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_email']; ?></p>
        <?php endif; ?>
        <input type="email" name="user_email" id="user_email" placeholder="email@paciente.com">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_tel'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_tel']; ?></p>
        <?php endif; ?>
        <input type="text" name="user_tel" id="user_tel" placeholder="teléfono">
        </p>
        <p>
          <?php if (isset($_SESSION['errors']['user_direccion'])): ?>
          <p style="color: red; font-size:0.7rem;"><?php echo $_SESSION['errors']['user_direccion']; ?></p>
        <?php endif; ?>
        <input type="text" name="user_direccion" id="user_direccion" placeholder="dirección">
        </p>
        <p class="buttons">
          <input type="reset" value="Cancelar">
          <input type="submit" value="Confirmar">
        </p>
      </form>
      <button onclick="window.modal.close();">cerrar</button>
      <?php
      // Limpiar los errores después de mostrarlos
      unset($_SESSION['errors']);
      ?>
    </dialog>
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