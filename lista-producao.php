<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT p.ProducaoID, p.DataProducao, pr.Nome AS ProdutoNome, c.Nome AS ClienteNome FROM producao as p
        INNER JOIN produtos as pr ON p.ProdutoID = pr.ProdutoID
        INNER JOIN clientes as c ON p.ClienteID = c.ClienteID;';
$result = mysqli_query($conn, $sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Data de produção</th>
              <th>Cliente</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $row['ProducaoID'] . "</td>
                      <td>" . $row['ProdutoNome'] . "</td>
                      <td>" . $row['DataProducao'] . "</td>
                      <td>" . $row['ClienteNome'] . "</td>
                      <td>
                          <a href='salvar-producao.php?id=" . $row['ProducaoID'] . "' class='btn btn-edit'>Editar</a>
                          <a href='producao.php?id=" . $row['ProducaoID'] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
                      </td>
                    </tr>";
            }
            ?>
            
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>