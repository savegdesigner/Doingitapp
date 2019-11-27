<?php

require './connection.php';

if(isset($_GET['delete_id'])){

	$sql = mysqli_prepare( $conn, 'DELETE FROM lists WHERE id = ?');
	mysqli_stmt_bind_param(	$sql, 'i', $_GET['delete_id']);

	mysqli_stmt_execute($sql);
        
	header('Location: ../inicio-pagina.php?listdeleted');

}else{
	header('Location: ../inicio-pagina.php?cannotdelete');

}