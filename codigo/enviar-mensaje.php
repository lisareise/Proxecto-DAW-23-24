<?php
session_start();
require("ficha-paciente.php");

// Get the JSON contents
$json = file_get_contents('php://input');

// decode the json data
$data = json_decode($json);


$error = [];

if(empty($data -> mensaje_field)){
    $error["mensaje_field"] = "El mensaje no se puede enviar vacío.";
}

if(!empty($error)){
    echo json_encode(['errors' => $error]);
    exit;
}

$mensaje_content = $data -> mensaje_field;

$conn = new mysqli('localhost','root','','nutrismart');

//obtener el id del colegiado
$sqlNutri = "SELECT num_colegiado FROM nutricionista where user_nutri = '$_SESSION[usuario]'";
$resNutri = $con->query($sqlNutri);
if ($resNutri->num_rows > 0) {
    $row = $resNutri->fetch_assoc();
    $num_colegiado = $row['num_colegiado'];
}

$insert = "INSERT INTO mensaje (id_nutri, id_paciente, contenido, fecha) VALUES (
    '$num_colegiado', '$id_paciente','$mensaje_content',CURDATE()
)";

if($conn->query($insert)===TRUE){
    echo json_encode(["success" =>"Mensaje enviado correctamente."]);
}else{
    echo json_encode(['errors' => ['general' => 'Error al registrar el mensaje' . $conn->error]]);
}
$conn -> close();

?>
