<?php
require_once '../config/produto.php';
$usuario = new Produto();
$usuario-> conecta();
if ($usuario->msgError != "") {
    echo "Erro na conexão: " . $usuario->msgError;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->logar($email, $senha)) {
        header("Location: areaPrivada.php");
        exit();
    } else {
        $mensagemErro = "Usuário ou senha incorretos.";
    }
}
?>