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

    <!-- CSS Links -->
    <!-- Main Layout, Grid -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- Media -->
    <link rel="stylesheet" href="css/media.css">
    
</head>
<body>

    <main class="page" wrapper>
        <!-- <h1 class="title-index">Bem vindo</h1> -->
        <img src="imgs/icons/doingit-logo.svg" alt="DoingIt Logo" class="doingit-logo">

        <h1 class="about">Crie e planeje suas listas de tarefas!</h1>

        <a href="login-pagina.php"class="primary-button">Login</a>
        <a href="cadastro-pagina-ajax.php" class="secondary-button">Criar uma conta</a>
    </main>
    
</body>
</html>