<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT f.FuncionarioID, f.Nome AS FuncionarioNome, c.Nome AS CargoNome , s.Nome AS SetorNome FROM funcionarios as f
        INNER JOIN cargos AS c ON f.CargoID = c.CargoID
        INNER JOIN setor AS s ON f.SetorID = s.SetorID';
$result = mysqli_query($conn, $sql);
?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['FuncionarioID'] . "</td>
                    <td>" . $row['FuncionarioNome'] . "</td>
                    <td>" . $row['CargoNome'] . "</td>
                    <td>" . $row['SetorNome'] . "</td>
                    <td>
                        <a href='salvar-cargos.php?id=" . $row['FuncionarioID'] . "' class='btn btn-edit'>Editar</a>
                        <a href='excluir-cargos.php?id=" . $row['FuncionarioID'] . "' class='btn btn-delete'>Excluir</a>
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