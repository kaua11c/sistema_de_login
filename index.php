<?php 

require_once 'helpers/connection.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
 
$sql = "SELECT * FROM sistema_de_login WHERE usuario = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();
//crio um array com o :usuario digitado 
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//verifico se esse usuario está no banco
if(!$user) {
    echo 'usuario nao existe';
} else {
    if($user['senha'] != $senha) {
         echo 'senha incorreta';
    } else {
         echo 'usuário logado';
         header("Location: bem_vindo.php");
         exit;
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
