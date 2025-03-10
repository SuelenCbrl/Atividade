<?php
    Class Cliente{
        private $pdo;
        public $msgError="";

        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$nome, $usuario, $senha);
            }
            catch (PDOException $erro){
                $msgError = $erro->getMessage();
            }
        }

        public function cadastrar($nome, $telefone,$email, $senha){
            global $pdo;

            $sql = $pdo->prepare("SELECT id_usuario FROM cliente WHERE email = :m");
            $sql->bindValue(":m",$email);
            $sql->execute();

            if($sql->rowCount()>0){
                return false;
            }
            else{
                $sql = $pdo->prepare("INSERT INTO cliente (nome,telefone,email,senha) VALUES (:n, :t, :e, :s)");
                $sql->bindValue(":n", $nome);
                $sql->bindValue(":t", $telefone);
                $sql->bindValue(":e", $email);
                $sql->bindValue(":s", md5($senha));
                $sql->execute();
                return true;
            }

        }
        public function logar($email, $senha)
        {
            global $pdo;
            $verificarEmailSenha = $pdo->prepare("SELECT id_usuario FROM cliente WHERE email = :e AND senha = :s");
            $verificarEmailSenha->bindValue(":e",$email);
            $verificarEmailSenha->bindValue(":s",md5($senha));
            $verificarEmailSenha->execute();
            if($verificarEmailSenha->rowCount()>0) 
            {
                $dados = $verificarEmailSenha->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }
        public function listarUsuarios() {
            global $pdo;
            $sql = $pdo->prepare("SELECT * FROM cliente");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        }
        public function editar($id, $nome, $telefone, $email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("UPDATE cliente SET nome = :n, telefone = :t, email = :e, senha = :s WHERE id_usuario = :id");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":t", $telefone);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function excluir($id) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM cliente WHERE id_usuario = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
        
    }



?>