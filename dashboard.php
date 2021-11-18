<?php
    session_start();
    ob_start();
    include_once 'conexao.php';

    if(!isset($_SESSION['id']) and !isset($_SESSION['nome'])){
        $_SESSION['msg'] = "<p style='color: red'>Necessário logar.</p>";
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard <?php echo $_SESSION['nome'] ?></h2><br><br>
    <a href="sair.php">Sair</a>
</body>
</html>