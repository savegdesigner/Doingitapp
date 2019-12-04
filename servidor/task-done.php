<?php

session_start();

$json_response = file_get_contents('php://input');

$data = json_decode($json_response);

$task_id = $data->task;



if(isset($task_id)){

    require 'connection.php';

    $sql = "SELECT task_complete FROM tasks WHERE task_id = ?";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Erro no servidor";

    }else{
        mysqli_stmt_bind_param($stmt, "i", $task_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $result = $stmt->get_result();

        if($result == 0){

            $sql = "UPDATE tasks SET task_complete = ? WHERE task_id = ?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $message = "Erro no servidor";

            }else{
                $complete = 1;
                mysqli_stmt_bind_param($stmt, "ii", $complete, $task_id);
                mysqli_stmt_execute($stmt);
    
                $message = "complete";
                echo json_encode($message);
                exit();
    
                }

        }else{
            $sql = "UPDATE tasks SET task_complete = ? WHERE task_id = ?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $message = "Erro no servidor";

            }else{
                $incomplete = 0;
                mysqli_stmt_bind_param($stmt, "ii", $incomplete, $task_id);
                mysqli_stmt_execute($stmt);
    
                $message = "incomplete";
                echo json_encode($message);
                exit();

            }

        }

    }

}