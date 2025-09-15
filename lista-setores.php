<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT * FROM setor';
$result = mysqli_query($conn, $sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php?acao=salvar&id=" class="btn btn-add">Incluir</a>
        
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $row['SetorID'] . "</td>
                      <td>" . $row['Nome'] . "</td>
                      <td>" . $row['Andar'] . "</td>
                      <td>" .$row['Cor'] . "</td>
                      <td>
                          <a href='salvar-setores.php?id=" . $row['SetorID'] . "&acao=salvar' class='btn btn-edit'>Editar</a>
                          <a href='./action/setores.php?id=" . $row['SetorID'] . "&acao=excluir' class='btn btn-delete'>Excluir</a>
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