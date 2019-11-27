<?php

session_start();

require './connection.php';

if(isset($_GET['edit_id'])){

    $sql = mysqli_prepare( $conn, 'SELECT * FROM lists WHERE id = ?');
    mysqli_stmt_bind_param(	$sql, 'i', $_GET['edit_id']);

    mysqli_stmt_execute($sql);

    $result = $sql->get_result();

    if($result->num_rows >= 1){
        $data = $result->fetch_assoc();

        $update = true;
        $list_name = $data['list_name'];
        $list_id = $data['id'];

        header("Location: ../inicio-pagina.php?listupdateid=$list_id&listupdatename=$list_name");

        }

}else{
    header('Location: ../inicio-pagina.php?cannotupdate');

}