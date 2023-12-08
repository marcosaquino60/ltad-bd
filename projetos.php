<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Filtrar Banco de Dados</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="container">
        <ul class="menu">
          <li><a href="pessoasbd.php">Pessoas</a></li>
          <li><a href="estoquebd.php">Estoque</a></li>
          <li><a href="projetos.php">Projetos</a></li>
          <li><a href="insert.html">Adicionar</a></li>
        </ul>
        <div class="searchBox">
          <form class="formSearch" action="buscar.php" method="GET">
            <input type="text" name="searchInput" placeholder="Digite sua pesquisa...">
            <input type="submit" value="Pesquisar" >
          </form>
        </div>
    </div>
  </header>

  <div>
    <?php
        include 'conexao.php';

        $sql = "SELECT p.nome, p.descricao, u.nome AS nome_supervisor 
                FROM Projetos p
                INNER JOIN Usuários u ON p.id_supervisor = u.id_user";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='result' >Nome: " . $row["nome"] . " - Descricao: " . $row["descricao"] . " - Nome supervisor: " . $row["nome_supervisor"]  . "</div>";
            }
        }
        else {
            echo "Nenhum resultado encontrado.";
        }

    ?>
  </div>  

</body>
</html>
