<?php

session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoingIt - Faça sua lista de tarefas</title>

    <!-- CSS Links -->
    <!-- Font Style -->
    <link rel="stylesheet" href="css/font.css">
    <!-- Reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- Main Layout, Grid -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Media -->
    <link rel="stylesheet" href="css/media.css">

</head>
<body>

    <main class="page">

  <?php 
        if(isset($_SESSION['userUid'])){
            echo '<h1>Hello, '.$_SESSION['userUid'].'</h1>
                    <a href="servidor/logout.php">Logout</a>';

        }else{
            header('Location: login-pagina.php');
        }

    ?>

    </main>
    
</body>
</html>