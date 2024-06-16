<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
$con = new mysqli('localhost', 'root', '', 'nutrismart');

// Get the JSON contents
$json = file_get_contents('php://input');

// decode the json data
$data = json_decode($json);

$errors = [];


if(empty($data->peso)){
    $errors["peso"] = "Debes introducir un peso.";
}

if (!empty($data->peso) && !is_numeric($data->peso)) {

    $errors["peso"] = "El peso debe ser un número para registrarlo.";
}

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    exit;
}

$peso = $data->peso;
$oldPeso = $data->oldPeso;
$oldIdPeso = $data->oldIdPeso;
$oldFecha = $data->oldFecha;
$idPaciente = $data->idPaciente;


if (isset($oldIdPeso) && !empty($oldIdPeso) && $oldPeso != -1) {

    $arrayHoy = getdate();

    $fechaAnterior = explode("-", $oldFecha);

    if ($arrayHoy["mon"] == intval($fechaAnterior[1]) && $arrayHoy["year"] == intval($fechaAnterior[0])) {
        $consulta = "UPDATE datos SET 
                fecha = CURDATE(),
                peso = '$peso'
                WHERE id_peso = '$oldIdPeso'";

        if ($con->query($consulta) === TRUE) {
            echo json_encode(["success" => "Peso actualizado correctamente."]);
        } else {
            echo json_encode(['errors' => ['general' => 'Error al actualizar el peso' . $con->error]]);
        }
    } else {

        $Insertpeso = "INSERT INTO datos (id_paciente, fecha, peso)
        VALUES ('$idPaciente',CURDATE(),'$peso')";


        if ($con->query($Insertpeso) === TRUE) {
            echo json_encode(["success" => "Peso insertado correctamente."]);
        } else {
            echo json_encode(['errors' => ['general' => 'Error al insertar el peso.' . $con->error]]);
        }


    }

} else {
    $Insertpeso = "INSERT INTO datos (id_paciente, fecha, peso)
        VALUES ('$idPaciente',CURDATE(),'$peso')";

    if ($con->query($Insertpeso) === TRUE) {
        echo json_encode(["success" => "Peso insertado correctamente."]);
    } else {
        echo json_encode(['errors' => ['general' => 'Error al insertar el peso.' . $con->error]]);
    }
}



