<?php

session_start();

$json_response = file_get_contents('php://input');

$user_rate = json_decode($json_response);

$rate_value = $user_rate->rate;


if(isset($rate_value)){
    require 'connection.php';

    $sql = "SELECT rate_id FROM rate WHERE id_user=?";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        $message = "Erro no servidor";

    }else{
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['userId']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCheck = mysqli_stmt_num_rows($stmt);

        if($resultCheck > 0){
            $sql = "UPDATE rate SET rate_value = ? WHERE id_user = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $message = "Erro no servidor";

            }else{

            mysqli_stmt_bind_param($stmt, "ii", $rate_value, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);

            $message = "Obrigado!";

            }

        }else{
            $sql = "INSERT INTO rate (rate_value, id_user) VALUES (?,?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $message = "Erro no servidor";

            }else{

            mysqli_stmt_bind_param($stmt, "ii", $rate_value, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);

            $message = "Obrigado!";

            }
        }

    }

    echo json_encode($message);

}else{
    $message = "Tente novamente";
    echo json_encode($message);

}
