<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location: login.php");
}
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');

$sql = "SELECT SUBSTRING_INDEX(nombre_completo,' ',1) AS nombre,
  SUBSTRING_INDEX(SUBSTRING_INDEX(nombre_completo,' ',2),' ',-1) AS apellido
  FROM nutricionista WHERE user_nutri ='$_SESSION[usuario]'";

$result = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
  <script src="./src/js/header.js" defer></script>
  <link rel="stylesheet" href="src/styles/main.css" />
  <link rel="stylesheet" href="src/styles/nutricionista/dashboard.css" />
  <link rel="stylesheet" href="src/styles/main-interfaz.css">
  <title>Dashboard del profesional</title>
</head>

<body>
<?php include("./partials/header-interfaz.php") ?>
  <main>
    <aside class="menu__secundario">
      <div class="perfil">
        <img src="src/images/fotoPerfilNutricionista.jpg" alt="foto de perfil" />
        <span class="nombre-usuario" style="display: block">@<?php echo $_SESSION['usuario']?></span>
      </div>
      <ul class="menu--items">
        <li class="perfil__movil"><i class="fa-solid fa-user"></i></li>
        <li class="selected"><a href=""><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a></li>
        <li><a href="pacientes.php"><i class="fa-solid fa-hospital-user"></i> <span>pacientes</span></a></li>
        <li><a href=""><i class="fa-solid fa-calendar-days"></i> <span>citas</span></a></a></li>
      </ul>
    </aside>
    <section>
      <article class="content">
        <h1 class="welcome">¡Te damos la bienvenida, <br>Dr. 
          <?php if($result->num_rows>0){

          while($row = $result->fetch_assoc()){

            echo $row["nombre"]." ".$row["apellido"];

          }}?>!</h1>

          <?php
            $idNutri = "SELECT p.nombre_completo, p.fecha_nac FROM paciente p 
            JOIN nutricionista n ON p.id_nutri = n.num_colegiado 
            WHERE n.user_nutri = '$_SESSION[usuario]'";
            $residNutri= $conexion->query($idNutri);
          ?>
        <img src="src/images/calendarioProv.jpg" alt="calendario provisional" />
        <div class="table-wrapper">
          <table class="pacientes">
            <thead>
              <th colspan="2">Preview de pacientes</th>
            </thead>
            <tbody>
              <?php
              if($residNutri->num_rows>0){

                while($fila = $residNutri->fetch_array()){
      
                  echo"<tr>";
                  echo"<td>".$fila[0]."</td>";
                  echo"<td>".$fila[1]."</td>";
                  echo"</tr>";
                }}else{
                  echo"<tr>";
                  echo"<td colspan='2' style='text-align:center;'>Aún no tiene pacientes</td>";
                  echo"</tr>";
                }
              ?>             
            </tbody>
          </table>
        </div>

        <table class="consultas">
          <thead>
            <th>Tus consultas de hoy</th>
          </thead>
          <tbody>
            <tr>
              <td>Miller Skyes</td>
              <td>09:30 a.m</td>
            </tr>
            <tr>
              <td>Miller Skyes</td>
              <td>09:30 a.m</td>
            </tr>
            <tr>
              <td>Miller Skyes</td>
              <td>09:30 a.m</td>
            </tr>
          </tbody>
        </table>
      </article>
    </section>
  </main>
  <?php include("./partials/footer.php") ?>
</body>

</html>