<?php

require './connection.php';

$list_id = $_GET['listid'];
$list_name = $_GET['listname'];

if(isset($_GET['delete_id'])){

	$sql = mysqli_prepare( $conn, 'DELETE FROM tasks WHERE task_id = ?');
	mysqli_stmt_bind_param(	$sql, 'i', $_GET['delete_id']);

	mysqli_stmt_execute($sql);
        
	header("Location: ../tasks.php?listdeleted&listid=$list_id&listname=$list_name");

}else{
	header("Location: ../tasks.php?cannotdelete&listid=$list_id&listname=$list_name");

}