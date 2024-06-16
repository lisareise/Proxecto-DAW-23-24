<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');
if(!isset($_SESSION['usuario'])){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
  <script src="./src/js/header.js" defer></script>
  <link rel="stylesheet" href="src/styles/main.css" />
  <link rel="stylesheet" href="src/styles/paciente/ficheros.css" />
  <link rel="stylesheet" href="src/styles/main-interfaz.css">
  <title>Tus ficheros</title>
</head>

<body>
<?php include("./partials/header-interfaz.php") ?>
  <main>
    <aside class="menu__secundario">
      <div class="perfil">
        <img src="src/images/fotoPerfilNutricionista.jpg" alt="foto de perfil" />
        <span class="nombre-usuario" style="display: block">@<?php echo $_SESSION['usuario'] ?></span>
      </div>
      <ul class="menu--items">
        <li class="perfil__movil"><i class="fa-solid fa-user"></i></li>
        <li><a href="dashboard-paciente.php"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a>
        </li>
        <li class="selected"><a href="ficheros.php"><i class="fa-solid fa-file-invoice"></i>
            <span>ficheros</span></a></li>
        <li><a href="pesaje.php"><i class="fa-solid fa-weight-hanging"></i> <span>pesaje</span></a></a></li>
        <li><a href="notificaciones.php"><i class="fa-solid fa-envelope"></i> <span>notificaciones</span></a></li>
      </ul>
    </aside>
    <section>
      <article class="content">
        <h1>Tus ficheros</h1>
        <form action="">
          <input type="search" placeholder="Buscar un fichero" id="Buscador">
        </form>
        <div class="table-wrapper">
          <table class="ficheros">
            <thead>
              <th class="nombre">nombre</th>
              <th class="fecha">fecha</th>
            </thead>
            <tbody>
              <?php

              $ficheros = "SELECT f.nombre_fichero, f.fecha FROM fichero f 
    JOIN paciente p ON f.id_paciente = p.id_paciente 
    WHERE p.user_paciente = '$_SESSION[usuario]'";

              $resFicheros = $conexion->query($ficheros);

              if ($resFicheros->num_rows > 0) {
                while ($fila = $resFicheros->fetch_array()) {
                  echo "<tr>";
                  echo "<td><a href = 'archivos/" . $fila[0] . "'>" . $fila[0] . "</a></td>";
                  echo "<td>".$fila[1]."</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr>";
                echo "<td colspan='2' style='text-align:center;'>No hay ficheros todavía</td>";
                echo "</tr>";
              }
              ?>              
            </tbody>

          </table>
        </div>
      </article>
    </section>
  </main>
  <?php include("./partials/footer.php") ?>
</body>

</html>