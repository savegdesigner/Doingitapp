<?php  

session_start();

require './connection.php';

$sql = "SELECT * FROM lists WHERE id_user=?";
$stmt = mysqli_stmt_init($conn); 

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../login-pagina.php?error=pageloadsql");
    exit();

}else{
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['userId']);
    mysqli_stmt_execute($stmt);
    
    $result = $stmt->get_result();

    if($result->num_rows >= 1){

        $data = $result->fetch_assoc()

            echo " $data ";
        
    }
}

?>