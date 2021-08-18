<?php 
include_once "../connection.php";

if(isset($_POST)) {
    if(!empty($_POST['filter'])) {
        $search = mysqli_real_escape_string($connection, $_POST['filter']);

        $query = mysqli_query($connection, "SELECT * FROM lotes WHERE 
                                            type_pieces LIKE '%$search%'");
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

            echo json_encode($response);
        
        }else {
            $response = array("status" => "error", "message" => "No hay resultados de $search");
            echo json_encode($response);
        }
        
    }else {
        $response = array("status" => "error", "message" => "Debes ingresar un valor a búscar");
        echo json_encode($response);
    }
}

?>