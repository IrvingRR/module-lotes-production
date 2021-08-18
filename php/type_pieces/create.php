<?php 
include_once "../connection.php";

if(isset($_POST)) {
    if(!empty($_POST['type_piece'])) {
        $type_pieces = mysqli_real_escape_string($connection, $_POST['type_piece']);
        
        if(preg_match("/^[a-zA-ZÀ-ÿ\s]{1,40}$/", $type_pieces)) {
            $query = mysqli_query($connection, "INSERT INTO types_pieces(id, name) VALUES('', '$type_pieces')");
            if($query) {
                $request = array("status" => "success", "message" => "¡Nuevo tipo de pieza creada exitosamente!");
                echo json_encode($request);
            }else {
                $request = array("status" => "error", "message" => "¡Ops!, Ocurrió un error al crear el nuevo tipo de pieza");
                echo json_encode($request);
            }
        }else {
            $request = array("status" => "error", "message" => "El nombre de la pieza no es valido");
            echo json_encode($request);
        }
    }else {
        $request = array("status" => "error", "message" => "Es necesario que ingreses el nombre del tipo de pieza");
        echo json_encode($request);
    }
}

?>