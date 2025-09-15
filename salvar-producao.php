<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_REQUEST['acao'] ?? '';
$id = $_REQUEST['id'] ?? '';
?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/producao.php">
          <h2>Cadastro de Produção de Produtos</h2>

          <input type="hidden" name="acao" value="salvar">
          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <?php
          switch ($acao) {
            case 'salvar':
              if (!empty($id)) {
                $sql = 'SELECT p.Nome AS ProdutoNome, f.Nome AS FuncionarioNome, pr.DataProducao
                        FROM producao AS pr
                        INNER JOIN produtos AS p ON pr.ProdutoID = p.ProdutoID
                        INNER JOIN funcionarios AS f ON pr.FuncionarioID = f.FuncionarioID
                        WHERE pr.ProducaoID = '.$id;
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <select>
                    <?php
                    $sqlFunc = "SELECT Nome FROM funcionarios";
                    $resultFunc = mysqli_query($conn, $sqlFunc);
                    while($rowFunc = mysqli_fetch_assoc($resultFunc)) {
                      $selected = ($rowFunc['Nome'] == $row['FuncionarioNome']) ? 'selected' : '';
                      echo '<option value="'.htmlspecialchars($rowFunc['Nome']).'" name="Funcionario" '.$selected.'>'.htmlspecialchars($rowFunc['Nome']).'</option>';
                    }
                    ?>
                  </select>
                  <select>
                    <?php
                    $sqlProd = "SELECT Nome FROM produtos";
                    $resultProd = mysqli_query($conn, $sqlProd);
                    while($rowProd = mysqli_fetch_assoc($resultProd)) {
                      $selected = ($rowProd['Nome'] == $row['ProdutoNome']) ? 'selected' : '';
                      echo '<option value="'.htmlspecialchars($rowProd['Nome']).'" name="Produto" '.$selected.'>'.htmlspecialchars($rowProd['Nome']).'</option>';
                    }
                    ?>
                  </select>
                  <label for="">Data da entrega</label>
                  <input type="date" value="<?php echo $row['DataProducao']; ?>" name="DataProducao" placeholder="Data da Entrega">
                  <input type="number" placeholder="Quantidade Produzida" name="QuantidadeProduzida">
                  <button type="submit">Salvar</button>
                  <?php
                }
              } else {
                ?>
                <select>
                <?php
                $sql = "SELECT Nome FROM funcionarios";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="'.htmlspecialchars($row['Nome']).'" name="Funcionario">'.htmlspecialchars($row['Nome']).'</option>';
                }
                ?>
                </select>
                <select>
                  <?php
                  $sql = "SELECT Nome FROM produtos";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'.htmlspecialchars($row['Nome']).'" name="Produto">'.htmlspecialchars($row['Nome']).'</option>';
                  }
                  ?>
                </select>
                <label for="">Data da entrega</label>
                <input type="date" placeholder="Data da Entrega" name="DataProducao">
                <input type="number" placeholder="Quantidade Produzida" name="QuantidadeProduzida">
                <button type="submit">Salvar</button>
                <?php
              }
          }
          ?>
          <select>
            <option value="">Funcionário</option>
          </select>
          <select>
            <option value="">Produto</option>
          </select>
          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <input type="number" placeholder="Quantidade Produzida">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>