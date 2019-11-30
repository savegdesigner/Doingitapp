<?php

session_start();

// Adding a new list
if(isset($_POST['add-list-button'])){

    require 'connection.php';

    $list_name = $_POST['new-list'];

    if(empty($list_name)){
        header("Location: ../inicio-pagina.php?error=emptyfield");
        exit();

    }else{
        $sql = "INSERT INTO lists (list_name, id_user) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../inicio-pagina.php?error=sql");
            exit();

        }else{

            mysqli_stmt_bind_param($stmt, "si", $list_name, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            header("Location: ../inicio-pagina.php?addlist=success");
            exit();

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }

// Updating selected list name
}else{
    if(isset($_POST['update-list-button'])){

        require 'connection.php';
    
        $list_id = $_POST['updatelistid'];
        $list_name = $_POST['new-list'];
    
        if(empty($list_name)){
            header("Location: ../inicio-pagina.php?error=emptyfield");
            exit();
    
        }else{
            $sql = mysqli_prepare( $conn, 'UPDATE lists SET list_name = ? WHERE id = ?');
            mysqli_stmt_bind_param(	$sql, 'si', $list_name, $list_id);
        
            mysqli_stmt_execute($sql);
        
            $update = false;
        
            header("Location: ../inicio-pagina.php?updatedlist=success");
            exit();
    
        }
    
    }else{
        header("Location: ../inicio-pagina.php?updatelist=failed");
        exit();

    }

}