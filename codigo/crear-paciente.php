<?php
session_start();
function obligatorios($data)
{
    $errors = [];
    if (empty($data->new_user)) {
        $errors["new_user"] = "Introduce el nombre completo del paciente.";
    }

    if (empty($data->user_altura)) {
        $errors["user_altura"] = "Introduce la altura del paciente.";
    }

    if (empty($data->user_peso)) {
        $errors["user_peso"] = "Introduce el peso del paciente.";
    }
    if (empty($data->user_fnac)) {
        $errors["user_fnac"] = "Introduce una fecha de nacimiento.";
    }
    if (empty($data->user_email)) {
        $errors["user_email"] = "Introduce el e-mail del paciente.";
    }
    if (empty($data->user_tel)) {
        $errors["user_tel"] = "Introduce un numero de telefono";
    }
    if (empty($data->user_direccion)) {
        $errors["user_direccion"] = "Introduce una dirección.";
    }
    return $errors;
}

function validar($data)
{
    $errors = [];
    if (!empty($data->new_user) && !preg_match("/^[a-zA-Z\s]+$/", $data->new_user)) {
        $errors["new_user"] = "Introduce un nombre válido.";
    }

    if (!empty($data->user_altura) && !is_numeric($data->user_altura)) {
        $errors["user_altura"] = "Introduce una altura válida.";
    }

    if (!empty($data->user_peso) && !strpos($data->user_peso, '.')) {
        $errors["user_peso"] = "Introduce un peso válido. (decimal)";
    }

    if (!empty($data->user_fnac)) {
        $fecha = explode('-', $data->user_fnac);
        if ((!count($fecha) == 3) || !checkdate($fecha[1], $fecha[2], $fecha[0])) {
            $errors["user_fnac"] = "Introduce una fecha de nacimiento válida.";
        }
    }

    if (!empty($data->user_email) && !filter_var($data->user_email, FILTER_VALIDATE_EMAIL)) {
        $errors["user_email"] = "Introduce un E-mail valido.";
    }

    if (!empty($data->user_tel) && !preg_match("/^[0-9]{9}/", $data->user_tel)) {
        $errors["user_tel"] = "Introduce un telefono valido.";
    }
    return $errors;
}

// Get the JSON contents
$json = file_get_contents('php://input');


// decode the json data
$data = json_decode($json);


//une los mensajes de error de las dos funciones
$errors = array_merge(obligatorios($data), validar($data));

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]); 
    exit;
}

$newUser = $data->new_user;
$altura = $data->user_altura;
$peso = $data->user_peso;
$fnac = $data->user_fnac;
$email = $data->user_email;
$tel = $data->user_tel;
$direccion = $data->user_direccion;

$con = new mysqli('localhost', 'root', '', 'nutrismart');
if ($con->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$sqlNutri = "SELECT num_colegiado FROM nutricionista where user_nutri = '$_SESSION[usuario]'";
$resNutri = $con->query($sqlNutri);
if ($resNutri->num_rows > 0) {
    $row = $resNutri->fetch_assoc();
    $num_colegiado = $row['num_colegiado'];
}

$insert = "INSERT INTO paciente (id_nutri, nombre_completo, fecha_nac, altura, peso, direccion, email, telefono)
        VALUES ('$num_colegiado','$newUser','$fnac','$altura','$peso','$direccion','$email','$tel')";

if ($con->query($insert) === TRUE) {

    echo json_encode(["success" => "Formulario enviado correctamente."]);
} else {
    echo json_encode(['errors' => ['general' => 'Error al registrar el paciente: ' . $con->error]]);
}

$con->close();

?>