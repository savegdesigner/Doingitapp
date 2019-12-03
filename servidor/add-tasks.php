<?php

session_start();

// Adding a new task
if(isset($_POST['add-task-button'])){

    require 'connection.php';

    $task_name = $_POST['new-task'];
    $list_id = $_POST['listid'];

    if(empty($task_name)){
        header("Location: ../tasks.php?error=emptyfield");
        exit();

    }else{
        $sql = "INSERT INTO tasks (task_name, list_id, user_id) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../tasks.php?error=sql");
            exit();

        }else{

            mysqli_stmt_bind_param($stmt, "sii", $task_name, $list_id, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            header("Location: ../tasks.php?addtask=success");
            exit();

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }

// Updating selected list name
}else{
    if(isset($_POST['update-task-button'])){

        require 'connection.php';
    
        $task_id = $_POST['updatetaskid'];
        $task_name = $_POST['new-task'];
    
        if(empty($task_name)){
            header("Location: ../tasks.php?error=emptyfield");
            exit();
    
        }else{
            $sql = mysqli_prepare( $conn, 'UPDATE tasks SET task_name = ? WHERE task_id = ?');
            mysqli_stmt_bind_param(	$sql, 'si', $task_name, $task_id);
        
            mysqli_stmt_execute($sql);
        
            // $update = false;
        
            header("Location: ../tasks.php?updatedtask=success");
            exit();
    
        }
    
    }else{
        header("Location: ../tasks.php?updatetask=failed");
        exit();

    }

}