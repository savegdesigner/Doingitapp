<?php

session_start();

require './connection.php';

$list_id = $_GET['listid'];
$list_name = $_GET['listname'];

// Getting list id & name and sending through URL for Update
if(isset($_GET['edit_id'])){

    $sql = mysqli_prepare( $conn, 'SELECT * FROM tasks WHERE task_id = ?');
    mysqli_stmt_bind_param(	$sql, 'i', $_GET['edit_id']);

    mysqli_stmt_execute($sql);

    $result = $sql->get_result();

    if($result->num_rows >= 1){
        $data = $result->fetch_assoc();

        $task_name = $data['task_name'];
        $task_id = $data['task_id'];

        header("Location: ../tasks.php?listid=$list_id&listname=$list_name&taskupdateid=$task_id&taskupdatename=$task_name");

        }

}else{
    header("Location: ../tasks.php?cannotedit&listid=$list_id&listname=$list_name");

}