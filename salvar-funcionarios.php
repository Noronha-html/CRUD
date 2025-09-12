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
              c.Nome AS CargoNome, s.Nome AS SetorNome
              FROM funcionarios AS f
              INNER JOIN cargos AS c ON f.CargoID = c.CargoID
              INNER JOIN setor AS s ON f.SetorID = s.SetorID
              WHERE f.FuncionarioID = $id";
              $result = mysqli_query($conn, $sql);
              while ($func = mysqli_fetch_assoc($result)) {
                ?>
                <input type='text' placeholder='<?php echo $func['FuncionarioNome']; ?>'>
                <input type='date' placeholder='<?php echo $func['DataNascimento']; ?>'>
                <input type='email' placeholder='<?php echo $func['Email']; ?>'>
                <input type='number' placeholder='<?php echo $func['Salario']; ?>'>
                <select>
                  <option value='<?php echo $func['Sexo']; ?>'><?php echo $func['Sexo']; ?></option>
                  <option value='M'>Masculino</option>
                  <option value='F'>Feminino</option>
                </select>
                <input type='text' placeholder='<?php echo $func['CPF']; ?>'>
                <input type='text' placeholder='<?php echo $func['RG']; ?>'>
                <select>
                  <?php
                    $sqlCargo = "SELECT Nome FROM cargos";
                    $resultCargo = mysqli_query($conn, $sqlCargo);
                    while ($cargo = mysqli_fetch_assoc($resultCargo)) {
                      $selected = ($cargo['Nome'] == $func['CargoNome']) ? "selected" : "";
                      echo "<option value='".$cargo['Nome']."' $selected>".$cargo['Nome']."</option>";
                    }
                  ?>
                </select>
                <select>
                  <?php
                    $sqlSetor = "SELECT Nome FROM setor";
                    $resultSetor = mysqli_query($conn, $sqlSetor);
                    while ($setor = mysqli_fetch_assoc($resultSetor)) {
                      $selected = ($setor['Nome'] == $func['SetorNome']) ? "selected" : "";
                      echo "<option value='".$setor['Nome']."' $selected>".$setor['Nome']."</option>";
                    }
                  ?>
                </select>
                <?php
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
