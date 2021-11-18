<?php
    session_start();
    ob_start();
    include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
</head>
<body>
    <!-- exemplo para criptografar senha -->
    <?php
        // echo password_hash('123456',PASSWORD_DEFAULT);
    ?>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($dados['SendLogin'])){
            // var_dump($dados);
            $query_usuario = "select id, usuario, senha_usuario from usuarios 
                                where usuario = :usuario 
                                limit 1";
            $result_usuario = $conn->prepare($query_usuario);
            $result_usuario->bindParam(':usuario',$dados['usuario'], PDO::PARAM_STR);
            $result_usuario->execute();
            if(($result_usuario) and ($result_usuario->rowCount() != 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                // var_dump('fetch',$row_usuario);
                if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['nome'] = $row_usuario['nome'];
                    header("Location: dashboard.php");
                }else{
                    $_SESSION['msg'] = "<p style='color: red'>Erro: Usuario ou senha inválida.</p>";
                }
            }else{
                $_SESSION['msg'] = "<p style='color: red'>Erro: Usuario ou senha inválida.</p>";
            }
        }
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <h1>Login</h1>
    <form action="" method="POST">
        <label for="">Usuário</label>
        <input type="text" name="usuario" value="<?php if(isset($dados['usuario'])) echo $dados['usuario'] ?>" placeholder="Digite o usuário"><br><br>
        <label for="">Senha</label>
        <input type="password" name="senha_usuario" value="<?php if(isset($dados['senha_usuario'])) echo $dados['senha_usuario'] ?>"placeholder="Digite a senha"><br><br>
        <input type="submit" name="SendLogin" id="" value="acessar">
    </form>
</body>
</html>