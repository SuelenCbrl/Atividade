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

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario->editar($id_usuario, $nome, $telefone, $email, $senha);

    echo "Usuário atualizado com sucesso!";
    header("Location:../../../app/classes/usuarios/editar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="" method="post">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= $usuario_data['nome'] ?>" required><br><br>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?= $usuario_data['telefone'] ?>" required><br><br>

        <label>Email</label>
        <input type="email" name="email" value="<?= $usuario_data['email'] ?>" required><br><br>

        <label>Senha</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Atualizar">
    </form>
    <a href="../../../app/views/areaPrivada.php">Voltar</a>
</body>
</html>
