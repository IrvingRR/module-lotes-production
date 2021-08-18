<?php 
include_once "connection.php";

if(isset($_POST)) {

    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        // Datos NO vacíos
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $password_encrypt = password_hash($password, PASSWORD_DEFAULT);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
           
            if(strlen($password) >= 8) {
                $query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");

                if(mysqli_num_rows($query) > 0) {
                    $data = mysqli_fetch_array($query);
                    $password_db = $data['password'];
                    
                    session_start();
                    $_SESSION['admin'] = $data['id'];

                    $resultado = array("status" => "success", "message" => "¡Inicio de sesión exitoso!");
                    echo json_encode($resultado);
                    // if(password_verify($password, $password_db)) {
                    //     $resultado = array("status" => "success", "message" => "Son iguales");
                    //     echo json_encode($resultado);
                    // }else {
                    //     $resultado = array("status" => "error", "message" => "Las contraseñas no son iguales");
                    //     echo json_encode($resultado);
                    // }
                    // echo json_encode($resultado);
                }else {
                    $resultado = array("status" => "error", "message" => "Correo electrónico o contraseña incorrectos");
                    echo json_encode($resultado);
                }
            }else {
                $resultado = array("status" => "error", "message" => "La contraseña debe tener almenos 8 carácteres");
                echo json_encode($resultado);
            }
        }else {
            $resultado = array("status" => "error", "message" => "Correo electrónico NO valido");
            echo json_encode($resultado);
        }
    }else {
        // Datos vacíos
        $resultado = array("status" => "error", "message" => "Todos los campos son requeridos");
        echo json_encode($resultado);
    }
}

?>