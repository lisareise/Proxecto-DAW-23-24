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
  <link rel="stylesheet" href="src/styles/nutricionista/pacientes.css">
  <title>Tus pacientes</title>
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
        <li><a href="dashboard-nutri.php"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a></li>
        <li class="selected"><a href="pacientes.php"><i class="fa-solid fa-hospital-user"></i>
            <span>pacientes</span></a></li>
        <li><a href=""><i class="fa-solid fa-calendar-days"></i> <span>citas</span></a></a></li>
      </ul>
    </aside>
    <section>
      <?php
      $idNutri = "SELECT p.id_paciente, p.nombre_completo, 
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
                  echo "<td><a href='ficha-paciente.php?id_paciente=".$fila[0]."'>" . $fila[1] . "</a></td>";
                  echo "<td>". $fila[2] . "</td>";
                  echo "<td>" . $fila[3] . "</td>";
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
        <div class="botones">
          <button onclick="window.modal.showModal();" class="anhadir"">añadir
            paciente</button>
          <a class="eliminar" href="borrar-pacientes.php">eliminar paciente</a>
        </div>
      </article>
    </section>
    <dialog id="modal">
      <h3>Datos del nuevo paciente</h3>
      <form id="registroForm" method="POST" action="crear-paciente.php">
        <p>
        <div id="new_user" class="error"></div>
        <input type="text" name="new_user" id="new_user_input" placeholder="nombre completo">
        </p>      
        <p>
        <div id="user_altura" class="error"></div>
        <input type="text" name="user_altura" id="user_altura_input" placeholder="altura (cm)">
        </p>
        <p>
        <div id="user_peso" class="error"></div>
        <input type="text" name="user_peso" id="user_peso_input" placeholder="peso (kg)">
        </p>
        <p>
        <div id="user_fnac" class="error"></div>
        <label for="user_fnac">fecha de nacimiento</label>
        <input type="date" name="user_fnac" id="user_fnac_input">
        </p>
        <p>

        <div id="user_email" class="error"></div>
        <input type="text" name="user_email" id="user_email_input" placeholder="email@paciente.com">
        </p>
        <p>

        <div id="user_tel" class="error"></div>
        <input type="text" name="user_tel" id="user_tel_input" placeholder="teléfono">
        </p>
        <p>
        <div id="user_direccion" class="error"></div>
        <input type="text" name="user_direccion" id="user_direccion_input" placeholder="dirección">
        </p>
        <h3>Datos de usuario</h3>
        <p>
        <div id="user_name" class="error"></div>
        <input type="text" name="user_name" id="user_name_input" placeholder="@nombre_usuario">
        </p>
        <p>
          <div id="user_pass" class="error"></div>
          <label for="user_pass">contraseña</label>
          <input type="password" name="user_pass" id="user_pass_input">
        </p>
        <p>
          <div id="user_pass_rep" class="error"></div>
          <label for="user_pass_rep">repite la contraseña</label>
          <input type="password" name="user_pass_rep" id="user_pass_rep_input">
        </p>
        <p class="buttons">
          <input type="reset" value="Borrar datos">
          <input type="submit" value="Confirmar">
        </p>
      </form>
      <button type="button" id="closeModalButton"><i class="fa-solid fa-x"></i></button>
    </dialog>
  </main>
  <?php include("./partials/footer.php") ?>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            const closeModalButton = document.getElementById('closeModalButton');
            const myModal = document.getElementById('modal');
            const registroForm = document.getElementById('registroForm');

            //Lo cierro con esta funcion para controlar que limpie los mensajes de error después de cerrarlo.
            closeModalButton.addEventListener('click', function () {
                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');
                // Restablecer los valores del formulario
                registroForm.reset();
                myModal.close();
            });

            registroForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevenir el comportamiento por defecto del submit

                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');
                
                const name_value = document.getElementById('new_user_input').value;
                const altura_value = document.getElementById('user_altura_input').value;
                const peso_value = document.getElementById('user_peso_input').value;
                const fnac_value = document.getElementById('user_fnac_input').value;
                const email_value = document.getElementById('user_email_input').value;
                const tel_value = document.getElementById('user_tel_input').value;
                const direccion_value = document.getElementById('user_direccion_input').value; 
                const user_value = document.getElementById('user_name_input').value;
                const pass_value = document.getElementById('user_pass_input').value;
                const pass_rep_value = document.getElementById('user_pass_rep_input').value;   

                fetch('crear-paciente.php', {
                    method: 'POST',
                    headers:{
                      'Content-Type': 'application/json',
                      'Accept': 'application/json'
                    },
                    body: JSON.stringify( {
                      'new_user' : name_value,
                      'user_altura' : altura_value,
                      'user_peso' : peso_value,
                      'user_fnac' : fnac_value,
                      'user_email' : email_value,
                      'user_tel' : tel_value,
                      'user_direccion' :direccion_value,
                      'user_name' : user_value,
                      'user_pass' : pass_value,
                      'user_pass_rep' : pass_rep_value 
                    })
                })
                .then(response => response.json() )
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alert(data.success);
                        myModal.close();
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
                    console.error('Error:',error);
                });
            });
        });
    </script>
</body>
</html>