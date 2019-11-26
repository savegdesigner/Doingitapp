<?php

$server_name = 'localhost:3306';
$db_user_name = 'root';
$db_password = '';
$db_name = 'projeto_pi_db';

$conn = mysqli_connect($server_name, $db_user_name, $db_password, $db_name);

if(!$conn){
    die("A conexão falhou: " .mysqli_connect_error());
}