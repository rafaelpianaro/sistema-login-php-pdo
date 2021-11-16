<?php
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
            var_dump($dados);
        }
    ?>

    <h1>Login</h1>
    <form action="" method="POST">
        <label for="">Usuário</label>
        <input type="text" name="usuario" placeholder="Digite o usuário"><br><br>
        <label for="">Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a senha"><br><br>
        <input type="submit" name="SendLogin" id="" value="acessar">
    </form>
</body>
</html>