<?php

$json_response = file_get_contents('php://input');

$user_data = json_decode($json_response);

$username = $user_data->username;
$email = $user_data->email;
$password = $user_data->password;
$passwordr = $user_data->passwordr;

if(isset($user_data)){

    require 'connection.php';

    if(empty($username) || empty($email) || empty($password) || empty($passwordr)){
        // header("Location: ../cadastro-pagina-ajax.php?error=emptyfields&uid=".$username."&email=".$email);
        $message = "Preencha todos os campos";

    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        // header("Location: ../cadastro-pagina-ajax.php?error=invalidemailusername");
        $message = "E-mail/Usuário inválido";

    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // header("Location: ../cadastro-pagina-ajax.php?error=invalidemail&uid=".$username);
        $message = "E-mail inválido";

    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        // header("Location: ../cadastro-pagina-ajax.php?error=invalidusername&email=".$email);
        $message = "Usuário inválido";

    }else if($password !== $passwordr){
        // header("Location: ../cadastro-pagina-ajax.php?error=passwordmatch&uid=".$username."&email=".$email);
        $message = "Senhas diferentes";

    }
    else{

        $sql = "SELECT id_user FROM users WHERE username_user=?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            // header("Location: ../cadastro-pagina-ajax.php?error=sql");
            $message = "Erro no servidor";

        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                // header("Location: ../cadastro-pagina-ajax.php?error=usertaken&email=".$email);
                $message = "Usuário já cadastrado";

            }else{
                $sql = "INSERT INTO users (username_user, email_user, password_user) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // header("Location: ../cadastro-pagina-ajax.php?error=sql");
                    $message = "Erro no servidor";

                }else{
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                mysqli_stmt_execute($stmt);
                // header("Location: ../login-pagina.php?signup=success");
                $message = "Usuário cadastrado com sucesso";

                }
            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    }

    echo json_encode($message);

}else{
    header('Location: ../cadastro-pagina-ajax.php');
    exit();

}