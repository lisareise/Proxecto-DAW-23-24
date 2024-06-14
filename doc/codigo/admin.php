<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="stylesheet" href="src/styles/admin.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="container">
      <nav class="navbar">
        <img class="nav__logo" src="./src/images/logo-nutrismart.png" alt="NutriSmart" />

        <?php
        if (isset($_SESSION['usuario'])) {
          echo '<a href="cerrar-sesion.php" class="login"><i class="fa-solid fa-right-from-bracket"></i></a>';
        } else {
          echo '<a href="login.php" class="login"><i class="fa-regular fa-user"></i></a>';
        }
        ?>
      </nav>
    </div>
  </header>
  <section>
    <article class="content">
        <h1>Pacientes sin usuario</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Nombre completo</th>
                    <th>E-mail</th>
                </thead>
                <tbody>
                    <?php
                    $usuarios = "SELECT id_paciente, nombre_completo, email FROM paciente where user_paciente and pass_paciente is NULL";
                    $resUsers = $conexion->query($usuarios);
                    if($resUsers->num_rows>0){
                        while($fila = $resUsers -> fetch_array()){
                            echo"<tr>
                                <td>".$fila[0]."</td>
                                <td>".$fila[1]."</td>
                                <td>".$fila[2]."</td>
                            </tr>";
                        }
                    }else{
                        echo "<tr>
                                <td colspan='3' style='text-align:center;>No hay usuarios disponibles</td>
                            </tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </article>
  </section>
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