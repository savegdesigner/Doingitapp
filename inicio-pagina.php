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
    <!-- Página Layout & Style -->
    <link rel="stylesheet" href="css/page.css">
    <!-- Reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- Main Layout, Grid -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Media -->
    <link rel="stylesheet" href="css/media.css">

</head>
<body>

    <nav>
        <div class="user-stuff">
            <img src="./imgs/icons/avatar.svg" alt="Imagem do usuário" class="user-avatar">
            <a href="#" class="edit-avatar"><img src="./imgs/icons/edit.svg" alt="Editar imagem do usuário"></a>
        
            <?php 
                if(isset($_SESSION['userUid'])){
                    echo '<span class="username">'.$_SESSION['userUid'].'</span>';

                }else{
                    header('Location: login-pagina.php');
                }

                ?>
    </div>

    <a href="servidor/logout.php"><img src="./imgs/icons/exit.svg" alt="Sair" class="exit"></a>
    </nav>

    <main class="inicio-page">
    
                <div class="todo-box">
                    <div class="list-title">
                        <h1>Minhas Listas</h1>
                    </div>

                    <div class="lists">
                        <div class="list">

                            <div class="content">
                            <h3>Terminar o PI</h3>
                            <a href="#"><img src="./imgs/icons/edit-button.svg" alt="Editar Lista" class="edit-button"></a>
                            </div>
                            
                            <a href="#"><img src="./imgs/icons/delete-button.svg" alt="Deletar Lista" class="delete-button"></a>

                        </div>

                        <div class="list">

                            <div class="content">
                            <h3>Incluir Ajax</h3>
                            <a href="#"><img src="./imgs/icons/edit-button.svg" alt="Editar Lista" class="edit-button"></a>
                            </div>

                            <a href="#"><img src="./imgs/icons/delete-button.svg" alt="Deletar Lista" class="delete-button"></a>

                        </div>

                        <div class="list">

                            <div class="content">
                            <h3>Ir na aula do quintas nas quinta</h3>
                            <a href="#"><img src="./imgs/icons/edit-button.svg" alt="Editar Lista" class="edit-button"></a>
                            </div>

                            <a href="#"><img src="./imgs/icons/delete-button.svg" alt="Deletar Lista" class="delete-button"></a>

                        </div>

                        <div class="list">

                            <div class="content">
                            <h3>Terminar as ADO de php</h3>
                            <a href="#"><img src="./imgs/icons/edit-button.svg" alt="Editar Lista" class="edit-button"></a>
                            </div>

                            <a href="#"><img src="./imgs/icons/delete-button.svg" alt="Deletar Lista" class="delete-button"></a>

                        </div>

                    </div>

                    <div class="add-lists">
                        <h2>Adicionar nova lista</h2>

                        <div class="add">
                        <input type="text" class="new-list-input">
                        <a href="#"><img src="./imgs/icons/add-button.svg" alt="Adicionar nova lista" class="add-button"></a>
                        </div>
                        
                    </div>
            

                </div>

    </main>
    
</body>
</html>