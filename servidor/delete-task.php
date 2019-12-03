<?php

require './connection.php';

if(isset($_GET['delete_id'])){

	$sql = mysqli_prepare( $conn, 'DELETE FROM tasks WHERE task_id = ?');
	mysqli_stmt_bind_param(	$sql, 'i', $_GET['delete_id']);

	mysqli_stmt_execute($sql);
        
	header('Location: ../tasks.php?listdeleted');

}else{
	header('Location: ../tasks.php?cannotdelete');

}