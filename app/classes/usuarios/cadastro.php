<?php
    require_once '../../../app/config/cliente.php';
    $usuario = new Cliente();
?>


<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../../public/css/cadastro.css">
</head>
<body class="base">
    <div class="area-blur">
        <div class="card">
        <h2>CADASTRO DE USUARIO</h2>
        <form class="area-cad" action="" method="post">
        <label >Nome</label>
        <input type="text" name="nome" id="" placeholder="Digite seu nome."><br>

        <label >Telefone</label>
        <input type="tel" name="tel" id="" placeholder="Digite seu telefone."><br>


        <label >Email</label>
        <input type="email" name="email" id="" placeholder="Digite seu email."><br>


        <label >Senha</label>
        <input type="password" name="senha" id="" placeholder="Digite seu senha."><br>


        <label >Confirmar Senha</label>
        <input type="password" name="cofSenha" id="" placeholder="Confirme sua senha."><br>

        <input type="submit" value="CADASTRAR">
        <a href="../../../app/views/index.php">VOLTAR</a>
        </form>
    <?php
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $cofSenha = addslashes($_POST['cofSenha']);

            if(!empty($nome) &&  !empty($tel) && !empty($email) && !empty($senha) && !empty($cofSenha))
            {
                $usuario->conectar("Beco_Diagonal","localhost","root","");
                if($usuario->msgError=="")
                {
                    if($senha == $cofSenha)
                    {
                        if($usuario->cadastrar($nome,$tel,$email,$senha))
                        {
                            ?>

                                <!-- area do HTML -->
                                <div id="msn-sucesso-cad">
                                    Cadastrado com Sucesso.
                                    Clique <a href="../../../app/views/index.php">aqui</a>para logar.
                                </div>
                                <!-- FIM DA AREA HTML -->
                            <?php
                        }
                        else
                        {
                            ?>

                                <!-- area do HTML -->
                                <div id="msn-sucesso-email">
                                    Email já cadastrado.
                                    Clique <a href="../../../app/views/index.php">aqui</a>para logar.
                                </div>
                                <!-- FIM DA AREA HTML -->
                            <?php
                        }
                    }
                    else
                    {
                        ?>

                                <!-- area do HTML -->
                                <div id="msn-sucesso-senha">
                                    Senha e Confirmar senha não conferem.
                                    Clique <a href="../../../app/views/index.php">aqui</a>para logar.
                                </div>
                                <!-- FIM DA AREA HTML -->
                            <?php
                    }
                }
                else
                {
                    ?>

                                <!-- area do HTML -->
                                <div id="msn-sucesso">
                                    <?php echo"Erro:".$usuario->msgError;?>
                                    Clique <a href="../../../app/views/index.php">aqui</a>para logar.
                                </div>
                                <!-- FIM DA AREA HTML -->
                            <?php
                }
            }
            else
            {
                ?>

                                <!-- area do HTML -->
                                <div id="msn-sucesso">
                                    Preencha todos os campos.
                                    Clique <a href="../../../app/views/index.php">aqui</a>para logar.
                                </div>
                                <!-- FIM DA AREA HTML -->
                            <?php
            }
            
        }

    ?>
        </div>
        

    </div>
</body>
</html>