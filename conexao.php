<?php
    // $host = "127.0.0.1";
    $hostname = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "sistema_login_phppp";
    $port = 3308;

    try{
        $conn = new PDO("mysql:hostname=$hostname,port=$port,dbname=" . $dbname, $username, $pass);
        // echo "Conexao com db realizada com sucesso.";
    }catch(PDOException $err){
        echo "Erro: falha ao conectar com db. Erro " . $err->getMessage();
    }