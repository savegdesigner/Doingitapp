<?php

session_start();

if(isset($_SESSION['userUid'])){
    header("Location: inicio-pagina.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoingIt - Faça sua lista de tarefas</title>

    <!-- Scripts -->
    <script defer src="js/transition.js"></script>
    <!-- CSS Links -->
    <!-- Reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- Main Layout, Grid -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Media -->
    <link rel="stylesheet" href="css/media.css">

</head>

<body>

    <form class="page hide" action="servidor/cadastro.php" method="POST" wrapper>
    <img src="imgs/icons/doingit-logo.svg" alt="DoingIt Logo" class="doingit-logo">
        <h1 class="title-cadastro">Cadastre-se</h1>

        <?php

            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<span class="error">Preencha todos os campos</span>';

                }else if($_GET['error'] == "invalidemail"){
                        echo '<span class="error">E-mail inválido</span>';

                }else if($_GET['error'] == "passwordmatch"){
                    echo '<span class="error">Senhas diferentes</span>';

                }else if($_GET['error'] == "invalidusername"){
                    echo '<span class="error">Usuário inválido</span>';

                }else if($_GET['error'] == "usertaken"){
                    echo '<span class="error">Usuário já cadastrado</span>';

            }else if($_GET['signup'] == "success"){
                echo '<span class="success">Cadastro efetuado</span>';
            }
        }

        ?>

        <div class="user">
            <img src="imgs/icons/user-icon.svg" alt="E-mail Icon">
            <input type="text" id="user-input" placeholder="Usuário" name="username">
        </div>

        <div class="email">
            <img src="imgs/icons/email-icon.svg" alt="E-mail Icon">
            <input type="email" id="email-input" placeholder="E-mail" name="email">
        </div>

        <div class="password">
            <img src="imgs/icons/password-icon.svg" alt="Password Icon">
            <input type="password" id="password-input" placeholder="Senha" name="password">
        </div>

        <div class="password">
            <img src="imgs/icons/password-icon.svg" alt="Password Icon">
            <input type="password" id="passwordr-input" placeholder="Repita a senha" name="passwordr">
        </div>

        <input type="submit" class="primary-button" value="Cadastrar" name="cadastro-submit">

        <p class="link-a">Já possui uma conta?</p>
        <a href="login-pagina.php" class="link-b">Entre aqui</a>
    </form>

</body>

</html>