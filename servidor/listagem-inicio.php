<?php  

session_start();

require './connection.php';

$sql = "SELECT * FROM lists WHERE id_user=?";
$stmt = mysqli_stmt_init($conn); 

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../login-pagina.php?error=pageloadsql");
    mysqli_stmt_close($conn);
    exit();

}else{
        mysqli_stmt_bind_param($stmt, 'i', $_SESSION['userId']);
        mysqli_stmt_execute($stmt);
        
        $result = $stmt->get_result();
        
        if($result->num_rows >= 1){

            while($data = $result->fetch_assoc()){

                echo "
                <section  class='list'>

                    <div class='content'>
                    <a href='./tasks.php?listid={$data['id']}&listname={$data['list_name']}' class='list-title-name' data-listid='{$data['id']}'>{$data['list_name']}</a>
                    <a href='./servidor/edit.php?edit_id={$data['id']}'><img src='./imgs/icons/edit-button.svg' alt='Editar Lista' class='edit-button'></a>
                    </div>

                    <a href='./servidor/delete.php?delete_id={$data['id']}' class='delete'><img src='./imgs/icons/delete-button.svg' alt='Deletar Lista' class='delete-button'></a>

                </section>
            ";

        }
        }else{
            echo "
            <img src='imgs/icons/doingit-logo.svg' alt='DoingIt Logo' class='doingit-logo'>
            ";
        
        }
}

?>