<?php 
require_once '../../../app/config/cliente.php';
$usuario = new Cliente();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $usuario->conectar("Beco_Diagonal", "localhost", "root", "");

    global $pdo; 
    $sql = $pdo->prepare("SELECT * FROM cliente WHERE id_usuario = :id");
    $sql->bindValue(":id", $id_usuario);
    $sql->execute();
    
    $usuario_data = $sql->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario->editar($id_usuario, $nome, $telefone, $email, $senha);

    header("Location: ../../../app/views/areaPrivada.php");
    exit(); // Garante que o código pare aqui
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../../../public/css/cadastro.css">
    <link rel="stylesheet" href="../../../public/css/login.css">
</head>
<body class="base">
    <div class="area-blur">
        <div class="card">
            <span class="title">Editar Usuário</span>
            <form class="area-cad" action="" method="post">
                <label>Nome</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($usuario_data['nome']) ?>" required><br><br>

                <label>Telefone</label>
                <input type="text" name="telefone" value="<?= htmlspecialchars($usuario_data['telefone']) ?>" required><br><br>

                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($usuario_data['email']) ?>" required><br><br>

                <input type="submit" value="Atualizar" class="btn-atualizar">
            </form>
            <a href="../../../app/views/areaPrivada.php" class="btn-voltar">Voltar</a>
        </div>
    </div>
</body>
</html>
