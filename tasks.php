<?php

session_start();

$update = false;

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

    <script defer src="./js/ajax-main-tasks.js"></script>
    <script defer src="./js/task-done.js"></script>

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
                        <h1><?php echo $_GET['listname']; ?></h1>
                    </div>

                    <div class="lists" id="tasks">

                    </div>

                    <div class="add-lists">
                        <h2>Adicionar nova tarefa</h2>

                        <form method="POST" action="./servidor/add-tasks.php" class="add">

                            <input type="text" class="new-list-input" name="new-task" id="list-input"
                            placeholder="Comprar leite..." 
                            value="<?php 
                            
                                        if(isset($_GET['taskupdateid'])){

                                            $task_name = $_GET['taskupdatename'];
                                            $update = true;
                                            echo $task_name;
                                            } 
                                    ?>">

                            <input type="hidden" id="listname" name="listname" value="<?php echo $_GET['listname']; ?>">
                            <input type="hidden" id="listid" name="listid" value="<?php echo $_GET['listid']; ?>">
                            <input type="hidden" name="updatetaskid" value="<?php echo $_GET['taskupdateid']; ?>">

                                <?php 
                        
                                    if($update){
                                        echo "<button type='submit' class='submit-button' name='update-task-button'><img src='./imgs/icons/update-button.svg' alt'Atualizar uma lista' class='add-button'></button>";
                                    
                                    }else{
                                        echo "<button type='submit' class='submit-button' name='add-task-button'><img src='./imgs/icons/add-button.svg' alt'Adicionar nova lista' class='add-button'></button>";
                                    
                                    }

                                ?>
                            
                        </form>
                        
                    </div>
            
                    <div class="route">
                        <a href="./inicio-pagina.php" class="back-to-start"><img src="./imgs/icons/lists-icon.svg" alt="Voltar para as listas"></a>
                        <a href="#" class="unset"><img src="./imgs/icons/tasks-icon.svg" alt="Voltar para as listas"></a>           
                    </div>
                </div>


    </main>
    
</body>
</html>