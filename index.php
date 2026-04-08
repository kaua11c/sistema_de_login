<?php 

require_once 'helpers/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
 
    $sql = "SELECT * FROM sistema_de_login WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    //crio um array com o :usuario digitado 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];

        header("Location: bem_vindo.php");
        exit;
    } else {
        echo "Usuário ou senha inválidos";
    }
}


?>

<div class="cardLogin">
    <form action="" class="loginUser" method="POST">
        <label for="">Login</label>
        <input type="text" name="usuario">
        <input type="password" name="senha">
        <input type="submit" value="Logar">
    </form>
</div>
