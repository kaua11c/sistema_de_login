<?php
require_once 'helpers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;

    $sql = "SELECT * FROM sistema_de_login WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            echo "Este usuário já existe";
        } elseif (strlen($senha) < 8){
                echo "A senha deve conter mais de 8 caracteres";
        } elseif (!preg_match('/[A-Z]/', $senha) || !preg_match('/[^a-zA-Z0-9]/', $senha)) {
            echo "A senha deve conter letras maiúsculas e simbolos";
        } else {
            $sql = "INSERT INTO sistema_de_login (usuario, senha) VALUES (:usuario, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
        }
    }

?>

<form action="" method="POST">
    <label for="">Cadastro de usuário</label>
    <input type="text" name="usuario" placeholder="Digite o usuário">
    <input type="password" name="senha" placeholder="Digite a senha">
    <input type="submit" Value="Salvar"> 
</form>