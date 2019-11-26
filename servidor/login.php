<?php

if(isset($_POST['login-submit'])){

    require 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        header("Location: ../login-pagina.php?error=emptyfields&email=".$email);
        exit();

    }else{
        $sql = "SELECT * FROM users WHERE email_user=?";
        $stmt = mysqli_stmt_init($conn); 

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login-pagina.php?error=sql");
            exit();

        }else{
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password_user']);
                if($passwordCheck == false){
                    header("Location: ../login-pagina.php?error=wrongpassword");
                    exit();

                }else if($passwordCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['id_user'];
                    $_SESSION['userUid'] = $row['username_user'];

                    header("Location: ../inicio-pagina.php?login=success");
                    exit();

                }else{
                    header("Location: ../login-pagina.php?error=wrongpassword");
                    exit();

                }

            }else{
                header("Location: ../login-pagina.php?error=nouser");
                exit();

            }
        }

    }

}else{
    header('Location: ../login-pagina.php');
    exit();
}

