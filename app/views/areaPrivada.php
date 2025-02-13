<?php
require_once '../config/cliente.php';
$usuario = new Cliente();
$usuario-> conectar("Beco_Diagonal", "localhost", "root", "");

if ($usuario->msgError != "") {
    echo "Erro na conexão: " . $usuario->msgError;
    exit;
}

$usuarios = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="../../public/css/listarcadastro.css">
    
</head>
<body class="base">
        <div class="texto"><p class="title">Lista de Clientes</p></div>
            <div class="area-tabela">
                <div class="card">
                    <div id="tela-branca"> 
                        <div class="tabela-responsiva">
                                    <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Edição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($usuarios) > 0): ?>
                                            <?php foreach ($usuarios as $u): ?>
                                                <tr>
                                                    <td><?php echo $u['id_usuario']; ?></td>
                                                    <td><?php echo $u['nome']; ?></td>
                                                    <td><?php echo $u['telefone']; ?></td>
                                                    <td><?php echo $u['email']; ?></td>
                                                    <td>
                                                        <div class="botoes-acoes">
                                                            <a class="LetEdit" href="../../app/classes/usuarios/editar.php?id=<?php echo $u['id_usuario']; ?>">Editar</a>
                                                            <a class="LetExcluir" href="../../app/classes/usuarios/excluir.php?id=<?php echo $u['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                                                        </div>
                                                    </td>

                                                    </td>
                                                </tr>
                                                
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">Nenhum usuário cadastrado.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="area-Bvoltar">
                                    <button class="bVoltar" onclick="window.location.href='index.php'">Sair</button>
                                </div>
                            </div>
                    </div>                            
                </div>
            </div>
        </div>
    
</body>
</html>

