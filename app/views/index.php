<?php
require_once '../config/usuario.php';
$usuario = new Cliente();
$usuario-> conectar("Beco_Diagonal", "localhost", "root", "");

if ($usuario->msgError != "") {
    echo "Erro na conexão: " . $usuario->msgError;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->logar($email, $senha)) {
        header("Location: ../configareaPrivada.php");
        exit();
    } else {
        echo "<p '>Usuário ou senha incorretos.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body class="login">
    <div class="area-login">
        <div class="card">
            <span class="title">LOGIN</span>
            <form action="../views/areaPrivada.php" method="post" class="form-login">
                <div class="group">
                    <input type="email" name="email" placeholder=""require>
                    <label for="name">Usuário</label>
                </div>
                <div class="group">
                    <input type="password" name="senha" placeholder=""require>
                    <label for="senha">Senha</label>
                </div>
                <input type="submit" value="LOGAR">
                <a href="../classes/usuarios/cadastro.php">CADASTRE-SE</a>
            </form>
        </div>
        <div class="area-linhas">
            <div class="linha">
                <span></span>
            </div>
            <div class="setinhas">
                <span class="seta">></span>
                <span class="seta">></span>
                <span class="seta">></span>
            </div>
        </div>
        <div class="img-login">
            <img src="../../public/img/02.png" alt="imagem tela de login">
        </div>
    </div>
    
</body>
</html>