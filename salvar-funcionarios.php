<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_REQUEST['acao'] ?? '';
$id = $_REQUEST['id'] ?? '';
?>

<main>
  <div id="funcionarios" class="tela">
    <form class="crud-form" method="POST" action="./action/funcionarios.php">
      <h2>Cadastro de Funcionários</h2>

      <input type='hidden' name='id' value='<?php echo $id; ?>'>
      <input type='hidden' name='acao' value='salvar'>
      
      <?php
      switch ($acao) {
        case 'salvar':
          if (!empty($id)) {
            // Edição de funcionário existente
            $sql = "SELECT f.Nome AS FuncionarioNome, f.DataNascimento, f.Email, f.Salario, f.Sexo, f.CPF, f.RG,
            c.Nome AS CargoNome, s.Nome AS SetorNome
            FROM funcionarios AS f
            INNER JOIN cargos AS c ON f.CargoID = c.CargoID
            INNER JOIN setor AS s ON f.SetorID = s.SetorID
            WHERE f.FuncionarioID = $id";
            $result = mysqli_query($conn, $sql);
            if ($func = mysqli_fetch_assoc($result)) {
              ?>
              <input type='text' name='Nome' value='<?php echo htmlspecialchars($func['FuncionarioNome']); ?>' placeholder='Nome'>
              <input type='date' name='DataNascimento' value='<?php echo $func['DataNascimento']; ?>' placeholder='Data de Nascimento'>
              <input type='email' name='Email' value='<?php echo htmlspecialchars($func['Email']); ?>' placeholder='Email'>
              <input type='number' name='Salario' value='<?php echo $func['Salario']; ?>' placeholder='Salário'>
              <select name="Sexo">
                <option value=''>Selecione o sexo</option>
                <option value='M' <?php if($func['Sexo']=='M') echo 'selected'; ?>>Masculino</option>
                <option value='F' <?php if($func['Sexo']=='F') echo 'selected'; ?>>Feminino</option>
              </select>
              <input type='text' name='CPF' value='<?php echo htmlspecialchars($func['CPF']); ?>' placeholder='CPF'>
              <input type='text' name='RG' value='<?php echo htmlspecialchars($func['RG']); ?>' placeholder='RG'>
              <select name='Cargo'>
                <?php
                  $sqlCargo = "SELECT Nome FROM cargos";
                  $resultCargo = mysqli_query($conn, $sqlCargo);
                  while ($cargo = mysqli_fetch_assoc($resultCargo)) {
                    $selected = ($cargo['Nome'] == $func['CargoNome']) ? "selected" : "";
                    echo "<option value='".htmlspecialchars($cargo['Nome'])."' $selected>".htmlspecialchars($cargo['Nome'])."</option>";
                  }
                ?>
              </select>
              <select name='Setor'>
                <?php
                  $sqlSetor = "SELECT Nome FROM setor";
                  $resultSetor = mysqli_query($conn, $sqlSetor);
                  while ($setor = mysqli_fetch_assoc($resultSetor)) {
                    $selected = ($setor['Nome'] == $func['SetorNome']) ? "selected" : "";
                    echo "<option value='".htmlspecialchars($setor['Nome'])."' $selected>".htmlspecialchars($setor['Nome'])."</option>";
                  }
                ?>
              </select>
              <?php
            }
          } else {
            // Inclusão de novo funcionário (formulário em branco)
            ?>
            <input type='hidden' name='acao' value='salvar'>
            <input type='text' name='Nome' placeholder='Nome'>
            <input type='date' name='DataNascimento' placeholder='Data de Nascimento'>
            <input type='email' name='Email' placeholder='Email'>
            <input type='number' name='Salario' placeholder='Salário'>
            <select name="Sexo">
              <option value=''>Selecione o sexo</option>
              <option value='M'>Masculino</option>
              <option value='F'>Feminino</option>
            </select>
            <input type='text' name='CPF' placeholder='CPF'>
            <input type='text' name='RG' placeholder='RG'>
            <select name='Cargo'>
              <?php
                $sqlCargo = "SELECT Nome FROM cargos";
                $resultCargo = mysqli_query($conn, $sqlCargo);
                while ($cargo = mysqli_fetch_assoc($resultCargo)) {
                  echo "<option value='".htmlspecialchars($cargo['Nome'])."'>".htmlspecialchars($cargo['Nome'])."</option>";
                }
              ?>
            </select>
            <select name='Setor'>
              <?php
                $sqlSetor = "SELECT Nome FROM setor";
                $resultSetor = mysqli_query($conn, $sqlSetor);
                while ($setor = mysqli_fetch_assoc($resultSetor)) {
                  echo "<option value='".htmlspecialchars($setor['Nome'])."'>".htmlspecialchars($setor['Nome'])."</option>";
                }
              ?>
            </select>
            <?php
          }
          break;
        default:
          // Você pode colocar um formulário em branco aqui se quiser
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