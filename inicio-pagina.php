<?php

session_start();

$list_name = '';
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

    <script defer src="./js/ajax-main.js"></script>
    <script defer src="./js/popup-ajax.js"></script>
    <script defer src="./js/link-unavailable.js"></script>

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

                    <div class="lists" id="lists">

                    </div>

                    <div class="add-lists">
                        <h2>Adicionar nova lista</h2>

                        <form method="POST" action="./servidor/add-list.php" class="add">

                            <input type="text" class="new-list-input" name="new-list" id="list-input"
                            placeholder="Fazer compras..." 
                            value="<?php 
                            
                                        if(isset($_GET['listupdateid'])){

                                            $list_name = $_GET['listupdatename'];
                                            $update = true;

                                            } 
                                            echo $list_name; ?>">

                            <input type="hidden" name="updatelistid" value="<?php echo $_GET['listupdateid']; ?>">

                                <?php 
                        
                                    if($update){
                                        echo "<button type='submit' class='submit-button' name='update-list-button'><img src='./imgs/icons/update-button.svg' alt'Atualizar uma lista' class='add-button'></button>";
                                    
                                    }else{
                                        echo "<button type='submit' class='submit-button' name='add-list-button'><img src='./imgs/icons/add-button.svg' alt'Adicionar nova lista' class='add-button'></button>";
                                    
                                    }

                                ?>
                            
                        </form>
                        
                    </div>

                    <div class="route">
                        <div class="route-span-wrapper">
                            <span class="route-span">Selecione uma lista</span>
                            <img class="tap" src="./imgs/icons/tap.svg" alt="Clique em uma lista">
                        </div>
                        
                        <a href="#" class="unset"><img src="./imgs/icons/lists-icon.svg" alt="Voltar para as listas"></a>
                        <a href="#" class="back-to-tasks"><img src="./imgs/icons/tasks-icon.svg" alt="Voltar para as listas"></a>           
                    </div>
            

                </div>

                <div class="rateus">

                <img class="rateus-icon" src="./imgs/icons/rateus-icon.svg" alt="Rate us Icon">

                <i class="close-rateus"><img src="./imgs/icons/close-icon.svg" alt="Close rate us"></i>

                    <div class="wrapper" id="rateus-wrapper">

                        <h2 class="rateus-title">Avalie sua experiência</h2>

                        <p>Como gostaria de nos avaliar?</p>

                        <div class="rate-stars">
                            <i class="star" id="star-1"><img src="./imgs/icons/star.svg" alt="1 Estrela"></i>
                            <i class="star" id="star-2"><img src="./imgs/icons/star.svg" alt="2 Estrelas"></i>
                            <i class="star" id="star-3"><img src="./imgs/icons/star.svg" alt="3 Estrelas"></i>
                            <i class="star" id="star-4"><img src="./imgs/icons/star.svg" alt="4 Estrelas"></i>
                            <i class="star" id="star-5"><img src="./imgs/icons/star.svg" alt="5 Estrelas"></i>
                        </div>

                        <span class="notnow">agora não</span>

                    </div>

                </div>

    </main>
    
</body>
</html>