<?php
include 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["searchInput"])) {
    
    $search = $_GET["searchInput"];
    $sql = "SELECT * FROM Usuários WHERE nome LIKE '%$search%' OR email LIKE '%$search%' OR telefone LIKE '%$search%' OR data_nascimento LIKE '%$search%'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Nome: " . $row["nome"] . " - Email: " . $row["email"] . " - Telefone: " . $row["telefone"] . " - Data de Nascimento: " . $row["data_nascimento"] . "<br>";
        }
    }
    else {
        echo "Nenhum resultado encontrado.";
    }
}    
else {
    echo "Nenhum termo de pesquisa fornecido.";
}
    


$conn->close();

?>