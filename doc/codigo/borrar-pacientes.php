<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location: login.php");
}
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
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
  <link rel="stylesheet" href="src/styles/main-interfaz.css">
  <link rel="stylesheet" href="src/styles/nutricionista/pacientes.css">
  <link rel="stylesheet" href="src/styles/nutricionista/borrar-pacientes.css">
  <title>Tus pacientes</title>
</head>

<body>
  <?php include ("./partials/header-interfaz.php") ?>
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
      $idNutri = "SELECT p.id_paciente, p.nombre_completo, p.fecha_nac
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
        <form id="borrarForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="table-wrapper">
            <table class="pacientes">
              <thead>
                <th class="nombre">nombre</th>
                <th>nacimiento</th>
                <th>Selección</th>
              </thead>
              <tbody>
                <?php
                if ($residNutri->num_rows > 0) {

                  while ($fila = $residNutri->fetch_array()) {

                    echo "<tr>";
                    echo "<td>" . $fila[1] . "</td>";
                    echo "<td>" . $fila[2] . "</td>";
                    echo "<td><input type='checkbox' name='borrar[]' value='" . $fila[0] . "'/></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr>";
                  echo "<td colspan='3' style='text-align:center;'>Aún no tiene pacientes</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <input type="submit" name="enviar" value="Borrar seleccionados">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])) {
          if (!empty($_POST["borrar"])) {
            foreach ($_POST['borrar'] as $id) {
              //se borran todos los ficheros relacionados con el paciente
              $consultaFichero = "DELETE FROM fichero where id_paciente ='$id'";
              $conexion->query($consultaFichero);
              //se borran todos los mensajes relacionados con el paciente
              $consultaMensaje = "DELETE FROM mensaje where id_paciente ='$id'";
              $conexion->query($consultaMensaje);

              $consultaDatos = "DELETE FROM datos where id_paciente ='$id'";
              $conexion->query($consultaDatos);

              $consultaPaciente = "DELETE FROM paciente WHERE id_paciente ='$id'";
              $conexion->query($consultaPaciente);

              echo '<script type="text/javascript">              
              
              alert("Pacientes borrados con éxito.");
              window.location.href = "/TFC/codigo/borrar-pacientes.php";
              </script>';
            }
          } else {
            echo '<script type="text/javascript">
      alert("Debes seleccionar al menos un paciente.");                       
          </script>';
          }
        }
        ?>
      </article>
    </section>
  </main>
  <?php include ("./partials/footer.php") ?>
</body>
</html>