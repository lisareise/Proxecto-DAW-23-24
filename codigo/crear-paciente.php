<?php
session_start();
function obligatorios()
{
    $errors =[];
    if (empty($_POST["new_user"])) {
        $errors["new_user"]="Introduce el nombre completo del paciente.";
    }

    if (empty($_POST["user_altura"])) {
       $errors["user_altura"] = "Introduce la altura del paciente.";
    }

    if (empty($_POST["user_peso"])) {
        $errors["user_peso"] = "Introduce el peso del paciente.";
    }
    if (empty($_POST["user_fnac"])) {
        $errors["user_fnac"] = "Introduce una fecha de nacimiento.";
    }
    if (empty($_POST["user_email"])) {
        $errors["user_email"] = "Introduce el e-mail del paciente.";
    }
    if (empty($_POST["user_tel"])) {
        $errors["user_tel"] = "Introduce la fecha de nacimiento.";
    }
    if (empty($_POST["user_direccion"])) {
        $errors["user_direccion"] = "Introduce una dirección.";
    }
    return $errors;
}

function validar()
{
    $errors = [];
        if (!preg_match("/^[a-zA-Z]*$/", $_POST["new_user"])) {
            $errors["new_user"] = "Introduce un nombre válido.";
        }

        if (!empty($_POST["user_altura"]) && !is_numeric($_POST["user_altura"])) {
            $errors["user_altura"] = "Introduce una altura válida.";
        }

        if (!empty($_POST["user_peso"]) && !is_float($_POST["user_peso"])) {
            $errors["user_peso"] = "Introduce un peso válido.";
        }

        $fecha = explode('/', $_POST["user_fnac"]);
        if (!empty($_POST["user_fnac"]) && ((!count($fecha) == 3) || !checkdate($fecha[1], $fecha[0], $fecha[2]))) {
            $errors["user_fnac"] = "Introduce una fecha de nacimiento válida.";
        }

        if (!empty($_POST["user_email"]) && !filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
            $errors["user_email"] = "Introduce un E-mail valido.";
        }

        if (!empty($_POST["user_tel"]) && !preg_match("/^\d{9}$/", $_POST["user_tel"])) {
            $errors["user_tel"] = "Introduce un telefono valido.";
        }
    return $errors; 
}

//une los mensajes de error de las dos funciones
$errors = array_merge(obligatorios(), validar());

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header('Location: pacientes.php');
    exit();
}
?>