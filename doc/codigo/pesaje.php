<?php
session_start();
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
  <link rel="stylesheet" href="src/styles/main.css" />
  <link rel="stylesheet" href="src/styles/main-interfaz.css">
  <link rel="stylesheet" href="src/styles/paciente/pesaje.css">
  <title>Tus pesajes</title>
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
        <li><a href="dashboard-paciente.php"><i class="fa-solid fa-table-columns"></i>
            <span>dashboard</span></a>
        </li>
        <li><a href="ficheros.php"><i class="fa-solid fa-file-invoice"></i>
            <span>ficheros</span></a></li>
        <li class="selected"><a href="pesaje.php"><i class="fa-solid fa-weight-hanging"></i>
            <span>pesaje</span></a></a></li>
        <li><a href="notificaciones.php"><i class="fa-solid fa-envelope"></i> <span>notificaciones</span></a></li>
      </ul>
    </aside>
    <section>
      <article class="content">
        <h1>Tus pesos</h1>
        <?php
        $id_paciente = "SELECT id_paciente FROM paciente WHERE user_paciente = '$_SESSION[usuario]'";
        $resId = $conexion->query($id_paciente);
        if ($resId->num_rows > 0) {
          $row = $resId->fetch_assoc();
          $idPaciente = $row['id_paciente'];
        }

        $ultimoPeso = "SELECT * FROM datos WHERE id_paciente ='$idPaciente'
                ORDER BY fecha DESC 
                LIMIT 1";

        $resPeso = $conexion->query($ultimoPeso);
        if ($resPeso->num_rows > 0) {
          $row = $resPeso->fetch_assoc();
          $oldIdPeso = $row["id_peso"];
          $oldFecha = $row["fecha"];
          $oldPeso = $row["peso"];
          
          echo '<h3>Último peso registrado el ' . $row["fecha"] . ' -> ' . $row["peso"] . 'KG.</h3>';?>
          
        <?php }else{
          $oldIdPeso =-1;
          $oldFecha = -1;
          $oldPeso =-1;
         }?>
       <form id="formPeso" action="pesos.php" method="post">
                    <label for = "peso">Registra un nuevo peso</label>
                    <div id="peso" class="error"></div>
                            <input type="text" id="peso_input" name="peso">
                            <input type="hidden" name="oldIdPeso" id="oldIdPeso_input">
                            <input type="hidden" name="oldfecha" id="oldfecha_input">
                            <input type="hidden" name="oldPeso" id="oldPeso_input">
                            <input type="hidden" name="idPaciente" id="idPaciente_input">
                            <input type="submit" value="introducir peso">
                          </form>
      </article>
    </section>
  </main>
  <?php include("./partials/footer.php") ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const formPeso = document.getElementById('formPeso');

    formPeso.addEventListener('submit', function (event) {
      event.preventDefault();

      document.querySelectorAll('.error').forEach(el => el.textContent = '');

      const peso_value = document.getElementById('peso_input').value;

      fetch('pesos.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          'peso': peso_value,
          'oldPeso': "<?php echo $oldPeso;?>",
          'oldIdPeso': "<?php echo $oldIdPeso;?>",
          'oldFecha': "<?php echo $oldFecha;?>",
          'idPaciente': "<?php echo $idPaciente;?>"

        })
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(data.success);
            location.reload();
          } else {
            // Mostrar los errores en el lugar correspondiente
            for (const [field, message] of Object.entries(data.errors)) {
              const errorElement = document.getElementById(`${field}`);
              if (errorElement) {
                errorElement.textContent = message;
              }
            }
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });

    });
    });
  </script>
</body>

</html>