<?php
require_once '../config/usuario.php';
$usuario = new Cliente();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Conecta ao banco 
    $usuario->conectar("Beco_Diagonal", "localhost", "root", "");

    // Exclui o usuario no banco de dados
    $usuario->excluir($id_usuario);

    echo "Usuário excluído com sucesso!";
    header("Location: ../views/areaPrivada.php"); // vai para a area privada
}
?>
