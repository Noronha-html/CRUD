<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT CargoID, Nome, TetoSalarial FROM cargos';
$result = mysqli_query($conn, $sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salárial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $row['CargoID'] . "</td>
                      <td>" . $row['Nome'] . "</td>
                      <td>" . $row['TetoSalarial'] . "</td>
                      <td>
                          <a href='salvar-cargos.php?id=" . $row['CargoID'] . "&acao=salvar' class='btn btn-edit'>Editar</a>
                          <a href='./action/cargos.php?id=" . $row['CargoID'] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
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