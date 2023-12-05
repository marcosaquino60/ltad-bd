<?php
$servername = "localhost";
$username = "root";
$password = "ltad1234";
$dbname = "teste";

// Criando a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>