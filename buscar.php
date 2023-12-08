
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
          <li><a href="">Projetos</a></li>
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

        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["searchInput"])) {
            
            $search = $_GET["searchInput"];
            $sql = "SELECT * FROM Usuários WHERE nome LIKE '%$search%' OR email LIKE '%$search%' OR telefone LIKE '%$search%' OR data_nascimento LIKE '%$search%'";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='result'>Nome: " . $row["nome"] . " - Email: " . $row["email"] . " - Telefone: " . $row["telefone"] . " - Data de Nascimento: " . $row["data_nascimento"] . "</div>";
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
  </div>



</body>
</html>


