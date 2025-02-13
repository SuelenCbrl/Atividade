<?php
require_once '../config/cliente.php';
$usuario = new Cliente();
$usuario->conectar("Beco_Diagonal", "localhost", "root", "");

$mensagemErro = "";

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
                    <input type="email" name="email" placeholder=""required>
                    <label for="name">Usuário</label>
                </div>
                <div class="group">
                    <input type="password" name="senha" placeholder=""required>
                    <label for="senha">Senha</label>
                </div>
                <div class="area-BLogar">
                    <button class="bLogar">LOGAR</button>
                </div>

                <?php if (!empty($mensagemErro)): ?>
                    <p class="erro-login"><?php echo $mensagemErro; ?></p>
                <?php endif; ?>

                <div class="area-BCadastro">
                <a href="../classes/usuarios/cadastro.php">CADASTRE-SE</a>
                </div>
            </form>

        </div>
        <div class="area-linhas">
            <div class="linha">
                <span></span>
            </div>
        </div>
        <div class="img-login">
            <img src="../../public/img/02.png" alt="imagem tela de login">
        </div>
    </div>
    
</body>
</html>