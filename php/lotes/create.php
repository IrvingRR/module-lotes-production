<?php  
include_once "../connection.php";

if(isset($_POST)) {
    if(!empty($_POST['responsable']) && !empty($_POST['date_start']) && !empty($_POST['date_finish']) && !empty($_POST['type_piece']) && !empty($_POST['number_pieces']) && !empty($_POST['number_defect_pieces'])) {

        $responsable = mysqli_real_escape_string($connection, $_POST['responsable']);
        $date_start = mysqli_real_escape_string($connection, $_POST['date_start']);
        $date_finish = mysqli_real_escape_string($connection, $_POST['date_finish']);
        $type_piece = mysqli_real_escape_string($connection, $_POST['type_piece']);
        $number_pieces = mysqli_real_escape_string($connection, $_POST['number_pieces']);
        $number_defect_pieces = mysqli_real_escape_string($connection, $_POST['number_defect_pieces']);
        
        if(preg_match("/^[a-zA-ZÀ-ÿ\s]{1,40}$/", $responsable)) {
    
            if($number_pieces >= 0) {
                    // $response = array("status" => "success", "message" => "Número de piezas  valido");
                    // echo json_encode($response);
                
                if($number_defect_pieces >= 0) {
                    $query = mysqli_query($connection, "INSERT INTO lotes (number_lote, responsable, date_start_production, date_finish_production, type_pieces, number_pieces, number_defect_pieces) 
                                                        VALUES('', '$responsable', '$date_start', '$date_finish', '$type_piece', $number_pieces, $number_defect_pieces)");

                    if($query) {
                        $response = array("status" => "success", "message" => "¡Lote creado exitosamente!");
                        echo json_encode($response);
                    }else {
                        $response = array("status" => "error", "message" => "¡Ops!, Ocurrió un error al crear el lote");
                        echo json_encode($response);
                    }
                
                }else {
                    $response = array("status" => "error", "message" => "El número de piezas defectuosas no es valido");
                    echo json_encode($response);
                }
            }else {
                $response = array("status" => "error", "message" => "El número de piezas no es valido");
                echo json_encode($response);
            }
        }else {
            $response = array("status" => "error", "message" => "Nombre del responsable invalido");
            echo json_encode($response);
        }
    }else {
        $response = array("status" => "error", "message" => "Todos los campos son necesarios");
        echo json_encode($response);
    }
}


?>