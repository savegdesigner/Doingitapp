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

                        <?php  

                            require './servidor/connection.php';

                            $sql = "SELECT * FROM lists WHERE id_user=?";
                            $stmt = mysqli_stmt_init($conn); 

                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../login-pagina.php?error=pageloadsql");
                                exit();
                            
                            }else{
                                mysqli_stmt_bind_param($stmt, 'i', $_SESSION['userId']);
                                mysqli_stmt_execute($stmt);
                                
                                $result = $stmt->get_result();

                                if($result->num_rows >= 1){

                                    while($data = $result->fetch_assoc()){


                                        echo "
                                            <section  class='list'>

                                                <div class='content'>
                                                <h3>{$data['list_name']}</h3>
                                                <a href='./servidor/edit.php?edit_id={$data['id']}'><img src='./imgs/icons/edit-button.svg' alt='Editar Lista' class='edit-button'></a>
                                                </div>
                    
                                                <a href='./servidor/delete.php?delete_id={$data['id']}' class='delete'><img src='./imgs/icons/delete-button.svg' alt='Deletar Lista' class='delete-button'></a>
                    
                                            </section>
                                        ";

                                    }
                                }
                            }
                    
                        ?>

                    <div class="add-lists">
                        <h2>Adicionar nova lista</h2>

                        <form method="POST" action="./servidor/add-list.php" class="add">

                            <input type="text" class="new-list-input" name="new-list" placeholder="Fazer compras..." value="<?php echo "$list_name"; ?>">
                                <?php 
                        
                                    if($update){
                                        echo "<button type='submit' class='submit-button' name='add-list-button'><img src='./imgs/icons/update-button.svg' alt'Adicionar nova lista' class='add-button'></button>";
                                    
                                    }else{
                                        echo "<button type='submit' class='submit-button' name='add-list-button'><img src='./imgs/icons/add-button.svg' alt'Adicionar nova lista' class='add-button'></button>";
                                    
                                    }

                                ?>
                            
                        </form>
                        
                    </div>
            

                </div>

    </main>
    
</body>
</html>