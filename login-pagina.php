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
    <script defer src="js/main.js"></script>
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


    <form class="page hide" action="servidor/login.php" method="POST" wrapper>
    <img src="imgs/icons/doingit-logo.svg" alt="DoingIt Logo" class="doingit-logo">
        <h1 class="title-login">Entrar</h1>

        <?php

            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<span class="error">Preencha todos os campos</span>';

                }else if($_GET['error'] == "invalidemail"){
                        echo '<span class="error">E-mail inválido</span>';

                }else if($_GET['error'] == "wrongpassword"){
                    echo '<span class="error">Senha inválida</span>';

                }else if($_GET['error'] == "nouser"){
                    echo '<span class="error">E-mail não encontrado</span>';

                }

            }else if(isset($_GET['signup'])){
                echo '<span class="success">Cadastrado com sucesso</span>';
            }

        ?>

        <div class="email">
            <img src="imgs/icons/email-icon.svg" alt="E-mail Icon">
            <input type="email" id="email-input" placeholder="E-mail" name="email">
        </div>
        
        <div class="password">
            <img src="imgs/icons/password-icon.svg" alt="Password Icon">
            <input type="password" id="password-input" placeholder="Senha" name="password">
            <img src="imgs/icons/eye-icon-hide.svg" alt="Eye Icon" id="eye">
        </div>
            <a href="#" class="password-forgot">Esqueceu a senha?</a>

        <input type="submit" class="primary-button" value="Login" name="login-submit">

        <p class="link-a">Não possui uma conta?</p>
        <a href="cadastro-pagina-ajax.php" class="link-b">Cadastre-se aqui</a>
    </form>
    
</body>
</html>