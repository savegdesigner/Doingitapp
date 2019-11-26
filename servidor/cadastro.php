<?php

if(isset($_POST['cadastro-submit'])){

    require 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordr = $_POST['passwordr'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordr)){
        header("Location: ../cadastro-pagina.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();

    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../cadastro-pagina.php?error=invalidemailusername");
        exit();

    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../cadastro-pagina.php?error=invalidemail&uid=".$username);
        exit();

    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../cadastro-pagina.php?error=invalidusername&email=".$email);
        exit();

    }else if($password !== $passwordr){
        header("Location: ../cadastro-pagina.php?error=passwordmatch&uid=".$username."&email=".$email);
        exit();

    }
    else{

        $sql = "SELECT id_user FROM users WHERE username_user=?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../cadastro-pagina.php?error=sql");
            exit();

        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location: ../cadastro-pagina.php?error=usertaken&email=".$email);
                exit();

            }else{
                $sql = "INSERT INTO users (username_user, email_user, password_user) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../cadastro-pagina.php?error=sql");
                    exit();

            }else{
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                mysqli_stmt_execute($stmt);
                header("Location: ../login-pagina.php?signup=success");
                exit();

                }
            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    }

}else{
    header('Location: ../cadastro-pagina.php');
    exit();

}