<?php 
include_once "../connection.php";

$query = mysqli_query($connection, "SELECT * FROM types_pieces");
$response = array();
if(mysqli_num_rows($query) > 0) {
    while($data = mysqli_fetch_array($query)) {
        $object = array(
            "id" => $data['id'],
            "name" => $data['name'],
        );        
        array_push($response, $object);
    }

    echo json_encode($response);
}else {
    $response = array("status" => "error", "message" => "No hay tipos de piezas disponibles");
    echo json_encode($response);
}

?>