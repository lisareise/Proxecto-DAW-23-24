<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');

$id_paciente = $_GET['id_paciente'];
//Consulta para obtener los datos del paciente
$recogidaDatos = "SELECT p.nombre_completo, p.fecha_nac, p.altura, p.peso, p.direccion, p.email, p.telefono 
FROM paciente p
JOIN nutricionista n ON p.id_nutri = n.num_colegiado 
WHERE n.user_nutri = '$_SESSION[usuario]' AND p.id_paciente = '$id_paciente'";
$result = $conexion->query(($recogidaDatos));

//Comprobaciones para el funcionamiento de subir y almacenar los archivos en la base de datos.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])) {
    if (!empty($_FILES["archivo"]["name"])) {
        $directorio = 'archivos/';
        //El nombre que se guardará en la base de datos y que se mostrará en la web
        $nombreFichero = basename($_FILES['archivo']['name']);
        $ruta = $directorio . basename($_FILES['archivo']['name']);


        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)) {

            $fichero = $ruta;

            //obtenemos el id del nutricionista 
            $nutri = "SELECT num_colegiado FROM nutricionista WHERE user_nutri = '$_SESSION[usuario]'";
            $resNutri = $conexion->query($nutri);
            if ($resNutri->num_rows > 0) {
                $row = $resNutri->fetch_assoc();
                $num_colegiado = $row['num_colegiado'];
            }

            $insert = "INSERT INTO fichero (id_nutri, id_paciente, nombre_fichero, fecha) VALUES (
                '$num_colegiado','$id_paciente','$nombreFichero', CURDATE())";

            if ($conexion->query($insert) === TRUE) {
                echo '<script type="text/javascript">
                    alert("Archivo subido exitosamente.");      
                        </script>';
            } else {
                echo '<script type="text/javascript">
                     alert("El archivo no se ha podido subir.");                       
                         </script>';
            }

        } else {
            echo '<script type="text/javascript">
        alert("No se pudo subir el archivo.");
        </script>';
        }

    } else {
        echo '<script type="text/javascript">
        alert("Debes seleccionar un Archivo.");
        </script>';
    }

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
    <link rel="stylesheet" href="src/styles/nutricionista/ficha-paciente.css" />
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
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
                <li><a href="dashboard-nutri.php"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a>
                </li>
                <li class="selected"><a href="pacientes.php"><i class="fa-solid fa-hospital-user"></i>
                        <span>pacientes</span></a></li>
                <li><a href=""><i class="fa-solid fa-calendar-days"></i> <span>citas</span></a></a></li>
            </ul>
        </aside>
        <section>
            <article class="content">
                <div class="titulo">
                    <h4>tus pacientes >
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_array()) {
                                echo $row[0] . "</h4>"; ?>


                                <button onclick="window.modal.showModal();"><span class="texto">enviar mensaje</span> <i
                                        class="fa-regular fa-envelope"></i></button>
                        </div>
                        <div class="ordenacion">
                            <table class="datos">
                                <thead>
                                    <th colspan="2">datos personales</th>
                                </thead>
                                <tbody>
                                    <?php
                                    echo "<tr>";
                                    echo "<td>Altura</td>";
                                    echo "<td>" . $row[2] . " cm</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Peso inicial</td>";
                                    echo "<td>" . $row[3] . " kg</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Fecha de nacimiento</td>";
                                    echo "<td>" . $row[1] . "</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>E-mail</td>";
                                    echo "<td>" . $row[5] . "</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Teléfono</td>";
                                    echo "<td>" . $row[6] . "</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Dirección</td>";
                                    echo "<td>" . $row[4] . "</td>";
                                    echo "<tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="ficheros">
                        <div class="table-wrapper">
                            <table class="tabla-ficheros">
                                <thead>
                                    <th colspan="2">ficheros compartidos</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $ficheros = "SELECT nombre_fichero, fecha FROM fichero WHERE id_paciente = $id_paciente";
                                    $resFicheros = $conexion->query($ficheros);
                                    if ($resFicheros->num_rows > 0) {
                                        while ($row = $resFicheros->fetch_array()) {
                                            echo "<tr>";
                                            echo "<td>".$row[0]."</td>";
                                            echo "<td>".$row[1]."</td>";
                                            echo "</tr>";
                                        }
                                    }else{
                                        echo "<tr>";                                   
                                            echo "<td colspan='2' style='text-align:center;'>No hay ficheros todavía</td>";
                                            echo "</tr>";
                                    }
                                    ?>                                   
                                </tbody>
                            </table>
                        </div>
                        <form enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                            method="POST">
                            <input type="file" name="archivo">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
                            <input type="submit" name="send" value="Compartir">
                        </form>
                    </div>
                    <div class="grafica">
                        <p>evolución de peso</p>
                        <img src="src/images/ej-grafica-peso.webp" alt="">
                    </div>
                </div>

            </article>
        </section>
        <dialog id="modal">
            <form action="" method="POST">
                <p class="mensaje">
                    <label for="mensaje">Escribir mensaje</label>
                    <textarea name="mensaje" id="mensaje"></textarea>
                </p>
                <p class="botones">
                    <input type="reset" value="Cancelar" onclick="window.modal.close();">
                    <input type="submit" value="Enviar" onclick="window.modal.close();">
                </p>


            </form>
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