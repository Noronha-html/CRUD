<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT p.ProdutoID, p.Nome AS ProdutoNome, c.Nome AS CategoriaNome, p.Preco FROM produtos AS p
        INNER JOIN categorias AS c ON p.CategoriaID = c.CategoriaID';
$result = mysqli_query($conn, $sql);
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['ProdutoID'] . "</td>
                    <td>" . $row['ProdutoNome'] . "</td>
                    <td>" . $row['CategoriaNome'] . "</td>
                    <td>" . $row['Preco'] . "</td>
                    <td>
                        <a href='salvar-produtos.php?id=" . $row['ProdutoID'] . "' class='btn btn-edit'>Editar</a>
                        <a href='produtos.php?id=" . $row['ProdutoID'] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
                    </td>
                  </tr>";
          }
          ?>

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>