<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
function obligatorios($data)
{
    $errors = [];
    if (empty($data->user_email)) {
        $errors["user_email"] = "Introduce un nuevo e-mail";
    }
    if (empty($data->user_tel)) {
        $errors["user_tel"] = "Introduce un nuevo numero de telefono";
    }
    if (empty($data->user_direccion)) {
        $errors["user_direccion"] = "Introduce una nueva direccion";
    }
    return $errors;
}

function validar($data)
{
    $errors = [];
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


$email = $data->user_email;
$tel = $data->user_tel;
$direccion = $data->user_direccion;

$con = new mysqli('localhost', 'root', '', 'nutrismart');
if ($con->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$update = "UPDATE paciente SET
email = '$email',
telefono = $tel,
direccion = '$direccion'";

if ($con->query($update) === TRUE) {

    echo json_encode(["success" => "Datos modificados correctamente"]);
} else {
    echo json_encode(['errors' => ['general' => 'Error al modificar los datos: ' . $con->error]]);
}

$con->close();

?>