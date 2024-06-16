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
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
    <link rel="stylesheet" href="src/styles/paciente/notificaciones.css">
    <title>Tus notificaciones</title>
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
                <li><a href="pesaje.php"><i class="fa-solid fa-weight-hanging"></i>
                        <span>pesaje</span></a></a></li>
                <li class="selected"><a href="notificaciones.php"><i class="fa-solid fa-envelope"></i>
                        <span>notificaciones</span></a></li>
            </ul>
        </aside>
        <section>
            <article class="content">
                <h1>Tus notificaciones</h1>
                <div class="table-wrapper">
                    <table>
                        <tbody>

                        <?php
                        $mensajes = "SELECT m.contenido, m.fecha, n.nombre_completo FROM mensaje m
                        JOIN paciente p ON m.id_paciente = p.id_paciente
                        JOIN nutricionista n ON m.id_nutri = n.num_colegiado
                        WHERE p.user_paciente = '$_SESSION[usuario]'
                        ORDER BY m.fecha DESC";

                        $resMensajes = $conexion ->query($mensajes);

                        if($resMensajes ->num_rows >0){
                            while($fila = $resMensajes->fetch_array()){
                                echo '<tr>
                                        <td>
                                            <div class="mensaje">
                                                <span>'.$fila[2].'</span>
                                                <span>'.$fila[1].'</span>
                                            </div>
                                            <p>'.$fila[0].'</p>
                                        </td>
                                        </tr>';                                              
                            }
                        }else{
                            echo'<tr>
                                    <td style="text-align:center;"> Aún no tienes notificaciones </td>
                                </tr>';
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