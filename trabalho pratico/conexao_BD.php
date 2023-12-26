<?php
    $servername = "172.17.0.2";
    $username = "root";
    $password = "guilhermer";
    $dbname = "database";

    // Criação da conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // teste de conexão
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>

