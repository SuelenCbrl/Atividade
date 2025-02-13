<?php
    require_once '../../../app/config/cliente.php';
    $usuario = new Cliente();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    $usuario->conectar("Beco_Diagonal", "localhost", "root", "");

    $usuario->excluir($id_usuario);

    echo "Usuário excluído com sucesso!";
    header("Location: ../../../app/views/areaPrivada.php");
    exit;
    
}
?>
