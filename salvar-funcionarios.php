<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_GET['acao'];
$id = $_GET['id'];
?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form">
          <h2>Cadastro de Funcionários</h2>
          <?php
          switch ($acao) {
            case 'salvar':
              $sql = "SELECT f.Nome AS FuncionarioNome, f.DataNascimento, f.Email, f.Salario, f.Sexo, f.CPF, f.RG,
              c.Nome AS CargoNome, s.Nome AS SetorNome;
              FROM funcionarios AS f
              WHERE CargoID ='.$id.'
              INNER JOIN cargos AS c ON f.CargoID = c.CargoID
              INNER JOIN setor AS s ON f.SetorID = s.SetorID";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<input type='text' placeholder=".$row['FuncionarioNome'].">
                      <input type='date' placeholder=".$row['DataNascimento'].">
                      <input type='email' placeholder=".$row['Email'].">
                      <input type='number' placeholder=".$row['Salario'].">
                      <select>
                        <option value=".$row['Sexo']."></option>
                        <option value='M'>Masculino</option>
                        <option value='F'>Feminino</option>
                      </select>
                      <input type='text' placeholder=".$row['CPF'].">
                      <input type='text' placeholder=".$row['RG'].">
                      <select>
                        <option value=".$row['CargoNome'].">Cargo</option>
                      </select>
                      <select>
                        <option value=".$row['SetorNome'].">Setor</option>
                      </select>";
              }
              break;
            
            default:
              # code...
              break;
          }
          ?>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
