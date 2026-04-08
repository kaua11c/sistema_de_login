<?php 

require_once 'env.php';

$dsn = "mysql:host=$ENV_HOST;dbname=$ENV_DBNAME";

try {
    $pdo = new PDO($dsn, $ENV_USERNAME, $ENV_PASSWORD);
    /* echo "Conexão com o banco bem sucedida! <hr> <br>"; */
} catch (PDOException $e) { // PDOException é uma mensagem de erro que guardei na variavel $e
    echo 'Erro na conexão: ' . $e->getMessage(); //getMessage traz a mensagem de erro
}