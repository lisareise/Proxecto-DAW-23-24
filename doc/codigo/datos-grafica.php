<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
// Get the JSON contents
$json = file_get_contents('php://input');


// decode the json data
$data = json_decode($json);

$idPaciente = $data->id_usuario;

$conexion = new mysqli('localhost', 'root', '', 'nutrismart');

$datosPeso = "SELECT peso, MONTH(fecha) FROM datos WHERE id_paciente= '$idPaciente'";

$res = $conexion->query($datosPeso);

if($res ->num_rows >0){
    $result = $res->fetch_all();
    $json_array = json_encode($result);
}

echo $json_array;

?>
