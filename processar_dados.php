

<?php

include 'conexao.php';
// Verifica se o formulário foi submetido e se existem dados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tabela'])) {
    $tabela = $_POST['tabela'];

    // Inserção de dados na tabela escolhida
    if ($tabela === "pessoa") {
        $sql = "INSERT INTO Usuários (nome, email, telefone, data_nascimento) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['data_nascimento']);
        $stmt->execute();

        echo "Dados inseridos com sucesso em Usuários.";
    } elseif ($tabela === "estoque") {
        $sql = "INSERT INTO estoque (nome, qtd, descricao) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $_POST['nome'], $_POST['qtd'], $_POST['descricao']);
        $stmt->execute();

        echo "Dados inseridos com sucesso no Estoque.";
    } elseif ($tabela === "projetos") {
        
         
        // Obtendo o ID do supervisor
        $stmt = $conn->prepare("SELECT id_user FROM Usuários WHERE nome = ?");
        $stmt->bind_param("s", $_POST['nomesupervisor']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_supervisor = $row['id_user'];
            echo "id supervisor: $id_supervisor"; 
        }

        $stmt = $conn->prepare("INSERT INTO projetos (nome, descricao, id_supervisor) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST['nome'], $_POST['descricao'], $id_supervisor);
        $stmt->execute();

        echo "Dados inseridos com sucesso na tabela Projetos";


    }else {
        echo "Tabela não reconhecida.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Não foram recebidos dados para inserção.";
}
?>