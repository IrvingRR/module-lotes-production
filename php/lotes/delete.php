<?php 
include_once "../connection.php";

$num_lote = $_GET['number_lote'];
$query = mysqli_query($connection, "DELETE FROM lotes WHERE number_lote = $num_lote");
$response = array();

if($query) {
    $response = array("status" => "success", "message" => "¡Lote eliminado exitosamente!");
    echo json_encode($response);
}else {
    $response = array("status" => "error", "message" => "Ocurrio un error al eliminar el lote");
    echo json_encode($response);
}
?>