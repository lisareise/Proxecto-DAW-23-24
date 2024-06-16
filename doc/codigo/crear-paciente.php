<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
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

    if(empty($data->user_name)){
        $errors["user_name"] = "Introduce un nombre de usuario";
    }

    if(empty($data-> user_pass)){
        $errors["user_pass"] = "Introduce una contraseña";
    }

    if(empty($data-> user_pass_rep)){
        $errors["user_pass_rep"] = "Confirma la contraseña";
    }
    return $errors;
}

function validar($data)
{
    $conexion = new mysqli('localhost', 'root', '', 'nutrismart');
    $errors = [];
    if (!empty($data->new_user) && !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/", $data->new_user)) {
        $errors["new_user"] = "Introduce un nombre válido.";
    }

    if (!empty($data->user_altura) && !is_numeric($data->user_altura)) {
        $errors["user_altura"] = "Introduce una altura válida.";
    }

    if (!empty($data->user_peso) && !is_numeric($data->user_peso)) {
        $errors["user_peso"] = "Introduce un peso válido.";
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

    if (!empty($data->user_tel) && !preg_match("/^\d{9}$/", $data->user_tel)) {
        $errors["user_tel"] = "Introduce un telefono valido.";
    }

    $consultaUser = "SELECT * FROM paciente where user_paciente = '$data->user_name'";
    $resUser = $conexion-> query($consultaUser);
    if($resUser->num_rows>0){
        $errors["user_name"] = "El nombre de usuario ya existe";
    }

    $consultaUserNutri = "SELECT * FROM nutricionista where user_nutri = '$data->user_name'";
    $resUserNutri = $conexion-> query($consultaUserNutri);
    if($resUserNutri->num_rows>0){
        $errors["user_name"] = "El nombre de usuario ya existe";
    }
    
    if(!empty($data->user_pass) && !preg_match('/^.{6,}$/',$data->user_pass)){
        $errors["user_pass"] = "Mínimo 6 caracteres.";
    }

    if(!empty($data->user_pass_rep) && $data->user_pass_rep != $data->user_pass){
        $errors["user_pass_rep"] = "Las contraseñas no coinciden.";
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
$userName = $data-> user_name;
$userPass = $data->user_pass;
$userPassRep = $data->user_pass_rep;

$hashedPass = password_hash($userPass,PASSWORD_DEFAULT);

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

$insert = "INSERT INTO paciente (id_nutri, user_paciente, pass_paciente, nombre_completo, fecha_nac, altura, peso, direccion, email, telefono)
        VALUES ('$num_colegiado', '$userName','$hashedPass','$newUser','$fnac','$altura','$peso','$direccion','$email','$tel')";

if ($con->query($insert) === TRUE) {

    echo json_encode(["success" => "Formulario enviado correctamente."]);
} else {
    echo json_encode(['errors' => ['general' => 'Error al registrar el paciente: ' . $con->error]]);
}

$con->close();

?>