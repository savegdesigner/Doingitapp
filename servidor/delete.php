<?php

require './connection.php';

if(isset($_POST['delete-button'])){

	if(is_numeric($_POST['delete-button'])){

		$prep2 = mysqli_prepare( $conn, 'DELETE FROM lists WHERE id = ?');
		mysqli_stmt_bind_param(	$prep2, 'i', $_POST['delete-button']);

        mysqli_stmt_execute($prep2);
        
        header('Location: ../inicio-pagina.php?listdeleted');

	} 

}