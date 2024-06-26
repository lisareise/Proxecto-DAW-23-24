<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');

$id_paciente = "SELECT id_paciente FROM paciente WHERE user_paciente = '$_SESSION[usuario]'";
$resId = $conexion->query($id_paciente);
if ($resId->num_rows > 0) {
    $row = $resId->fetch_assoc();
    $idPaciente = $row['id_paciente'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e221cb5c78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="stylesheet" href="src/styles/paciente/dashboard.css">
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="src/js/chart.js" defer></script>
    <title>Dashboard del paciente</title>
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
        <li class="selected"><a href="dashboard-paciente.php"><i class="fa-solid fa-table-columns"></i> <span>dashboard</span></a>
        </li>
        <li><a href="ficheros.php"><i class="fa-solid fa-file-invoice"></i>
            <span>ficheros</span></a></li>
        <li><a href="pesaje.php"><i class="fa-solid fa-weight-hanging"></i> <span>pesaje</span></a></a></li>
        <li><a href="notificaciones.php"><i class="fa-solid fa-envelope"></i> <span>notificaciones</span></a></li>
      </ul>
    </aside>
        <section>
            <article class="content">
                <div class="datos">
                    <table>
                        <thead>
                            <th colspan="2">datos personales</th>
                        </thead>
                        <tbody>
                            <?php
                            $datos = "SELECT altura, fecha_nac, direccion, email, telefono FROM paciente
                                WHERE user_paciente = '$_SESSION[usuario]'";
                            $resDatos = $conexion->query($datos);

                            if ($resDatos->num_rows > 0) {
                                while ($fila = $resDatos->fetch_array()) {
                                    echo "<tr>";
                                    echo "<td>Altura</td>";
                                    echo "<td>" . $fila[0] . " cm</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Fecha de nacimiento</td>";
                                    echo "<td>" . $fila[1] . "</td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Dirección</td>";
                                    echo "<td>" . $fila[2] . " </td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>E-Mail</td>";
                                    echo "<td>" . $fila[3] . " </td>";
                                    echo "<tr>";

                                    echo "<tr>";
                                    echo "<td>Teléfono</td>";
                                    echo "<td>" . $fila[4] . " </td>";
                                    echo "<tr>";
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                    <button id="openModalButton">Editar datos</button>
                </div>
                <div class="ficheros">
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <th colspan="2">preview de ficheros</th>
                            </thead>
                            <tbody>
                                <?php

                                $ficheros = "SELECT f.nombre_fichero FROM fichero f 
                                    JOIN paciente p ON f.id_paciente = p.id_paciente 
                                    WHERE p.user_paciente = '$_SESSION[usuario]'";

                                $resFicheros = $conexion->query($ficheros);

                                if ($resFicheros->num_rows > 0) {
                                    while ($fila = $resFicheros->fetch_array()) {
                                        echo "<tr>";
                                        echo "<td><a href = 'archivos/" . $fila[0] . "'>" . $fila[0] . "</a></td>";

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
                </div>
                <div class="grafica">
                    <canvas id="myChart" max-width="500" max-height="400"></canvas>
                </div>
            </article>
        </section>
        <dialog id="modal">
            <h3>Actualiza tus datos</h3>
            <form id="registroForm" method="POST" action="mod-datos.php">
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
            const openModalButton = document.getElementById('openModalButton');
            const closeModalButton = document.getElementById('closeModalButton');
            const myModal = document.getElementById('modal');
            const registroForm = document.getElementById('registroForm');

            openModalButton.addEventListener('click', function(){
              myModal.showModal();
            })

            //Lo cierro con esta funcion para controlar que limpie los mensajes de error después de cerrarlo.
            closeModalButton.addEventListener('click', function () {
                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');
                // Restablecer los valores del formulario
                registroForm.reset();
                myModal.close();
            });

            registroForm.addEventListener('submit', function (event) {
                event.preventDefault(); 

                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');


                const email_value = document.getElementById('user_email_input').value;
                const tel_value = document.getElementById('user_tel_input').value;
                const direccion_value = document.getElementById('user_direccion_input').value;
                fetch('mod-datos.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({

                        'user_email': email_value,
                        'user_tel': tel_value,
                        'user_direccion': direccion_value
                    })
                })
                    .then(response => response.json())
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
                        console.error('Error:', error);
                    });
            });
        });

        //grafica
        async function getChartInfo() {
            const months = {
                1: 'Ene',
                2: 'Feb',
                3: 'Mar',
                4: 'Abr',
                5: 'May',
                6: 'Jun',
                7: 'Jul',
                8: 'Ago',
                9: 'Sep',
                10: 'Oct',
                11: 'Nov',
                12: 'Dic' 
            }

            response = await fetch('datos-grafica.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    'id_usuario': "<?php echo $idPaciente; ?>",


                })
            })

            data = await response.json()
           
            chart_data = new Array(12).fill(null);
            data.forEach(element => {
                peso = parseFloat(element[0])
                mes = parseInt(element[1])
                chart_data[mes - 1] = peso
                
            });

            result = {
                "labels" : Object.values(months),
                "chart_data":chart_data
            }

            return result
        }

        var ctx = document.getElementById("myChart").getContext("2d");


        getChartInfo().then(response => myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: response["labels"],
                datasets: [{
                    label: 'Evolución de peso',
                    data: response["chart_data"]
                }]
            }
        }))

    </script>
</body>

</html>