<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'nutrismart');
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
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
                header("Location: ficha-paciente.php?id_paciente=" . $id_paciente);
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="src/js/chart.js" defer></script>
    <link rel="stylesheet" href="src/styles/main.css" />

    <link rel="stylesheet" href="src/styles/nutricionista/ficha-paciente.css" />
    <link rel="stylesheet" href="src/styles/main-interfaz.css">
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
                <li class="perfil__movil"><i class="fa-solid fa-user fa-fw"></i></li>
                <li><a href="dashboard-nutri.php"><i class="fa-solid fa-table-columns fa-fw"></i>
                        <span>dashboard</span></a>
                </li>
                <li class="selected"><a href="pacientes.php"><i class="fa-solid fa-hospital-user fa-fw"></i>
                        <span>pacientes</span></a></li>
                <li><a href=""><i class="fa-solid fa-calendar-days fa-fw"></i> <span>citas</span></a></a></li>
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
                                            echo "<td>" . $row[0] . "</td>";
                                            echo "<td>" . $row[1] . "</td>";
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
                        <form enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                            method="POST">
                            <input type="file" name="archivo">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
                            <input type="submit" name="send" value="Compartir">
                        </form>
                    </div>
                    <div class="grafica">
                        <canvas id="myChart" width="600" height="300"></canvas>
                    </div>
                </div>

            </article>
        </section>
        <dialog id="modal">
            <form id="mensajeForm" action="enviar-mensaje.php" method="POST">
                <div id="mensaje" class="error"></div>
                <p class="mensaje">
                    <label for="mensaje">Escribir mensaje</label>
                    <textarea name="mensaje" id="mensaje_input"></textarea>
                </p>
                <p class="botones">
                    <input type="reset" value="Cancelar" ">
                    <input type="submit" value="Enviar">
                </p>
            </form>
            <button id="closeModalButton">X</button>
        </dialog>
    </main>
    <?php include ("./partials/footer.php") ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const closeModalButton = document.getElementById('closeModalButton');
            const myModal = document.getElementById('modal');
            const mensajeForm = document.getElementById('mensajeForm');

            //Lo cierro con esta funcion para controlar que limpie los mensajes de error después de cerrarlo.
            closeModalButton.addEventListener('click', function () {
                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');
                // Restablecer los valores del formulario
                mensajeForm.reset();
                myModal.close();
            });

            mensajeForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevenir el comportamiento por defecto del submit

                // Limpiar mensajes de error anteriores
                document.querySelectorAll('.error').forEach(el => el.textContent = '');


                const mensaje_value = document.getElementById('mensaje_input').value;
                fetch('enviar-mensaje.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        'mensaje': mensaje_value,
                        'id_paciente': "<?php echo $id_paciente; ?>"
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
                    'id_usuario': "<?php echo $id_paciente; ?>",


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
                "labels": Object.values(months),
                "chart_data": chart_data
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