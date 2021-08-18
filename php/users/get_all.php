<?php 
include_once "../connection.php";

$query = mysqli_query($connection, "SELECT * FROM users");
$response = array();

if(mysqli_num_rows($query) > 0) {
    while($data = mysqli_fetch_array($query)) {
        $lote = array(
            "id" => $data['id'],
            "name" => $data['name'],
            "lastname" => $data['lastname'],
            "phone" => $data['phone'],
            "addres" => $data['addres'],
            "email" => $data['email'],
            "password" => $data['password'],
            "status" => $data['status'],
            "role" => $data['role'],
            "image" => $data['image'],
            
        );        

        array_push($response, $lote);
    }

}else {
    $response = array("status" => "error", "message" => "No usuarios lotes por el momento");
}

echo json_encode($response);

?>