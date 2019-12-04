<?php  

session_start();

require './connection.php';

$list_id = $_GET['listid'];
$list_name = $_GET['listname'];
$user_id = $_SESSION['userId'];

$sql = "SELECT * FROM tasks WHERE list_id = ?";
$stmt = mysqli_stmt_init($conn); 

if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "Erro no SQL";

}else{
        mysqli_stmt_bind_param($stmt, 'i', $list_id);
        mysqli_stmt_execute($stmt);
        
        $result = $stmt->get_result();
        
        if($result->num_rows >= 1){

            while($data = $result->fetch_assoc()){

                echo "
                <section  class='list'>

                    <div class='content'>
                        <input type='checkbox' class='task-check' id='task-check' value='{$data['task_id']}' data-complete='{$data['task_complete']}'>
                        <h3 class='task-name'>{$data['task_name']}</h3>
                        <a href='./servidor/edit-task.php?edit_id={$data['task_id']}&listid=$list_id&listname=$list_name'><img src='./imgs/icons/edit-button.svg' alt='Editar Lista' class='edit-button'></a>
                    </div>

                    <a href='./servidor/delete-task.php?delete_id={$data['task_id']}&listid=$list_id&listname=$list_name' class='delete'><img src='./imgs/icons/delete-button.svg' alt='Deletar Lista' class='delete-button'></a>

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