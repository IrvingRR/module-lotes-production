<?php 
include_once "../connection.php";

$num_lote = $_GET['number_lote'];
$query = mysqli_query($connection, "SELECT * FROM lotes WHERE number_lote = $num_lote");
$response = array();

if(mysqli_num_rows($query) > 0) {
    while($data = mysqli_fetch_array($query)) {
        $lote = array(
            "number_lote" => $data['number_lote'],
            "responsable" => $data['responsable'],
            "date_start_production" => $data['date_start_production'],
            "date_finish_production" => $data['date_finish_production'],
            "type_pieces" => $data['type_pieces'],
            "number_pieces" => $data['number_pieces'],
            "number_defect_pieces" => $data['number_defect_pieces'],
        );        

        array_push($response, $lote);
    }

}else {
    header('location: ../admin/home.php');
}

echo json_encode($response);
?>